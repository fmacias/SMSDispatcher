<?php

namespace SMSModel;

/**
 * Class Sms
 * @package SMSModel
 */
abstract class Sms extends Sms\State implements Sms\SmsInterface
{

    /**
     * @var array
     */
    private $_data = [
        'Sender' => '',
        'Receiver' => '',
        'Text' => '',
        'IsSent' => '',
        'DateFrom' => '',
        'DateTo' => ''
    ];

    /**
     * @param $from
     * @param $to
     * @param $text
     * @return mixed
     */
    abstract protected function dispatch($from, $to, $text);

    /**
     * @param $from
     * @param $to
     * @param $text
     */
    public function sendAction($from, $to, $text)
    {
        $this->setState($this::NotSent);
        $this->dispatch();
        $this->setState($this::Sent);
        $this->_data = [
            'Sender' => $from,
            'Receiver' => $to,
            'Text' => $text,
            'IsSent' => $this::Sent,
            'DateFrom' => date("Y-m-d H:i:s"),
            'DateTo' => date("Y-m-d H:i:s")
        ];
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->_data;
    }
}