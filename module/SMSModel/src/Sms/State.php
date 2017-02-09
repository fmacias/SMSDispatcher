<?php

namespace SMSModel\Sms;

/**
 * Class State
 * @package SMSModel\Sms
 */
class State implements StateInterface
{

    /**
     * Simulates on Enumeration object
     * @var array
     */
    private $_state = [
        'state' => StateInterface::NotSent,
        'posibleStates' => [
            StateInterface::NotSent => 'Failed',
            StateInterface::Sent => 'Sucess'
        ]
    ];

    /**
     * @param $state
     * @return $this
     */
    public function setState($state)
    {
        if (array_key_exists($state, $this->_state['posibleStates'])) {
            $this->_state['state'] = $state;
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getPosibleStates()
    {
        return $this->_state['posibleStates'];
    }

    /**
     * @return array
     */
    public function getState()
    {
        return $this->_state;
    }
}