<?php

namespace SMSModelTest\Sms;

use SMSModel\Sms\State;
use SMSModel\Sms\StateInterface;

class StateTest extends \PHPUnit_Framework_TestCase{
    public function testCreateState(){
        $state=new State();
        $this->assertInstanceOf(StateInterface::class,$state);
    }
}