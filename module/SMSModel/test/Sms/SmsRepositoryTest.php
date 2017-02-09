<?php

namespace SMSModelTest\Sms;

use SMSModel as SmsModel;
use SMSModelTest\Sms\SmsRepository as TestSmsRepository;

class SmsRepositoryTest extends  \PHPUnit_Framework_TestCase {
    public function testCreateSmsRepository(){
        $smsRepository=new SmsModel\Sms\SmsRepository(
            new TestSmsRepository\MockDataPersistance(),
            new TestSmsRepository\MockSms()
        );
        $this->assertInstanceOf(SmsModel\Sms\SmsRepository\SmsRepositoryInterface::class, $smsRepository);
    }
}