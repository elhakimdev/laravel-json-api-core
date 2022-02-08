<?php

namespace ElhakimDev\JsonApiCore\Modules\Server\Contracts;

use ElhakimDev\JsonApiCore\Modules\Server\Concerns\Server;

interface ServerContract {
    /**
     * Get a instance of it self with out allowed to clone;
     *
     * @return Server
     */
    public static function getInstance(): Server;
    
    /**
     * Get name of server.
     *
     * @return string The name of server.
     */
    public function getName();

    /**
     * Set the name of server
     *
     * @param string $name
     * @return void
     */
    public function setName($name);

    /**
     * Enabling server.
     *
     * @return Server
     */
    public function enabled(): Server;

    /**
     * Disabling the server.
     *
     * @return Server
     */
    public function disabled(): Server;

    /**
     * Activate the server.
     *
     * @return Server
     */
    public function activated(): Server;

    /**
     * Deactivate the server.
     *
     * @return Server
     */
    public function deactivated(): Server;

    /**
     * Check th active status of give server.
     *
     * @return boolean
     */
    public function checkActiveStatus(): bool;

    /**
     * Check the availaable status of server.
     *
     * @return boolean
     */
    public function checkEnableStatus(): bool;

    /**
     * Configure server.
     *
     * @param callable $configuration

     */
    public function configure(callable $configuration): Server;

    /**
     * Perform a customization callback.
     *
     * @param callable $callback The callback of customization.
     * @return Server
     */
    public function customize(callable $callback): Server ;
}
