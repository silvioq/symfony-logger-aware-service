<?php

namespace  Silvioq\LASBundle\Tests;

use Silvioq\LASBundle\DependencyInjection\SilvioqLASExtension;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;

use Symfony\Component\DependencyInjection\Definition;

/**
 * Checks Bundle initialization
 * @see https://github.com/matthiasnoback/SymfonyDependencyInjectionTest#symfonydependencyinjectiontest
 */
class  DependencyTest extends AbstractExtensionTestCase
{

    protected function getContainerExtensions()
    {
        return [
            new SilvioqLASExtension(),
        ];
    }

    public  function  testDependencies( )
    {
        $this->load();
        //$this->assertContainerBuilderHasService( 'silvioq.las.start' );
    }

}

