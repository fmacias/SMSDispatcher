<?php
namespace SMSTest\Message;

use SMSModel\Sms\SmsInterface;

class MockMessage implements SmsInterface{

    public function sendAction($from, $to, $text)
    {
        // TODO: Implement sendAction() method.
    }

    public function getData()
    {
        // TODO: Implement getData() method.
    }

    public function getState()
    {
        // TODO: Implement getState() method.
    }
}