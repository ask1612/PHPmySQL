<?php

/**
 * I do not sleep tonight... I may not ever...
 * askjson_connect.php
 * @author ASK
 * On the trail of Peter Leow
 * 
 */

/**
 * Class to work with MySql database
 */
class DB_Connect {

    private $con;

    /**
     * constructor
     */
    function __construct() {
        // connecting to database
        $this->con = $this->connect();
    }

    /**
     * Function to connect with database
     */
    private function connect() {
        // import database connection variables
        require_once __DIR__ . '/askjson_config.php';
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try {
            $myCon = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE, DB_USER, DB_PASSWORD, $options);
            $myCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $myCon->exec('SET NAMES "utf8"');
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
        //All is OK!   
        return $myCon;
    }

    /**
     * Function to get the reference to a database
     */
    public function getDbConnection() {
        return $this->con;
    }

    /**
     * Function to get user password  from  MySql database
     */
    public function selectUser($username) {
        try {
            $stmt = $this->con->prepare("SELECT * FROM user where name='$username'");
            $stmt->execute();
            $result=[];
            if ($stmt) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $result[] = $row;
               }
            }
            return $result;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    /**
     * Function to insert new user account into MySql database
     */
    public function insertUser($username, $userpwd) {
        try {
            $sql_query = "INSERT INTO user (name, password, role)"
                    . " VALUES('$username', '$userpwd','2')";
            $stmt = $this->con->prepare($sql_query);
            $stmt->execute();
            if ($stmt) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }
    /**
     * Function to insert new person data  into MySql database
     */
    public function insertPerson($psnrname, $userpwd) {
        try {
            $sql_query = "INSERT INTO user (name, password, role)"
                    . " VALUES('$username', '$userpwd','2')";
            $stmt = $this->con->prepare($sql_query);
            $stmt->execute();
            if ($stmt) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

}
