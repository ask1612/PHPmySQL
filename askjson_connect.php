<?php

/**
 * Niemand ist perfekt.
 * I do not sleep tonight... I may not ever...
 * askjson_connect.php
 * @author ASK
 * https://github.com/ask1612/PHPmySQL.git 
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
            $result = [];
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
    public function insertUser($dataUser) {
        try {
            $sql_query = "INSERT INTO user (name, password, role)"
                    . " VALUES("
                    . ":" . TAG_NAME . ","
                    . ":" . TAG_PWD . ","
                    . "'2')";
            $stmt = $this->con->prepare($sql_query);
            $stmt->execute($dataUser);
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
    public function insertPerson($dataPerson) {
        try {
            $sql_query = "INSERT INTO person (personname,surname,address ,user)"
                    . " VALUES("
                    . ":" . TAG_PSNNAME . ","
                    . ":" . TAG_SURNAME . ","
                    . ":" . TAG_ADDRESS . ","
                    . ":" . TAG_USER
                    . ")"
            ;
            $stmt = $this->con->prepare($sql_query);
            $stmt->execute($dataPerson);
            if ($stmt) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    /**
     * Function to select from  person 
     */
    public function selectPerson($dataPerson) {
        try {
            $sql_query = "SELECT * FROM person WHERE "
                    . "name=:" . TAG_PSNNAME . " AND "
                    . "surname=:" . TAG_SURNAME . " AND "
                    . "address=:" . TAG_ADDRESS . " AND "
                    . "user=:" . TAG_USER
            ;
            $stmt = $this->con->prepare($sql_query);
            $stmt->execute($dataPerson);
            $result = [];
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
     * Function to insert new address data  into MySql database
     */
    public function insertAddress($dataAddress) {
        try {
            $sql_query = "INSERT INTO address (city,street,build,flat,user)"
                    . " VALUES("
                    . ":" . TAG_CITY . ","
                    . ":" . TAG_STREET . ","
                    . ":" . TAG_BUILD . ","
                    . ":" . TAG_FLAT . ","
                    . ":" . TAG_USER .
                    ")"
            ;
            $stmt = $this->con->prepare($sql_query);
            $stmt->execute($dataAddress);
            if ($stmt) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

    /**
     * Function to select from  address 
     */
    public function selectAddress($dataAddress) {
        try {
            $sql_query = "SELECT * FROM address WHERE "
                    . "city=:" . TAG_CITY . " AND "
                    . "street=:" . TAG_STREET . " AND "
                    . "build=:" . TAG_BUILD . " AND "
                    . "flat=:" . TAG_FLAT . " AND "
                    . "user=:" . TAG_USER

            ;
            $stmt = $this->con->prepare($sql_query);
            $stmt->execute($dataAddress);
            $result = [];
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

}
