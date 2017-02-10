<?php

namespace SMSModel\Sms;

use SMSModel\Sms\SmsRepository as SmsRepositoryDepencencies;

/**
 * Class SmsRepository
 * @package SMSModel\Sms
 */
class SmsRepository implements SmsRepositoryDepencencies\SmsRepositoryInterface
{
    /**
     * @var SmsRepository\DataPersistanceInterface
     */
    private $_connector;
    /**
     * @var SmsInterface
     */
    private $_smsResolver;

    /**
     * SmsRepository constructor.
     * @param SmsRepository\DataPersistanceInterface $smsDbConnector
     * @param SmsInterface $sms
     */
    public function __construct(
        SmsRepositoryDepencencies\DataPersistanceInterface $smsDbConnector,
        SmsInterface $sms)
    {
        $this->_connector = $smsDbConnector;
        $this->_smsResolver = $sms;
    }

    private function indexCountriesByMCC($countries)
    {
        $countriesByMCC=array();
        foreach($countries as $index => $rowContentObject)
        {
            $countriesByMCC[$rowContentObject['MobileCountryCode']]=$rowContentObject;
        }
        return $countriesByMCC;
    }
    /**
     * @param $receiver
     * @return int
     */
    protected function resolveCountryCodeByReceiver($receiver)
    {
        $countryCode = -1;

        if (preg_match('/^\+?([0-9\/ -]{3})/', $receiver, $match)) {
            $countryCode = intval($match[1]);
        }
        return $countryCode;
    }

    /**
     * @todo Create one exception type
     * @param $from
     * @param $to
     * @param $text
     * @return Array
     * @throws \Exception
     */
    public function sendSms($from, $to, $text)
    {
        $countryRow = $this->_connector->queryCountryByCountryCode(
            $this->resolveCountryCodeByReceiver($to)
        );

        if (isset($countryRow['id'])) {
            $this->_smsResolver->sendAction($from, $to, $text);
            $smsData = $this->_smsResolver->getData();
            $smsData['ReceiverCountryId'] = $countryRow['id'];

            if (!$this->_connector->persistSMS($smsData)) {
                throw new \Exception('SMS Data could not be stored int the database');
            }
        }
        return $this->_smsResolver->getState();
    }

    /**
     * @return array
     */
    public function getCountries()
    {
        return $this->indexCountriesByMCC($this->_connector->queryCountries());
    }

    /**
     * @param $dateTimeFrom
     * @param $dateTimeTo
     * @param $skip
     * @param $take
     * @return array
     */
    public function getSentSms($dateTimeFrom, $dateTimeTo, $skip, $take)
    {
        return $this->_connector->querySentSms(
            (string)$dateTimeFrom,
            (string)$dateTimeTo,
            (int)$skip,
            (int)$take
        );
    }

    /**
     * @param $dateFrom
     * @param $dateTo
     * @param $mccList
     * @return array
     */
    public function getStatistics($dateFrom, $dateTo, $mccList)
    {
        return $this->_connector->queryStatistics(
            (string)$dateFrom,
            (string)$dateTo,
            (string)$mccList
        );
    }
}
