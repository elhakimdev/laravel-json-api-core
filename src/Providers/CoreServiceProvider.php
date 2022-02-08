<?php

namespace ElhakimDev\JsonApiCore\Providers;

use Illuminate\Support\ServiceProvider;
use ElhakimDev\JsonApiCore\Examples\Server\ServerOne;
use ElhakimDev\JsonApiCore\Examples\Server\ServerTwo;
use ElhakimDev\JsonApiCore\Examples\Server\ServerThree;
use ElhakimDev\JsonApiCore\Modules\Server\Contracts\ServerContract;
use ElhakimDev\JsonApiCore\Modules\Server\Factories\RegistryFactory;

class CoreServiceProvider extends ServiceProvider{
    public function register()
    {
        $this->app->bind('Registry', 
            RegistryFactory::create('registry')->loadServers(
                ServerOne::getInstance()->configure(
                    fn(ServerContract $server) => $server->enabled()->activated()->customize(
                        fn(ServerContract $server) => $server->setUri('api/v1/custom/callback')->setName('custom_name')
                    )
                ),
                ServerTwo::getInstance()->configure(
                    fn(ServerContract $server) => $server->enabled()
                ),
                ServerThree::getInstance()->configure(
                    fn(ServerContract $server) => $server->enabled()
                )
            )
        );
    }
}