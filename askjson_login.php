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
$db = new DB_Connect(); //Connect to databse.
$box = new Message();
/* Check out  user name and password. */
//Get user name and password 
$username = trim($jsonArr[TAG_DATA][TAG_NAME]); //User name
$userpwd = trim($jsonArr[TAG_DATA][TAG_PWD]); //Password
if (empty($username) || empty($userpwd)) {//User name  or pssword is empty
    $str = $box->echoBox(0, "Username and Password must not be empty","");
    die($str);
} else {//OK!User name and password is not empty. 
    $res = $db->selectUser($username); //Search user.
    if (count($res) == 0) {//User  is not found in MySql database.
        $str = $box->echoBox(0, " User account  " . $username . "  not found!","");
        die($str);
    } else { //A user with this name  exists in the database.
        //Check out the password
        $res = $db->getHash($username, $userpwd); // get hash
//        $box->debugOut($res);
        if ($res) {
        $str = $box->echoBox(1, "You have successfully logged into the system","");
        echo $str;
        } else {
        $str = $box->echoBox(0, "You have entered an incorrect password.","");
        die($str);
        }
    }
}

 //Parameter JSON_UNESCAPED_UNICODE is required to display cyrillic text
 


