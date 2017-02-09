<?php
namespace SMS\Message;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use SMS\SmsDbAdapter;
use Zend\Db\Adapter\Adapter;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class SmsDbAdapterFactory implements FactoryInterface{

    public function __invoke(ContainerInterface $serviceManager, $requestedName, array $options = null)
    {
        $zendDbAdapter = $serviceManager->get(Adapter::class);
        return new SmsDbAdapter($zendDbAdapter);
    }
}