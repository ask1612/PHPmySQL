<?php

/**
 * I do not sleep tonight... I may not ever...
 * askjson_save.php
 * @author ASK
 * Here will be  saved  a new person data  record
 */
//Get person  name and surname
$personDataArr = $jsonArr[TAG_DATA];
$res=array();
//DEBUG
//$response[TAG_SUCCESS] = 1;
//$response[TAG_MESSAGE] = $personDataArr;
//die(json_encode($response));
//DEBUG


for ($index = 0; $index < count($personDataArr); $index++) {
    $pname = $personDataArr[$index][TAG_PSNNAME]; //person  name
    $psurname = $personDataArr[$index][TAG_SURNAME]; //person surname
//Address
    $pcity = $personDataArr[$index][TAG_ADDRESS][TAG_CITY]; //city
    $pstreet = $personDataArr[$index][TAG_ADDRESS][TAG_STREET]; //street
    $pbuild = $personDataArr[$index][TAG_ADDRESS][TAG_BUILD]; //build
    $pflat = $personDataArr[$index][TAG_ADDRESS][TAG_FLAT]; //flat
    
    $res[]= 'Hello ,' . $pname . ' ' . $psurname . "\n"
            . 'Address: ' . "\n"
            . $pcity . "\n"
            . $pstreet . "\n"
            . $pbuild . "\n"
            . $pflat."\n"
    ;
}

$response[TAG_SUCCESS] = 1;
$response[TAG_MESSAGE] =$res[1].$res[0]  ;
echo json_encode($response);

