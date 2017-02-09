<?php

namespace SMS_API_Services\Controller\Factories;

use Zend\View\Model\ViewModel;

class ViewFactory implements ViewFactoryInterface
{

    public function create($variables = null, $options = null)
    {
        return new ViewModel($variables, $options);
    }
}
