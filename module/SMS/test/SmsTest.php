<?php
namespace SMSTest;

use SMS\Sms;
use SMSModel\Sms\SmsInterface;

class SmsTest extends \PHPUnit_Framework_TestCase{
    public function testCreateSMS(){
        $sms = new Sms();
        $this->assertInstanceOf(SmsInterface::class,$sms);
    }
}