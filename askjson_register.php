<?php

/**
 * askjson_register.php
 * @author ASK
 * Here will be  created a new user record
 */

require_once __DIR__.'/askjson_config.php';
//Get JSON object
$jsonString = filter_input(INPUT_POST,TAG_JSON);
$jsonArr=json_decode($jsonString,true);
//Feth user name and password 
$username =trim($jsonArr[TAG_NAME]);//User name
$userpwd=trim($jsonArr[TAG_PWD]);//Password
 

/* Check user name and password.*/
if(empty($username)||empty($userpwd)){//User name  or pssword is empty.
    $response[TAG_SUCCESS] = 0;
    $response[TAG_MESSAGE] = "Username and Password must not be empty";
    die(json_encode($response));
    }
 else{//OK!User name and password is not empty. 
    require_once __DIR__.'/askjson_connect.php';
    $db = new DB_Connect();//Connect to databse. 
    $result = $db->selectUser($username);//Search user.  
    if(empty($result)){//User  is not found in MySql database.
    //Insert in database new user
        $insert=$db->insertUser($username, $userpwd);
        if($insert){
            $response[TAG_SUCCESS]= 1;
            $response[TAG_MESSAGE] = 'User account  ' .$username. ' is Successfully Added!';
            die(json_encode($response));    
            }
        else{
            $response[TAG_SUCCESS]= 0;
            $response[TAG_MESSAGE] = 'Cannot insert account ' .$result. ' in database.'
                    . 'Check the connection to the database.';
            die(json_encode($response));    
            }    
        }
    else{ //A user with this name already exists in the database.Enter another user name 
        $response[TAG_SUCCESS]= 0;
        $response[TAG_MESSAGE] = 'A user with  name '.$result.' already exists in the database.'
                . 'Please enter another user name or Press button Login';
        die(json_encode($response));
        }    
    }
 //Parameter JSON_UNESCAPED_UNICODE is required to display cyrillic text
 


