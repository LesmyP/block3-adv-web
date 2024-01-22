<?php

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

class connectionBrand {
    public function __construct(public $host, public $username, public $password, public $database) {
    }
}

class brandModel {
    private $mysqli;
    private $connectionBrand;
    public function __construct($connectionBrand) {
        $this->connectionBrand = $connectionBrand;
    }
    public function connect() {
        try {
            $mysqli = new mysqli($this->connectionBrand->host, $this->connectionBrand->username, $this->connectionBrand->password, $this->connectionBrand->database);
            if($mysqli->connect_error) {
                throw new Exception('Could not connect');
            }
            return $mysqli;
        } catch(Exception $e) {
            return false;
        }
    }
    public function selectBrand(){
        // echo "SELECT * FROM brands";
        $mysqli = $this->connect();
        if($mysqli) {
            $result = $mysqli->query("SELECT * FROM brands");
            while($row = $result->fetch_assoc()) {
                $results[] = $row;
            }
            $mysqli->close();
            return $results;
        } else {
            return false;
        }
    }
    public function insertBrand($name) {
        $mysqli = $this->connect();
        if($mysqli) {
            $mysqli->query("INSERT INTO brands (brandName) VALUES ('$name')");
            $mysqli->close();
            return true;
        } else {
            return false;
        }
    }
}