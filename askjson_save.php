<?php

/**
 * Niemand ist perfekt.
 * I do not sleep tonight... I may not ever...
 * askjson_save.php
 * @author ASK
 * https://github.com/ask1612/PHPmySQL.git 
 * Here will be  saved  a new person data  record
 */
require_once __DIR__ . '/askjson_connect.php';
require_once __DIR__ . '/askjson_message.php';
$db = new DB_Connect(); //Connect to databse. 
$box = new Message();

//Get person  DATA and HEAD tags.
$personData = $jsonArr[TAG_DATA];
$personHead = $jsonArr[TAG_HEAD];


$personAddress = $personData[TAG_ADDRESS]; //Get person ADDRESS tag.
$username = $personHead[TAG_NAME]; //Get user name who connected to database.
$count=$personHead[TAG_CNT];

$res = $db->selectUser($username); //Get user ID.  
$user_id = $res[0][TAG_ID];
$address_id = 0;

$queryAddress = []; //Array to pass parameters to person database 
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
    $str = $box->MessageBox(0, "Field  must not be empty");
    die($str);
} else {
    $res = $db->selectAddress($queryAddress); //Search address.  
    if (count($res) == 0) {
        //Address   not found. Add new address to database.
        $res = $db->insertAddress($queryAddress);
        if ($res) {
            $res = $db->selectAddress($queryAddress); //Get address  id
            $address_id = $res[0][TAG_ID];
        } else {
            $str = $box->MessageBox(0, 'Cannot insert addreess.'
                    . 'Check the connection to the database.');
            die($str);
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
//$box->debugOut($queryPerson);
    $res = $db->insertPerson($queryPerson); //insert new  person data record.  
    if ($res) {
        if ($count==1) {
            $str = $box->MessageBox(0, 'Person data writen successfuly!');
            echo $str;
        } else {
            $str = $box->MessageBox(1, 'Please enter next data!');
            echo $str;
        }
    } else {
        $str = $box->MessageBox(0, 'Cannot insert person data '
                . 'Check the connection to the database.');
        die($str);
    }
}









