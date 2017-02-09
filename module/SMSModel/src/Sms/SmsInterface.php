<?php

namespace SMSModel\Sms;

interface SmsInterface{
    /**
     * @param $from
     * @param $to
     * @param $text
     * @return void
     */
    public function sendAction($from, $to, $text);

    /**
     * @return array
     */
    public function getData();

    /**
     * Associative array that simulates something like one Enumeration
     * @return Array
     */
    public function getState();
}