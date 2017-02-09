<?php
namespace SMS_API_Services\Controller\Factories;

interface ViewFactoryInterface
{
    public function create($variables = null, $options = null);
}