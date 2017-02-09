<?php
namespace SMS_API_Services\Controller\Factories;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use SMS_API_Services\Controller\XmlController;
use SMSModel\Sms\SmsRepository;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\View\Model\ViewModel;

class ViewControllerFactory implements FactoryInterface
{

    public function __invoke(ContainerInterface $serviceManager, $requestedName, array $options = null)
    {
        $viewModelFactory = new ViewFactory();
        $smsRepositoryClass = $serviceManager->get(SmsRepository::class);
        return new XmlController($viewModelFactory, $smsRepositoryClass);
    }
}