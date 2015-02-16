<?php

/**
 * 
 * askjson_config.php
 * @author ASK
 * https://github.com/ask1612/PHPmySQL.git 
 * 
 */
/**
 * Data to login to  MySQL database
 */
define('DB_USER', "test");
define('DB_PASSWORD', "tst");
define('DB_DATABASE', "mytest");
define('DB_SERVER', "localhost");

/**
 * Common JSON tags
 */
define('TAG_JSON', 'askJSON');
define('TAG_DATA', 'data');
define('TAG_HEAD', 'head');
define('TAG_ID', 'id');
define('TAG_BTN', 'button');
define('VAL_BTNSAVE', 'save');
define('VAL_BTNLOG', 'login');
define('VAL_BTNREG', 'register');
define('TAG_CNT', 'count');
define('TAG_REC', 'record');

/**
 * Data to output  a message and a result of I/O operation.
 * This data  used to create an  JSON object and   pass it to the Android 
 * application as callback.
 */
define('TAG_SUCCESS', 'success');
define('TAG_MESSAGE', 'message');

/**
 * Data to input  USER information 
 */
define('TAG_NAME', 'name');
define('TAG_PWD', 'password');
define('TAG_HASH', 'hash');

/**
 * Data to input PERSON information
 */
define('TAG_PSNNAME', 'personname');
define('TAG_SURNAME', 'surname');
define('TAG_CITY', 'city');
define('TAG_STREET', 'street');
define('TAG_BUILD', 'build');
define('TAG_FLAT', 'flat');


/**
 * Database tables 
 */
define('TAG_USER', 'user');
define('TAG_PSN', 'person');
define('TAG_ADDRESS', 'address');

