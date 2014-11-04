<?php
/**
 * I do not sleep tonight... I may not ever...
 * askjson_save.php
 * @author ASK
 * Here will be  saved  a new person data  record
 */

    //Get user name and password 
    $name = trim($jsonArr[TAG_DATA][0][TAG_PSNNAME]); //person  name
    $surname = trim($jsonArr[TAG_DATA][0][TAG_SURNAME]); //person surname
            $response[TAG_SUCCESS] = 1;
            $response[TAG_MESSAGE] = 'Person name is   ' . $rname . ' is Successfully readed!';
            die(json_encode($response));
