<?php

namespace SMS;

use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ServiceProviderInterface {

    public function getServiceConfig()
    {
        return [];
    }
}