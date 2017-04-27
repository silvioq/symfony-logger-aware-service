<?php
namespace Silvioq\LASBundle\DependencyInjection\CompilerPass;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Silvioq\LASBundle\LoggerAwareService;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Compiler pass for inject logger
 * @see http://symfony.com/doc/current/components/dependency_injection/compilation.html#components-di-separate-compiler-passes
 */
class LoggerInjectorCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        foreach( $container->getDefinitions() as $definition )
        {
            if( $definition->getClass() instanceof LoggerAwareService )
            {
                $definition->addMethodCall( "setLogger", [new Reference("logger")] );
            }
        }
    }
}
