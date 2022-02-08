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
     * @return Server
     */
    public function configure(callable $configuration): Server;
}
