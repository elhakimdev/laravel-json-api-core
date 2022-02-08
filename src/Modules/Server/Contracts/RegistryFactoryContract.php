<?php

namespace ElhakimDev\JsonApiCore\Modules\Server\Contracts;

use ElhakimDev\JsonApiCore\Modules\Server\Concerns\Registry;

interface RegistryFactoryContract {
    public static function create(string $name): Registry;
}