<?php

namespace ElhakimDev\JsonApiCore\Modules\Server\Contracts;

use ElhakimDev\JsonApiCore\Modules\Server\Concerns\Server;

interface RegistryContract {
    /**
     * Load servers from given parameters
     *
     * @param array|ServerContract ...$servers The array of servers that will be loaded to registry.
     * @return void
     */
    public function loadServers(array|ServerContract ...$servers);
    public function getServer(mixed $name): Server;
}

