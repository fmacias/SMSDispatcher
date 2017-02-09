<?php

namespace SMSModelTest\Sms\SmsRepository;

use SMSModel\Sms\SmsRepository;

class MockDataPersistance implements SmsRepository\DataPersistanceInterface{

    public function persistSMS($asocArrayColumnValuePairs)
    {
        // TODO: Implement persistSMS() method.
    }

    public function querySentSms($dateTimeFrom, $dateTimeTo, $skip, $take)
    {
        // TODO: Implement querySentSms() method.
    }

    public function queryStatistics($dateTimeFrom, $dateTimeTo, $mccList)
    {
        // TODO: Implement queryStatistics() method.
    }

    public function queryCountries()
    {
        // TODO: Implement queryCountries() method.
    }

    public function queryCountryByCountryCode($countryCode)
    {
        // TODO: Implement queryCountryByCountryCode() method.
    }
}