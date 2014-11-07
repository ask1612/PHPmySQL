<?php

/**
 * Niemand ist perfekt.
 * I do not sleep tonight... I may not ever...
 * askjson_save.php
 * @author ASK
 * https://github.com/ask1612/PHPmySQL.git 
 * Here will be  saved  a new person data  record
 */
//Get person  DATA and HEAD tags.
$personData = $jsonArr[TAG_DATA];
$personHead = $jsonArr[TAG_HEAD];

//Get ADDRESS tag.
$personAddress = $personData[TAG_ADDRESS];
$username = $personHead[TAG_NAME];

require_once __DIR__ . '/askjson_connect.php';
$db = new DB_Connect(); //Connect to databse. 
$res = $db->selectUser($username); //Get user ID.  
$user_id = $res[0][TAG_ID];
$address_id = 0;

$queryAddress = [];
$queryAddress[TAG_CITY] = $personAddress[TAG_CITY];
$queryAddress[TAG_STREET] = $personAddress[TAG_STREET];
$queryAddress[TAG_BUILD] = $personAddress[TAG_BUILD];
$queryAddress[TAG_FLAT] = $personAddress[TAG_FLAT];
$queryAddress[TAG_USER] = $user_id;

if (empty($personData[TAG_PSNNAME]) ||
        empty($personData[TAG_SURNAME]) ||
        empty($personAddress[TAG_CITY]) ||
        empty($personAddress[TAG_STREET]) ||
        $personAddress[TAG_BUILD] == 0 ||
        $personAddress[TAG_FLAT] == 0
) {//Field empty.
    $response[TAG_SUCCESS] = 0;
    $response[TAG_MESSAGE] = "Field  must not be empty";
    die(json_encode($response));
} else {
    $res = $db->selectAddress($queryAddress); //Search address.  
    if (count($res) == 0) {
        //Address   not found. Add new address.
        $res = $db->insertAddress($queryAddress);
        if ($res) {
            $res = $db->selectAddress($queryAddress); //Select  address to get id
            $address_id = $res[0][TAG_ID];
        } else {
            $response[TAG_SUCCESS] = 0;
            $response[TAG_MESSAGE] = 'Cannot insert addreess '
                    . 'Check the connection to the database.';
            die(json_encode($response));
        }
    } else {
        $address_id = $res[0][TAG_ID];
    }

//Create array to paas it as parameters for sql query
    $queryPerson = [];
    $queryPerson[TAG_PSNNAME] = $personData[TAG_PSNNAME];
    $queryPerson[TAG_SURNAME] = $personData[TAG_SURNAME];
    $queryPerson[TAG_ADDRESS] = $address_id;
    $queryPerson[TAG_USER] = $user_id;

    $res = $db->insertPerson($queryPerson); //insert new  address.  
    if ($res) {
        $response[TAG_SUCCESS] = 1;
        $response[TAG_MESSAGE] = 'Person data writen successfuly!';

        echo json_encode($response);
    } else {
        $response[TAG_SUCCESS] = 0;
        $response[TAG_MESSAGE] = 'Cannot insert person data '
                . 'Check the connection to the database.';
        die(json_encode($response));
    }
}

/**DEBUG
$str = var_export($res, true);
$response[TAG_SUCCESS] = 1;
$response[TAG_MESSAGE] = $str;
die(json_encode($response));
 * 
 */









