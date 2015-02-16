<?php

/**
 * askjson_input.php
 * @author ASK
 * https://github.com/ask1612/PHPmySQL.git 
 * 
 */
require_once __DIR__ . '/askjson_config.php';
//Get JSON object
$jsonString = filter_input(INPUT_POST, TAG_JSON);
$jsonArr = json_decode($jsonString, true);

$button = trim($jsonArr[TAG_HEAD][TAG_BTN]); //get clicked button from the header

switch ($button) {
    case VAL_BTNLOG:
        require_once __DIR__ . '/askjson_login.php';
        break;
    case VAL_BTNREG:
        require_once __DIR__ . '/askjson_register.php';
        break;
    case VAL_BTNSAVE:
        require_once __DIR__ . '/askjson_save.php';
        break;
}

    