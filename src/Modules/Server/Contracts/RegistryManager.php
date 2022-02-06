<?php

namespace ElhakimDev\JsonApiCore\Modules\Server\Contracts;

use ElhakimDev\JsonApiCore\Modules\Server\Exceptions\ServerNotLoadedException;

interface RegistryManager {
    /**
     * Set the name of reigstry
     *
     * @param string $name The name of registry
     * @return void
     */
    public function setName(string $name): void;

    /**
     * Load servers into registry.
     *
     * @param ServerManager ...$servers The array of ServerManager instance that will be loaded into registry
     * @return void
     */
    public function loadServer(ServerManager ...$servers): void;

    /**
     * Get the server by given key
     *
     * @param string $serverName The key/name of the server that will be fetch on registry.
     * @return ServerManager It will return an instance of ```ServerManager::class``` if given params is exist on server registry.
     * @throws ServerNotLoadedException The exception that will throw if given $serverName is not exist on loaded server registry.
     */
    public function getServer(string $serverName): ServerManager;
}