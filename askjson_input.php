<?php

/**
 * I do not sleep tonight... I may not ever...
 * askjson_input.php
 * @author ASK
 * 
 */

require_once __DIR__.'/askjson_config.php';
//Get JSON object
$jsonString = filter_input(INPUT_POST,TAG_JSON);
$jsonArr=json_decode($jsonString,true);
//Feth user name and password 
$username =trim($jsonArr[TAG_NAME]);//User name
$userpwd=trim($jsonArr[TAG_PWD]);//Password
$button=trim($jsonArr[TAG_BTN]);//Button
if($button==TAG_LOG){
    require_once __DIR__.'/askjson_login.php';
    
}
elseif ($button==TAG_REG) {
    require_once __DIR__.'/askjson_register.php';

}
    