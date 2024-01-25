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
            if ($mysqli->connect_error) {
                throw new Exception('Could not connect');
            }
            return $mysqli;
        } catch (Exception $e) {
            return false;
        }
    }

    public function selectType() {
        $mysqli = $this->connect();
        if ($mysqli) {
            $results = array();  
            $result = $mysqli->query("SELECT * FROM partTypes");
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $results[] = $row;
                }
                $mysqli->close();
                return $results;
            } else {
                echo "Error: " . $mysqli->error;
                $mysqli->close();
                return false;
            }
        } else {
            return false;
        }
    }

    public function insertPartType($nameone) {
        $mysqli = $this->connect();
        if ($mysqli) {
            if ($mysqli->query("INSERT INTO partTypes (typeName) VALUES ('$nameone')")) {
                $mysqli->close();
                return true;
            } else {
                echo "Error: " . $mysqli->error;
                $mysqli->close();
                return false;
            }
        } else {
            return false;
        }
    }


    public function getPartTypeByID($typeID) {
        $mysqli = $this->connect();
        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM partTypes WHERE partTypeID = $typeID");
            $row = $result->fetch_assoc();
            $mysqli->close();
            return $row;
        } else {
            return false;
        }
    }

    public function updatePartType($typeID, $name) {
        $mysqli = $this->connect();
        if ($mysqli) {
            $mysqli->query("UPDATE partTypes SET typeName = '$name' WHERE partTypeID = $typeID");
            $mysqli->close();
            return true;
        } else {
            return false;
        }
    }

    public function deletePartType($typeID) {
        $mysqli = $this->connect();
        if ($mysqli) {
            $mysqli->query("DELETE FROM partTypes WHERE partTypeID = $typeID");
            $mysqli->close();
            return true;
        } else {
            return false;
        }
    }
}