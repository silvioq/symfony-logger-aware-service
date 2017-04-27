<?php

namespace  Silvioq\LASBundle\Tests;

use Silvioq\LASBundle\DependencyInjection\CompilerPass\LoggerInjectorCompilerPass;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractCompilerPassTestCase;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Checks Bundle initialization
 * @see https://github.com/matthiasnoback/SymfonyDependencyInjectionTest#symfonydependencyinjectiontest
 */
class  CompilerPassTest extends AbstractCompilerPassTestCase
{

    protected function registerCompilerPass(ContainerBuilder $container)
    {
        $container->addCompilerPass(new LoggerInjectorCompilerPass() );
    }

    public  function  testIfServiceWasAwared( )
    {
        
        $logger = $this->createMock( '\Psr\Log\NullLogger' );
        
        $service = $this->createMock('Silvioq\LASBundle\LoggerAwareService');
        
        $toBeAwaredService = new Definition( get_class( $service ) );
        $this->setDefinition( 'tba_service', $toBeAwaredService );
        $this->setDefinition( 'logger', new Definition( $logger ) );
        
        $this->compile();
        $this->assertContainerBuilderHasServiceDefinitionWithMethodCall(
            'tba_service', 'setLogger', [ new Reference("logger") ]
        );
        
        $this->container->get('tba_service');
        
    }

    public  function  testIfServiceWasNotAwared( )
    {
        $toBeNotAwaredService = new Definition( \stdClass::class );
        $this->setDefinition( 'tbna_service', $toBeNotAwaredService );
        
        $this->compile();
        
        $serviceDefinition = $this->container->findDefinition( 'tbna_service' );

        $this->assertCount( 0, $serviceDefinition->getMethodCalls(),
                "Service has some method call");
                
        $this->assertNotNull( $this->container->get( 'tbna_service' ) );
    }

}

