<?php

namespace SMS\Message;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use SMS\Message;
use SMS\SmsDbAdapter;
use SMSModel\Sms\SmsRepository;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class SmsRepositoryFactory implements FactoryInterface{

    public function __invoke(ContainerInterface $serviceManager, $requestedName, array $options = null)
    {
        $smsDbAdapter = $serviceManager->get(SmsDbAdapter::class);
        $message = $serviceManager->get(Message::class);
        return new SmsRepository($smsDbAdapter, $message);
    }
}