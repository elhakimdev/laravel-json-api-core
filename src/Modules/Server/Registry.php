<?php
namespace ElhakimDev\JsonApiCore\Modules\Server;

use ElhakimDev\JsonApiCore\Modules\Server\Concerns\Registry as ConcernsRegistry;

class Registry extends ConcernsRegistry {
    public function offsetSet(mixed $offset, mixed $value): void
    {
        
    }
    public function offsetGet(mixed $offset): mixed
    {
        
    }
    public function offsetExists(mixed $offset): bool
    {
        return true;
    }
    public function offsetUnset(mixed $offset): void
    {
        
    }
}

