<?php
namespace ElhakimDev\JsonApiCore\Modules\Server;

use ElhakimDev\JsonApiCore\Modules\Server\Concern\BaseServer;
use ElhakimDev\JsonApiCore\Modules\Server\Contracts\ServerManager;

abstract class Server extends BaseServer
{
    public function __construct(string $name, string $uri, mixed $schemas = null)
    {
        parent:: __construct($name, $uri, $schemas);
    }
}
