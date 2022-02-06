<?php

namespace ElhakimDev\JsonApiCore\Modules\Server\Concern;

use ElhakimDev\JsonApiCore\Modules\Server\Contracts\ServerManager;

class BaseServer implements ServerManager {
    protected string $name;
    protected string $uri;
    protected mixed $schemas = null;
    protected bool $isActive = false;
    public function __construct(string $name, string $uri, mixed $schemas = null)
    {
        $this->name     = $name;
        $this->uri      = $uri;
        $this->schemas  = $schemas;
    }

    /**
     * @inheritDoc
     */
    public function getName(): string {
        return $this->name;
    }


    /**
     * @return string
     */
    public function getUri(): string {
        return $this->uri;
    }
    public function getSchemas(): mixed {
        return $this->schemas ?? null;
    }
}