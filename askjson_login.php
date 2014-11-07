<?php

/**
 * Niemand ist perfekt.
 * I do not sleep tonight... I may not ever...
 * askjson_login.php
 * @author ASK
 * https://github.com/ask1612/PHPmySQL.git 
 * User login
 * 
 */
require_once __DIR__ . '/askjson_connect.php';
require_once __DIR__ . '/askjson_message.php';
$box = new Message();
/* Check out  user name and password. */
//Get user name and password 
$username = trim($jsonArr[TAG_DATA][TAG_NAME]); //User name
$userpwd = trim($jsonArr[TAG_DATA][TAG_PWD]); //Password
if (empty($username) || empty($userpwd)) {//User name  or pssword is empty
    $str = $box->MessageBox(0, "Username and Password must not be empty");
    die($str);
} else {//OK!User name and password is not empty. 
    $db = new DB_Connect(); //Connect to databse.
    $res = $db->selectUser($username); //Search user.
    if (count($res) == 0) {//User  is not found in MySql database.
        $str = $box->MessageBox(0, " User account  " . $username . " is not found!");
        die($str);
    } else { //A user with this name  exists in the database.
        //Check out the password
        $res = $db->getHash($username, $userpwd); // get hash
        if ($res) {
        $str = $box->MessageBox(1, "You have successful login");
        echo $str;
        } else {
        $str = $box->MessageBox(0, "Pasword you have entered is wrong ");
        die($str);
        }
    }
}

 //Parameter JSON_UNESCAPED_UNICODE is required to display cyrillic text
 


