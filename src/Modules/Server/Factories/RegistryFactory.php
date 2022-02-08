<?php
namespace ElhakimDev\JsonApiCore\Modules\Server\Factories;

use ElhakimDev\JsonApiCore\Modules\Server\Contracts\RegistryFactoryContract;
use ElhakimDev\JsonApiCore\Modules\Server\Registry;

class RegistryFactory implements RegistryFactoryContract
{
    public static function create(string $name): Registry
    {
        return new Registry($name);
    }
}
