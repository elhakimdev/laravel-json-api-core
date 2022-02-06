<?php

namespace ElhakimDev\JsonApiCore\Modules\Server;

use ElhakimDev\JsonApiCore\Modules\Server\Concern\BaseRegistry;
use ElhakimDev\JsonApiCore\Modules\Server\Contracts\RegistryManager;

abstract class Registry extends BaseRegistry 
{
    public function __construct(string $name, mixed $servers = null)
    {
        parent::__construct($name, $servers);
    }
}
