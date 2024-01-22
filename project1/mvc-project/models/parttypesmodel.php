<?php

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

class connectionType {
    public function __construct(public $host, public $username, public $password, public $database) {
    }
}

class partTypeModel {
    private $mysqli;
    private $connectionType;
    public function __construct($connectionType) {
        $this->connectionType = $connectionType;
    }
    public function connect() {
        try {
            $mysqli = new mysqli($this->connectionType->host, $this->connectionType->username, $this->connectionType->password, $this->connectionType->database);
            if($mysqli->connect_error) {
                throw new Exception('Could not connect');
            }
            return $mysqli;
        } catch(Exception $e) {
            return false;
        }
    }
    public function selectType(){
        // echo "SELECT * FROM parttypes";
        $mysqli = $this->connect();
        if($mysqli) {
            $result = $mysqli->query("SELECT * FROM partTypes");
            while($row = $result->fetch_assoc()) {
                $results[] = $row;
            }
            $mysqli->close();
            return $results;
        } else {
            return false;
        }
    }
    public function insertPartType($nameone) {
        $mysqli = $this->connect();
        if($mysqli) {
            $mysqli->query("INSERT INTO partTypes (typeName) VALUES ('$nameone')");
            $mysqli->close();
            return true;
        } else {
            return false;
        }
    }
}