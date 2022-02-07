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
}
