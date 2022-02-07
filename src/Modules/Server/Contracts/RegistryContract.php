<?php

namespace ElhakimDev\JsonApiCore\Modules\Server\Contracts;

interface RegistryContract {
    /**
     * Load servers from given parameters
     *
     * @param array|ServerContract ...$servers The array of servers that will be loaded to registry.
     * @return void
     */
    public function loadServers(array|ServerContract ...$servers);
}

