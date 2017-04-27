<?php

namespace  Silvioq\LASBundle\Tests;

use PHPUnit\Framework\TestCase;
use Silvioq\LASBundle\Tests\Service\LoggedService;

class ServiceTest extends TestCase
{

    public function testGetLogger()
    {
        $mockLogger = $this->createMock( '\Psr\Log\NullLogger' );
        $mockLogger
            ->expects($this->once())
            ->method('info')
            ->with($this->equalTo('toBeLog'))
            ;
        
        $service = new LoggedService();
        $service->setLogger( $mockLogger );
        
        $service->echoLog( 'toBeLog');
    }

}
