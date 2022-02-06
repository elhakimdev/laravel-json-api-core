<?php
namespace ElhakimDev\JsonApiCore\Modules\Server\Contracts;

interface ServerManager {
    /**
     * @return string string represent the server name;
     */
    public function getName(): string;
    /**
     * @return string string represent the request uri;
     */
    public function getUri(): string;
    /**
     * @return mixed mixed | array of schemas if provided;
     */
    public function getSchemas(): mixed;

}