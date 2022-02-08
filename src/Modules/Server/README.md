# <h1>The ```Json-api-core Server Module``` Documentation</h1>
## About
### Basic Idea
### Anatomy Of Server
#### Server
#### Registry 
#### Container 
## Feature
## Installation
## Usage
### Creating Server
### Creating Registry
### Load Server Into Registry
### Best practice
```
/**
* instead of using all of about procedural style to cretate registry and loading all server instance. using this best practice to create server and assign into registry
*/

use ElhakimDev\JsonApiCore\Examples\Server\ServerOne;
use ElhakimDev\JsonApiCore\Examples\Server\ServerThree;
use ElhakimDev\JsonApiCore\Examples\Server\ServerTwo;
use ElhakimDev\JsonApiCore\Modules\Server\Contracts\ServerContract;
use ElhakimDev\JsonApiCore\Modules\Server\Factories\RegistryFactory;



RegistryFactory::create('registry')->loadServers(
    ServerOne::getInstance()->configure(
        fn(ServerContract $server) => $server->activated()
    ),
    ServerTwo::getInstance()->configure(
        fn(ServerContract $server) => $server->activated()
    ),
    ServerThree::getInstance()->configure(
        fn(ServerContract $server) => $server->activated()
    ),
);
```
> <h3 style="color: red; font-weight: bold;">Warning</h3 >
> <div style="text-align: justify; color: red;"> if you instance a multiple same server instance in a time you will get a single instance, its a benefit about using a singleton pattern, we assume the server is a single class that available globally as we registered into service container trough registry loader. we dont need multiple same instance, because it will raise an redundant of object creation. consider, if we have a server instance available on registry. we just call it , no recreating new instancee, in this example we try to recreating same object instance at the time, then try to dump. you will look that same instance will be called once.</div>
```
RegistryFactory::create('registry')->loadServers(
    ......
    ServerThree::getInstance()->configure(
        fn(ServerContract $server) => $server->activated()
    ),
    ServerThree::getInstance()->configure(
        fn(ServerContract $server) => $server->activated()
    )
    ServerThree::getInstance()->configure(
        fn(ServerContract $server) => $server->activated()
    ),
    ServerThree::getInstance()->configure(
        fn(ServerContract $server) => $server->activated()
    )
);
```
## Change Log