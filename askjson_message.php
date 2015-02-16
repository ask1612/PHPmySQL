<?php

/**
 * askjson_message.php
 * @author ASK
 * https://github.com/ask1612/PHPmySQL.git 
 * 
 * Message class
 */
class Message {

    /**
     * Function to create JSON message for client application
     */
    public function echoBox($success, $message, $data) {
        $response[TAG_SUCCESS] = $success;
        $response[TAG_MESSAGE] = $message;
        $response[TAG_DATA] = $data;
        return json_encode($response);
    }

    /**
     * Function to create JSON message for client application
     */
    public function debugOut($var) {
        $str = var_export($var, true);
        $response[TAG_SUCCESS] = 0;
        $response[TAG_MESSAGE] = $str;
        die(json_encode($response));
    }

}
