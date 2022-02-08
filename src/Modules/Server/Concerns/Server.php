<?php

namespace ElhakimDev\JsonApiCore\Modules\Server\Concerns;

use ElhakimDev\JsonApiCore\Modules\Server\Contracts\ServerContract;

abstract class Server implements ServerContract {
    /**
     * The name of server
     *
     * @var string
     */
    protected $name;

    /**
     * The server uri
     *
     * @var string
     */
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

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Enabling the server.
     *
     * @return Server
     */
    public function enabled(): Server
    {
        $this->isEnabled = true;
        return $this;
    }

    /**
     * Disabling the server.
     *
     * @return Server
     */
    public function disabled(): Server
    {
        $this->isEnabled = false;
        return $this;
    }

    /**
     * Activate the server.
     *
     * @return Server
     */
    public function activated(): Server
    {
        $this->isActive = true;
        return $this;
    }

    /**
     * Deactivate the server.
     *
     * @return Server
     */
    public function deactivated(): Server
    {
        $this->isActive = false;
        return $this;
    }

    /**
     * Check activate status of given server.
     *
     * @return boolean
     */
    public function checkActiveStatus(): bool
    {
        return $this->isActive;
    }

    /**
     * Check the available server.
     *
     * @return boolean
     */
    public function checkEnableStatus(): bool
    {
        return $this->isEnabled;
    }

    /**
     * A proxy method to configure the service instance.
     *
     * @param array|callable $configuration
     * @return Server
     */
    public function configure(array|callable $configuration): Server
    {
        if(is_callable($configuration)){
            return $configuration($this);
        }
    }
}