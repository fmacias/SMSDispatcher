<?php
namespace SMSTest;

use SMS\Message;
use SMSModel\Sms\SmsInterface;

class MessageTest extends \PHPUnit_Framework_TestCase{
    public function testCreateMessage(){
        $sms = new Message();
        $this->assertInstanceOf(SmsInterface::class,$sms);
    }
}