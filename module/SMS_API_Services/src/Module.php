<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace SMS_API_Services;

use SMS_API_Services\Controller\Factories\JsonFactory;
use SMS_API_Services\Controller\Factories\ViewFactory;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

class Module implements ConfigProviderInterface, BootstrapListenerInterface, ServiceProviderInterface
{
    const VERSION = '3.0.2dev';

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap(EventInterface $e)
    {
        //Each time the page loads
        return;
    }

    public function getServiceConfig()
    {
        return [
            'factories'=>[
                ViewModel::class=>ViewFactory::class,
                JsonModel::class=>JsonFactory::class
            ]
        ];
    }
}
