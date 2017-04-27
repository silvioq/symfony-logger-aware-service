<?php

namespace Silvioq\LASBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class SilvioqLASBundle extends Bundle
{
    public function build(ContainerBuilder $container )
    {
        parent::build($container);
        $container->addCompilerPass( new DependencyInjection\CompilerPass\LoggerInjectorCompilerPass() );
    }
}

