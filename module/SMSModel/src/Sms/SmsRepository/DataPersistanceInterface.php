<?php

namespace SMSModel\Sms\SmsRepository;

interface DataPersistanceInterface{
    /**
     * @param $asocciativeArrayOfKeyValuesIndexedByColumnName
     * @return bool
     */
    public function persistSMS($asocciativeArrayOfKeyValuesIndexedByColumnName);

    /**
     * @param $dateTimeFrom
     * @param $dateTimeTo
     * @param $skip
     * @param $take
     * @return array
     */
    public function querySentSms($dateTimeFrom, $dateTimeTo, $skip, $take);

    /**
     * @param $dateTimeFrom
     * @param $dateTimeTo
     * @param $mccList
     * @return array
     */
    public function queryStatistics($dateTimeFrom, $dateTimeTo, $mccList);

    /**
     * @return array
     */
    public function queryCountries();

    /**
     * @param $countryCode
     * @return array
     */
    public function queryCountryByCountryCode($countryCode);
}