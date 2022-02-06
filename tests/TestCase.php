<?php

use ElhakimDev\JsonApiCore\Providers\CoreServiceProvider;
use Orchestra\Testbench\TestCase as TestbenchTestCase;

class TestCase extends TestbenchTestCase {

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @inheritDoc
     */
    protected function getApplicationProviders($app)
    {
        return [
            CoreServiceProvider::class
        ];
    }

    /**
     * @inheritDoc
     */
    protected function getEnvironmentSetUp($app)
    {
        
    }
}