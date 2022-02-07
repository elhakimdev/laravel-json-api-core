<?php

namespace ElhakimDev\JsonApiCore\Modules\Server\Concers;

use ElhakimDev\JsonApiCore\Modules\Server\Contracts\ServerContract;

abstract class Server implements ServerContract {

    protected $name;
    protected $uri;
    protected $schemas = [];
    protected $namespace;
    protected $router;
    protected $connection;
    protected $cache;
    protected $log;
    protected $isActive = false;
    protected $isEnabled = false;

    private static $instances = [];
    public function __construct()
    {
        
    }

    /**
     * Get instance it self if available. 
     * 
     * This is a using singleton class, ist mean. if we have already instance of itself. we cant instance again using both same contains property.
     * just return it back to the client.
     * 
     * @return Server
     * @inheritDoc
     */
    public static function getInstance(): Server
    {
        $selfClass = static::class;
        if(!isset(self::$instances[$selfClass])){
            self::$instances[$selfClass] = new static();
        }

        return self::$instances[$selfClass];
    }
}