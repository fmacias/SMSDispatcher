<?php

namespace SMS;

use SMSModel;
class Sms extends SMSModel\Sms{

    const dummyFile= '/tmp/sentSms.log';

    /**
     * Dummy implementation.
     * Instead to send the sms, adds one entry into the log file given at the constant dummyFile.
     * This method should be redefined to perform this action.
     */
    protected function dispatch($from, $to, $text)
    {
        file_put_contents(
            $this::dummyFile,
            sprintf('%s Sms sent From %s to %s. Message: %s', date("Y-m-d H:i:s"), $from, $to, $text),
            FILE_APPEND
        );
    }
}