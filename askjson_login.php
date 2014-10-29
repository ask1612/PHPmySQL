<?php

/**
 * 
 * askjson_login.php
 * @author ASK
 * User login
 * 
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
            $response[TAG_SUCCESS]= 0;
            $response[TAG_MESSAGE] = ' User account  ' .$username. ' is not found!';
            die(json_encode($response));    
        }
    else{ //A user with this name  exists in the database.
          //Check out the password
        if($result==$userpwd){
            $response[TAG_SUCCESS]= 1;
            $response[TAG_MESSAGE] = "Pasword ".$result." == ".$userpwd."  true";
            die(json_encode($response));
            }
        else{
            $response[TAG_SUCCESS]= 0;
            $response[TAG_MESSAGE] = "Pasword ".$result." != ".$userpwd."  false" ;
            die(json_encode($response));
            }     
        }    
    }
 //Parameter JSON_UNESCAPED_UNICODE is required to display cyrillic text
 


