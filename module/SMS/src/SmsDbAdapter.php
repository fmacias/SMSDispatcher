<?php

namespace SMS;

use SMSModel\Sms\SmsRepository\DataPersistanceInterface;
use Zend\Db\Adapter\Adapter;

class SmsDbAdapter implements DataPersistanceInterface
{

    /**
     * @var Adapter
     */
    protected $_zendDbAdapter;

    /**
     * SmsDbConnector constructor.
     * @param Adapter $zendDbAdapter
     */
    public function __construct(Adapter $zendDbAdapter)
    {
        $this->_zendDbAdapter = $zendDbAdapter;
    }

    /**
     * @param $columns
     * @return mixed
     */
    private function qi($columns)
    {
        foreach ($columns as &$columnName) {
            $columnName = $this->_zendDbAdapter->platform->quoteIdentifier($columnName);
        }
        return $columns;
    }

    /**
     * @param $value
     * @return mixed
     */
    private function qtv($value)
    {
        return $this->_zendDbAdapter->platform->quoteTrustedValue($value);
    }

    /**
     * @param $values
     * @return mixed
     */
    private function qtvAll($values)
    {
        foreach ($values as &$value) {
            $value = $this->qtv($value);
        }
        return $values;
    }

    /**
     * @param $asocciativeArrayOfKeyValuesIndexedByColumnName
     * @return bool
     * @throws \Exception
     */
    public function persistSMS($asocciativeArrayOfKeyValuesIndexedByColumnName)
    {
        try {
            $columns = implode(',', $this->qi(array_keys($asocciativeArrayOfKeyValuesIndexedByColumnName)));
            $values = implode(',', $this->qtvAll(array_values($asocciativeArrayOfKeyValuesIndexedByColumnName)));
            $queryString = sprintf('INSERT INTO `Sms` (%s) values (%s)', $columns, $values);
            $statement = $this->_zendDbAdapter->createStatement($queryString);
            $statement->execute();
        }catch (\Exception $e){
            throw new \Exception('SmsDbAdapter::persistSMS() fails. '.$e->getMessage());
        }
        return true;
    }

    /**
     * @param $dateTimeFrom
     * @param $dateTimeTo
     * @param $skip
     * @param $take
     * @return array
     */
    public function querySentSms($dateTimeFrom, $dateTimeTo, $skip, $take)
    {
        $ouput=[];
        $sql = 'SELECT `dateTo` as `DateTime`, `MobileCountryCode` as `MCC`,`c`.`Name` as `CountryName`,' .
            '`Sender` as `From`,`Receiver` as `To`,' .
            '`PricePerSms` FROM `Sms` s INNER JOIN `Countries` `c` ON  (`s`.`ReceiverCountryId`=`c`.`id`)' .
            ' WHERE `IsSent`=1 AND `dateTo`>=' . $this->qtv($dateTimeFrom) .
            ' AND `dateTo` <=' . $this->qtv($dateTimeTo) . ' LIMIT ' . $skip . ',' . $take;
        $result=$this->_zendDbAdapter->query($sql, []);

        if ($result->valid()) $ouput=$result->toArray();
        return $ouput;
    }

    /**
     * @param $dateTimeFrom
     * @param $dateTimeTo
     * @param $mccList
     * @return array
     */
    public function queryStatistics($dateTimeFrom, $dateTimeTo, $mccList)
    {
        $mccCondition = (!empty($mccList)) ? 'AND (`c`.`MobileCountryCode` IN (' . $mccList . ')) ' : '';

        $sql = 'SELECT DATE_FORMAT(`dateTo`,' . $this->qtv('%Y-%m-%d') . ') as `Day`,' .
            '`c`.`MobileCountryCode` as `MCC`,`c`.`Name` as `CountryName`,`c`.`PricePerSms`,count(`s`.`id`) as `Count`,' .
            'sum(round(`c`.`PricePerSms`,2)) as `TotalPrice` ' .
            'FROM `Sms` s ' .
            'INNER JOIN `Countries` c ' .
            'ON  (`s`.`ReceiverCountryId`=`c`.`id`) ' .
            'WHERE `dateTo` BETWEEN ' . $this->qtv($dateTimeFrom) . ' AND ' . $this->qtv($dateTimeTo) .
            $mccCondition .
            ' GROUP BY day(dateTo),MobileCountryCode';
        return $this->_zendDbAdapter->query($sql, [])->toArray();
    }

    /**
     * @return array
     */
    public function queryCountries()
    {
        return $this->_zendDbAdapter->query('SELECT * FROM `Countries`', [])->toArray();
    }

    /**
     * @param $countryCode
     * @return array
     */
    public function queryCountryByCountryCode($countryCode)
    {
        $output = $this->_zendDbAdapter->query('SELECT * FROM `Countries` where `CountryCode`=? Limit 1',
            [$countryCode])->toArray();

        if (count($output) == 1) $output = $output[0];

        return $output;
    }
}