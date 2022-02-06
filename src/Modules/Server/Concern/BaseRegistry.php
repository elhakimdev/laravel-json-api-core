<?php

namespace ElhakimDev\JsonApiCore\Modules\Server\Concern;

use ElhakimDev\JsonApiCore\Modules\Server\Contracts\ServerManager;
use ElhakimDev\JsonApiCore\Modules\Server\Contracts\RegistryManager;
use ElhakimDev\JsonApiCore\Modules\Server\Exceptions\ServerNotLoadedException;

/**
 * ```BaseRegistry::class```
 * 
 * The clas is a bas registry class
 * 
 * @package Server
 * @author ElhakimDev <abdulelhakim68@gmail.com>
 * @version 1.0.0
 */
class BaseRegistry implements RegistryManager {
    /**
     * @var string $name The registry name.
     */
    protected string $name;

    /**
     * @var Servermanager[] $servers The array of servers that loaded on registry.
     */
    protected $servers;

    
    /**
     * The ```BaseRegistry::class``` instance.
     * 
     * @param string $name The name of registry that will be instantiated.
     */
    public function __construct(string $name)
    {
        $this->name     = $name;
    }

    /** 
     * @inheritDoc
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /** 
     * @inheritDoc
     */
    public function loadServer(ServerManager ...$servers): void
    {
        if(is_array($servers)){
            foreach($servers As $server){
                $this->servers[$server->getName()] = $server;
            }
        }
    }
    
    /**
     * @inheritDoc
     */
    public function getServer(string $serverName): Servermanager
    {
        return array_key_exists($serverName, $this->servers) ? $this->servers[$serverName] : 
            throw new ServerNotLoadedException("The given server name : [$serverName] is not found, did you load it in the registry before ?");
    }
}
