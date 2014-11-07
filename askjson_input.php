<?php

/**
 * Niemand ist perfekt.
 * I do not sleep tonight... I may not ever...
 * askjson_input.php
 * @author ASK
 * https://github.com/ask1612/PHPmySQL.git 
 * 
 */
require_once __DIR__ . '/askjson_config.php';
//Get JSON object
$jsonString = filter_input(INPUT_POST, TAG_JSON);
$jsonArr = json_decode($jsonString, true);

//
$button = trim($jsonArr[TAG_HEAD][TAG_BTN]); //clicked button 
if ($button == VAL_BTNLOG) {
    require_once __DIR__ . '/askjson_login.php';
} elseif ($button == VAL_BTNREG) {
    require_once __DIR__ . '/askjson_register.php';
} elseif ($button == VAL_BTNSAVE) {
    require_once __DIR__ . '/askjson_save.php';
}
    