<?php
namespace SMS_API_Services\Controller;

use SMS_API_Services\Controller\Factories\ViewFactory;
use SMSModel\Sms\SmsRepository;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class JsonController
 * @package SMS_API_Services\Controller
 */
class XmlController extends AbstractActionController
{
    /**
     * @var ViewFactory
     */
    private $_viewFactory;
    /**
     * @var SmsRepository
     */
    private $_smsRepository;

    /**
     * JsonController constructor.
     * @param ViewFactory $viewFactory
     * @param SmsRepository $smsRepository
     */
    public function __construct(ViewFactory $viewFactory, SmsRepository $smsRepository)
    {
        $this->_viewFactory = $viewFactory;
        $this->_smsRepository = $smsRepository;
    }
    /**
     * Should be refactored to use one PHP XML parser and should be added
     * into a kind of XmlModel service that should be injected into this controller over DI.
     * It is done just for now and it's here to keep clean the model.
     *
     */
    private function getXMLFromArray($arrayData)
    {
        $xmlString = '<?xml version="1.0" encoding="UTF-8"?>';
        $xmlString .= '<List>';
        foreach ($arrayData as $nodeName => $nodeValue) {
            $xmlString .= $this->arrayElementToXMLNode($nodeName,$nodeValue,$xmlString);
        }
        $xmlString .= '</List>';
        return $xmlString;
    }
    /**
     * @param $nodeName
     * @param $nodeValue
     * @param $xmlString
     */
    private function arrayElementToXMLNode($nodeName, $nodeValue,&$xmlString)
    {
        if (in_array(gettype($nodeValue),['array'])){
            if (count($nodeValue)>1){
                $xmlString.='<row>';
                foreach ($nodeValue as $_nodeName => $_nodeValue)
                {
                    $this->arrayElementToXMLNode($_nodeName,$_nodeValue,$xmlString);
                }
                $xmlString.='</row>';
            }else if (count($nodeValue)==1){
                $this->arrayElementToXMLNode($nodeName,$nodeValue,$xmlString);
            }
        }else {
            //if (in_array(gettype($nodeValue),['integer','double'])) $nodeName = '_' . (string)$nodeName;
            if (is_numeric($nodeName)) $nodeName = '_' . (string)$nodeName;
            $xmlString .= '<' . $nodeName . '>' . $nodeValue . '</' . $nodeName . '>';
        }
    }

    /**
     * @todo set Header properly with Zend2 Framework library
     * @param $xmlString
     * @return \Zend\Stdlib\ResponseInterface
     */
    private function setXMLContentIntoResponse($xmlString)
    {
        $__response = $this->getResponse();
        $__response->setContent($xmlString);
        header('Content-type: application/xml;charset=utf-8');
        return $__response;
    }

    public function sendSmsXmlAction()
    {
        return $this->setXMLContentIntoResponse(
            $this->getXMLFromArray(
                $this->_smsRepository->sendSms(
                    $this->params()->fromQuery('from'),
                    urldecode($this->params()->fromQuery('to')),
                    $this->params()->fromQuery('text')
                )
            )
        );
    }
    public function getCountriesXmlAction()
    {
        return $this->setXMLContentIntoResponse(
            $this->getXMLFromArray(
                $this->_smsRepository->getCountries()
            )
        );
    }
    public function sentXmlAction()
    {
        return $this->setXMLContentIntoResponse(
            $this->getXMLFromArray(
                $this->_smsRepository->getSentSms(
                    $this->params()->fromQuery('dateTimeFrom'),
                    $this->params()->fromQuery('dateTimeTo'),
                    $this->params()->fromQuery('skip'),
                    $this->params()->fromQuery('take')
                )
            )
        );
    }
    public function statisticsXmlAction()
    {
        return $this->setXMLContentIntoResponse(
            $this->getXMLFromArray(
                $this->_smsRepository->getStatistics(
                    $this->params()->fromQuery('dateFrom'),
                    $this->params()->fromQuery('dateTo'),
                    $this->params()->fromQuery('mccList')
                )
            )
        );
    }
}