Logger Aware Service for Symfony
================================

This bundle injects @logger service to any service that extends Silvioq\LASBundle\LoggerAwareService

[![Build Status](https://travis-ci.org/silvioq/symfony-logger-aware-service.svg?branch=master)](https://travis-ci.org/silvioq/symfony-logger-aware-service)

Register your bundle

```php
# app/AppKernel.php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel 
{   
    public function registerBundles()
    {
        $bundles = [  
            ...
            new Silvioq\LASBundle\LoggerAwareService(),
        ];
    }
}
```

Declare your service ...

```
# service.yml
service:
   my.awesome.service:
      class: My\AwesomeService
```

... and log anything

```php
# My/AwesomeService.php
namespace My;
use Silvioq\LASBundle\LoggerAwareService;

class AwesomeService  extends LoggerAwareService
{

    public function awesomeFunction()
    {
        // ...
        $this->getLogger()->info( "Log anything");
    }

}
