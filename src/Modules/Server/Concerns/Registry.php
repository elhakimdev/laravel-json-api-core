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
    protected $name;
    protected $servers = [];
    protected $groupedServers = [];
    public function __construct(string $name)
    {
        $this->name =  $name;
    }

    /**
     * Load all given server instance parameters to the registry
     *
     * @param array|ServerContract ...$servers The array or multiple server instance that will need to pass in the registry
     * @return void
     */
    public function loadServers(array|ServerContract ...$servers)
    {
        /**
         * Satu registry bisa terdiri lebih dari satu server, lebih dari satu server group, bahkan bisa terdiri dari keduanya [server group - multiple server] 
         */
        if(func_num_args() > 0 ){
            foreach ($servers as $server) {
                if ($server instanceof ServerContract) {
                    $this->handleVariadicServer($server);
                }

                if(is_array($server)){
                    $this->handleGroupedServer($server);
                }
            }
        } else {
            throw new InvalidArgumentException("No parameters given, expected at least 1 parameters,  but given : [".func_num_args()."] params.");
        }
    }
    protected function isConfiguredServerName(ServerContract $server){
        return $server->getName() !== null ? true : false ;
    }
    protected function handleVariadicServer(ServerContract $server){
        if($this->isConfiguredServerName($server)) {
            $this->bindVariadicServer($server);
        } else {
            $reflector = new ReflectionClass($server);
            throw new RuntimeException("The property [name] in class {$reflector->getName()} is not configured!");
        }
    }
    protected function bindVariadicServer(ServerContract $server): void {
        $this->servers[$server->getName()] = $server;
    }
    protected function checkIsValidServer($server): bool {
        return $server instanceof ServerContract ? true : false;
    }
    protected function handleGroupedServer(array $servers): void {
        // dd('ada array nih');
        foreach($servers as $key => $server){
            $this->bindGroupedServer($key, $server);
        }
    }
    protected function bindGroupedServer($key, ServerContract $server): void {
        $this->groupedServers[$key][$server->getName()] = $server;
    }
}

