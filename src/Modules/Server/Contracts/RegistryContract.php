<?php

namespace ElhakimDev\JsonApiCore\Modules\Server\Contracts;

interface RegistryContract {
    public function loadServers(array|ServerContract ...$servers);
}

