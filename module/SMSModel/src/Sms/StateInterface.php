<?php

namespace SMSModel\Sms;

/**
 * Interface StateInterface
 * @package SMSModel\Sms
 */
interface StateInterface
{
    /**
     *
     */
    const Sent = 1;
    /**
     *
     */
    const NotSent = 0;

    /**
     * @param $state
     * @return $this
     */
    public function setState($state);

    /**
     * @return array
     */
    public function getPosibleStates();

    /**
     * @return array
     */
    public function getState();
}