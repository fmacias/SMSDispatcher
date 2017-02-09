<?php

namespace SMS;

use Interop\Container\ContainerInterface;
use SMS\Message;
use SMS\SmsDbAdapter;
use SMSModel\Sms\SmsRepository;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterServiceFactory;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ServiceManager\Factory\InvokableFactory;

class Module implements ServiceProviderInterface
{

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Message::class => InvokableFactory::class,
                SmsDbAdapter::class => SmsDbAdapterFactory::class,
                SmsRepository::class => SmsRepositoryFactory::class,
                Adapter::class=>AdapterServiceFactory::class
            ]
        ];
    }
}