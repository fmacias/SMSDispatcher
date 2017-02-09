<?php
namespace SMS_API_Services\Controller;

use SMS_API_Services\Controller\Factories\JsonFactory;
use SMSModel\Sms\SmsRepository;
use Zend\Mvc\Controller\AbstractActionController;

class JsonController extends AbstractActionController
{
    private $_jsonFactory;
    private $_smsRepository;

    public function __construct(JsonFactory $jsonFactory, SmsRepository $smsRepository)
    {
        $this->_jsonFactory = $jsonFactory;
        $this->_smsRepository = $smsRepository;
    }
    private function dispatchJson($variable)
    {
        return $this->_jsonFactory->create($variable)->setTerminal(true);
    }
    public function sendSmsJsonAction()
    {
        return $this->dispatchJson(
            $this->_smsRepository->sendSms(
                $this->params()->fromQuery('from'),
                urldecode($this->params()->fromQuery('to')),
                $this->params()->fromQuery('text')
            )
        );
    }
    public function getCountriesJsonAction()
    {
        return $this->dispatchJson($this->_smsRepository->getCountries());
    }
    public function sentJsonAction()
    {
        return $this->dispatchJson(
            $this->_smsRepository->getSentSms(
                $this->params()->fromQuery('dateTimeFrom'),
                $this->params()->fromQuery('dateTimeTo'),
                $this->params()->fromQuery('skip'),
                $this->params()->fromQuery('take')
            )
        );
    }
    public function statisticsJsonAction()
    {
        return $this->dispatchJson(
            $this->_smsRepository->getStatistics(
                $this->params()->fromQuery('dateFrom'),
                $this->params()->fromQuery('dateTo'),
                $this->params()->fromQuery('mccList')
            )
        );
    }
}