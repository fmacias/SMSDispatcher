<?php

namespace SMSModel\Sms\SmsRepository;


interface SmsRepositoryInterface
{
    /**
     * @param $from
     * @param $to
     * @param $text
     * @return array
     */
    public function sendSms($from, $to, $text);

    /**
     * @return array
     */
    public function getCountries();

    /**
     * @param $dateTimeFrom
     * @param $dateTimeTo
     * @param $skip
     * @param $take
     * @return array
     */
    public function getSentSms($dateTimeFrom, $dateTimeTo, $skip, $take);

    /**
     * @param $dateFrom
     * @param $dateTo
     * @param $mccList
     * @return array
     */
    public function getStatistics($dateFrom, $dateTo, $mccList);
}