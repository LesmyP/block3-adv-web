<?php

class connectionBrand {
    public function __construct($host, $username, $password, $database) {
        
    }
}
class brandsModel {
    private $connectionBrand;

    public function __construct($connectionBrand) {
        $this->connectionBrand = $connectionBrand;
    }

    public function connect() {
        try {
            $mysqli = new mysqli(
                $this->connectionBrand->host,
                $this->connectionBrand->username,
                $this->connectionBrand->password,
                $this->connectionBrand->database
            );

            if ($mysqli->connect_error) {
                throw new Exception('Could not connect');
            }

            return $mysqli;
        } catch (Exception $e) {
            return false;
        }
    }

    public function selectComputerBrands() {
        $mysqli = $this->connect();

        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM ComputerBrand");

            while ($row = $result->fetch_assoc()) {
                $results[] = $row;
            }

            $mysqli->close();
            return $results;
        } else {
            return false;
        }
    }

    public function insertComputerBrand($name) {
        $mysqli = $this->connect();

        if ($mysqli) {
            $mysqli->query("INSERT INTO ComputerBrand (name) VALUES ('$name')");
            $mysqli->close();
            return true;
        } else {
            return false;
        }
    }
}