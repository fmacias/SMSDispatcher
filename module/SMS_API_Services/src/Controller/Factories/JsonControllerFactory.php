<?php
namespace SMS_API_Services\Controller\Factories;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use SMS_API_Services\Controller\JsonController;
use SMSModel\Sms\SmsRepository;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class JsonControllerFactory
 * @package SMS_API_Services\Controller\Factories
 */
class JsonControllerFactory implements FactoryInterface
{

    /**
     * @param ContainerInterface $serviceManager
     * @param string $requestedName
     * @param array|null $options
     * @return JsonController
     */
    public function __invoke(ContainerInterface $serviceManager, $requestedName, array $options = null)
    {
        $jsonModelFactory = new JsonFactory();
        $smsRepositoryClass = $serviceManager->get(SmsRepository::class);
        return new JsonController($jsonModelFactory, $smsRepositoryClass);
    }
}