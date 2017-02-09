<?php
namespace SMSTest;

use SMS\SmsDbAdapter;
use SMSModel\Sms\SmsRepository\DataPersistanceInterface;
use Zend\Db\Adapter\Adapter;

class SmsDbAdapterTest extends \PHPUnit_Framework_TestCase{
    public function testCreateSmsDbAdapterTest(){
        $smsDbAdapter = new SmsDbAdapter(new Adapter(
                array('driver' => 'Pdo')
            )
        );
        $this->assertInstanceOf(DataPersistanceInterface::class,$smsDbAdapter);
    }
}