<?php

/**
 * I do not sleep tonight... I may not ever...
 * askjson_config.php
 * @author ASK
 * 
 * 
 */



/**
 * Data to login to  MySql database
 */
define('DB_USER', "test");
define('DB_PASSWORD', "tst");
define('DB_DATABASE', "mytest");
define('DB_SERVER', "localhost");

/**
 * common JSON tags
 */
define('TAG_JSON', 'askJSON');
define('TAG_BTN', 'button');

/**
 * Data to output  a message and a result of I/O operation.
 * This data  used to create an  JSON object and   pass it to the Android 
 * application as callback.
 */
ine('TAG_SUCCESS', 'success');
define('TAG_MESSAGE', 'message');

/**
 * Data to input  user information 
 */
define('TAG_NAME', 'name');
define('TAG_PWD', 'password');
define('VAL_BTNLOG', 'login');
define('VAL_BTNREG', 'register');

/**
 * Data to input person information
 */
define('VAL_BTNSAVE', 'save');
define('TAG_PSNNAME', 'personname');
define('TAG_SURNAME', 'surname');
define('TAG_ADDRESS', 'address');
define('TAG_CITY', 'city');
define('TAG_STREET', 'street');
define('TAG_BUILD', 'build');
define('TAG_FLAT', 'flat');

