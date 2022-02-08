<?php

namespace ElhakimDev\JsonApiCore\Modules\Server\Concerns;

use ArrayAccess;
use ElhakimDev\JsonApiCore\Modules\Server\Contracts\RegistryContract;
use ElhakimDev\JsonApiCore\Modules\Server\Contracts\ServerContract;
use InvalidArgumentException;
use ReflectionClass;
use RuntimeException;

abstract class Registry implements RegistryContract, ArrayAccess
{
    /**
     * The name of registry.
     *
     * @var string
     */
    protected $name;

    /**
     * The array of variadic servers.
     *
     * @var array
     */
    protected $servers = [];

    /**
     * The list of groupped server.
     *
     * @var array
     */
    protected $groupedServers = [];

    /**
     * The list of active servers.
     *
     * @var array
     */
    protected $activeServers = [];

    /**
     * The Registry Instance.
     *
     * @param string $name The name of registry.
     */
    public function __construct(string $name)
    {
        $this->name =  $name;
    }

    /**
     * Load all given server instance parameters to the registry
     *
     * One registry can consist of more than one server, more than one server group, 
     * it can even consist of both [server group - multiple servers]
     * 
     * @param array|ServerContract ...$servers The array or multiple server instance that will need to pass in the registry
     * @return void
     */
    public function loadServers(array|ServerContract ...$servers)
    {
        if(func_num_args() > 0 ){
            foreach ($servers as $server) {
                # if the given params is instane of ServerContract
                # we just bind to server property in the registry class.
                if ($server instanceof ServerContract) {
                    $this->handleVariadicServer($server);
                }

                # but we must check again,
                # if $server is an array 
                # we assumed that is a grouped server
                # so we handle with different methods as we can do bellow.
                if(is_array($server)){
                    $this->handleGroupedServer($server);
                }
            }
        } else {
            throw new InvalidArgumentException("No parameters given, expected at least 1 parameters,  but given : [".func_num_args()."] params.");
        }
    }
    
    /**
     * Chekc is the server name was configured ?
     *
     * @param ServerContract $server The instance of server.
     * @return boolean Return true if the name of server is configured, otherwise return false. 
     */
    protected function isConfiguredServerName(ServerContract $server) : bool
    {
        return $server->getName() !== null ? true : false ;
    }
    
    /**
     * Handle variadic server instance to registering server into registry.
     *
     * @param ServerContract $server The server instance.
     * @return void None returned.
     * @throws RuntimeException The exception will be thrown that will be thrown during runtime if get the property status on server class is not configured.
     */
    protected function handleVariadicServer(ServerContract $server) : void 
    {
        if($this->isConfiguredServerName($server)) {
            $this->bindVariadicServer($server);
        } else {
            $reflector = new ReflectionClass($server);
            throw new RuntimeException("The property [name] in class {$reflector->getName()} is not configured!");
        }
    }
    
    /**
     * Register / bind server into the registry.
     *
     * @param ServerContract $server
     * @return void
     */
    protected function bindVariadicServer(ServerContract $server): void {
        $this->servers[$server->getName()] = $server;
        
        if($server->checkActiveStatuse()){
            $this->activeServers[$server->getName()] = $server;
        }
    }
    
    /**
     * Check is given parameters is a valid server ?
     *
     * @param mixed $server The parameters that will be check.
     * @return boolean Return true if given parameter is a valid serve, otherwise false will be returned.
     */
    protected function checkIsValidServer($server): bool {
        return $server instanceof ServerContract ? true : false;
    }

    /**
     * Handle to register groupped server instance to the registry.
     *
     * @param array $servers The array of groupped servers.
     * @return void 
     */
    protected function handleGroupedServer(array $servers): void {
        // dd('ada array nih');
        foreach($servers as $key => $server){
            $this->bindGroupedServer($key, $server);
        }
    }

    /**
     * Register server as a groupper server into regostry.
     *
     * @param mixed $key The array key of groupped server.
     * @param ServerContract $server The server instance.
     * @return void
     */
    protected function bindGroupedServer($key, ServerContract $server): void {
        $this->groupedServers[$key][$server->getName()] = $server;

        if($server->checkActiveStatuse()){
            $this->activeServers[$server->getName()] = $server;
        }
    }
}

