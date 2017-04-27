<?php

namespace Silvioq\LASBundle\Tests\Service;

use Silvioq\LASBundle\LoggerAwareService;

class LoggedService extends LoggerAwareService
{

    public function echoLog($value)
    {
        $this->getLogger()->info( $value );
    }
}
