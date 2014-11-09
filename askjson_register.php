<?php

/**
 * Niemand ist perfekt.
 * I do not sleep tonight... I may not ever...
 * askjson_register.php
 * @author ASK
 * https://github.com/ask1612/PHPmySQL.git 
 * Here will be  created a new user record
 */
require_once __DIR__ . '/askjson_connect.php';
require_once __DIR__ . '/askjson_message.php';
$box = new Message();
//Get user name and password
$dataUser = $jsonArr[TAG_DATA]; // Get data tag . It  will be used as query sql  parameter

$username = trim($dataUser[TAG_NAME]); //User name
$userpwd = (trim($dataUser[TAG_PWD])); //Password
$security = new Security();
$hash=$security->hashPassword($userpwd);

$dataUser[TAG_PWD] = $hash; //Change  password to a hash.
if (empty($username) || empty($userpwd)) {//User name  or pssword is empty.
    $str = $box->MessageBox(0, "Username and Password must not be empty");
    die($str);
} else {//OK!User name and password is not empty. 
    $db = new DB_Connect(); //Connect to databse. 
    $res = $db->selectUser($username); //Search user.  
    if (count($res) == 0) {//User  is not found in MySql database.
        //Insert in database new user
        $insert = $db->insertUser($dataUser);//Pass array as parameter
        if ($insert) {
            $str = $box->MessageBox(1, 'User account  ' . $username . ' is Successfully Added!');
            echo $str;
        } else {
            $str = $box->MessageBox(0, 'Cannot insert account ' . $username . ' in database.'
                    . 'Check the connection to the database.');
            die($str);
        }
    } else { //A user with this name already exists in the database.Enter another user name 
        $str = $box->MessageBox(0, 'A user with  name ' . $username . ' already exists in the database.'
                . 'Please enter another user name or Press button Login');
        die($str);
    }
}
 //Parameter JSON_UNESCAPED_UNICODE is required to display cyrillic text
//$box->debugOut($dataUser);




