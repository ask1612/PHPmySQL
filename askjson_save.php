<?php

/**
 * Niemand ist perfekt.
 * I do not sleep tonight... I may not ever...
 * askjson_save.php
 * @author ASK
 * Here will be  saved  a new person data  record
 */
//Get person  DATA and HEAD tags
$pData = $jsonArr[TAG_DATA];
$pHead=$jsonArr[TAG_HEAD];

$pUserName=$pHead[TAG_NAME];//user name who is login 

    /**DEBUG
        $str = var_export($personData, true);
        $response[TAG_SUCCESS] = 0;
        $response[TAG_MESSAGE] = $str;
        die(json_encode($response));
     * 
     */
    $pName = $pData[TAG_PSNNAME]; //person  name
    $pSurname = $pData[TAG_SURNAME]; //person surname
//Address
    $pAddress=$pData[TAG_ADDRESS];
     /**DEBUG
        $str = var_export($address, true);
        $response[TAG_SUCCESS] = 0;
        $response[TAG_MESSAGE] = $str;
        die(json_encode($response));
      * 
      */
   
    $pCity = $pAddress[TAG_CITY]; //city
    $pStreet = $pAddress[TAG_STREET]; //street
    $pBuild = $pAddress[TAG_BUILD]; //build
    $pFlat = $pAddress[TAG_FLAT]; //flat
    
     /**DEBUG
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
     * 
     */
    
$arrPerson=[];
$arrPerson[TAG_PSNNAME]=$pname;
$arrPerson[TAG_SURNAME]=$pname;
$arrPerson[TAG_NAME]=$pUserName;
 
