<?php

/**
 * Niemand ist perfekt.
 * I do not sleep tonight... I may not ever...
 * askjson_login.php
 * @author ASK
 * User login
 * 
 */
/* Check out  user name and password. */
    //Get user name and password 
    $username = trim($jsonArr[TAG_DATA][TAG_NAME]); //User name
    $userpwd = trim($jsonArr[TAG_DATA][TAG_PWD]); //Password
if (empty($username) || empty($userpwd)) {//User name  or pssword is empty.
    $response[TAG_SUCCESS] = 0;
    $response[TAG_MESSAGE] = "Username and Password must not be empty";
    die(json_encode($response));
} else {//OK!User name and password is not empty. 
    require_once __DIR__ . '/askjson_connect.php';
    $db = new DB_Connect(); //Connect to databse.
    $res = $db->selectUser($username); //Search user.
    
    /**DEBUG
        $str = var_export($res, true);
        $response[TAG_SUCCESS] = 0;
        $response[TAG_MESSAGE] = $str;
        die(json_encode($response));
     * 
     */
    
   if (count($res)==0) {//User  is not found in MySql database.
        $response[TAG_SUCCESS] = 0;
        $response[TAG_MESSAGE] = ' User account  ' . $username . ' is not found!';
        die(json_encode($response));
    } else { //A user with this name  exists in the database.
        //Check out the password
    if ($res[0][TAG_PWD] == $userpwd) {
            $response[TAG_SUCCESS] = 1;
            $response[TAG_MESSAGE] = "You have successful login" ;
            echo json_encode($response);
        } else {
            $response[TAG_SUCCESS] = 0;
            $response[TAG_MESSAGE] = "Pasword you have entered is wrong ";
            die(json_encode($response));
        }
    }
}
 //Parameter JSON_UNESCAPED_UNICODE is required to display cyrillic text
 


