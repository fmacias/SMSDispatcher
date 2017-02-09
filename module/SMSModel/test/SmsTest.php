<?php

namespace SMSModelTest;

use SMSModelTest\Sms\SmsRepository as SmsRespositoryTest;
use SMSModel\Sms;

class SmsTest extends \PHPUnit_Framework_TestCase{
    public function testCanCreateSmsObject(){
        $sms = new SmsRespositoryTest\MockSms();
        $this->assertInstanceOf(Sms\SmsInterface::class, $sms);
    }
}