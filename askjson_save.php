<?php

/**
 * I do not sleep tonight... I may not ever...
 * askjson_save.php
 * @author ASK
 * Here will be  saved  a new person data  record
 */
//Get person  name and surname
$personData = $jsonArr[TAG_DATA];
//DEBUG
//$response[TAG_SUCCESS] = 1;
//$response[TAG_MESSAGE] = $personDataArr;
//die(json_encode($response));
//DEBUG


    $pname = $personData[TAG_PSNNAME]; //person  name
    $psurname = $personData[TAG_SURNAME]; //person surname
//Address
    $pcity = $personData[TAG_ADDRESS][TAG_CITY]; //city
    $pstreet = $personData[TAG_ADDRESS][TAG_STREET]; //street
    $pbuild = $personData[TAG_ADDRESS][TAG_BUILD]; //build
    $pflat = $personData[TAG_ADDRESS][TAG_FLAT]; //flat
    
    $res= 'Hello ,' . $pname . ' ' . $psurname . "\n"
            . 'Address: ' . "\n"
            . $pcity . "\n"
            . $pstreet . "\n"
            . $pbuild . "\n"
            . $pflat."\n"
    ;

$response[TAG_SUCCESS] = 1;
$response[TAG_MESSAGE] =$res;
echo json_encode($response);

