<?php
namespace SMS_API_Services\Controller\Factories;

use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\View\Model\JsonModel;

class JsonFactory implements ViewFactoryInterface
{

    public function create($variables = null, $options = null)
    {
        return new JsonModel($variables, $options);
    }
}