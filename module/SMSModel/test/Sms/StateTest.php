<?php

namespace SMSModelTest\Sms;

use SMSModel\Sms\State;

class StateTest extends \PHPUnit_Framework_TestCase{
    public function testCreateState(){
        $state=new State();
        $this->assertInstanceOf(State::class,$state);
    }
}