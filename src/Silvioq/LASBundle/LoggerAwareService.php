<?php

namespace Silvioq\LASBundle;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;

abstract class LoggerAwareService 
{
    /**
     * LoggerInterface
     */
    private $logger;
    
    
    public function setLogger( LoggerInterface $logger )
    {
        $this->logger = $logger;
    }
    
    /**
     * @return LoggerInterface
     */
    protected function getLogger( )
    {
        return $this->logger;
    }

}
