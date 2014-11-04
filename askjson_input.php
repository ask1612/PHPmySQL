<?php

/**
 * I do not sleep tonight... I may not ever...
 * askjson_input.php
 * @author ASK
 * 
 */
require_once __DIR__ . '/askjson_config.php';
//Get JSON object
$jsonString = filter_input(INPUT_POST, TAG_JSON);
$jsonArr = json_decode($jsonString, true);
$button = trim($jsonArr[TAG_BTN]); //Button
if ($button == VAL_BTNLOG) {
    //Get user name and password 
    $username = trim($jsonArr[TAG_NAME]); //User name
    $userpwd = trim($jsonArr[TAG_PWD]); //Password
    require_once __DIR__ . '/askjson_login.php';
} elseif ($button == VAL_BTNREG) {
    //Get user name and password 
    $username = trim($jsonArr[TAG_NAME]); //User name
    $userpwd = trim($jsonArr[TAG_PWD]); //Password
    require_once __DIR__ . '/askjson_register.php';
}elseif ($button == VAL_BTNSAVE) {
    //Get user name and password 
    $personname = trim($jsonArr[TAG_NAME]); //User name
    $persomsurname = trim($jsonArr[TAG_SURNAME]); //Password
    require_once __DIR__ . '/askjson_save.php';
}
    