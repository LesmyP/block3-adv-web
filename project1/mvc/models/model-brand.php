<?php

class connectionBrand {
    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
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
                throw new Exception('Could not connect: ' . $mysqli->connect_error);
            }

            return $mysqli;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function selectComputerBrands() {
        $mysqli = $this->connect();

        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM ComputerBrands");

            if ($result === false) {
                die('Error in query: ' . $mysqli->error);
            }

            $results = array(); // Initialize results array

            while ($row = $result->fetch_assoc()) {
                $results[] = $row;
            }

            $mysqli->close();
            return $results;
        } else {
            return array(); // Return an empty array if connection fails
        }
    }

    public function insertComputerBrand($name) {
        $mysqli = $this->connect();

        if ($mysqli) {
            $query = "INSERT INTO ComputerBrands (BrandName) VALUES ('$name')";
            if ($mysqli->query($query) === false) {
                die('Error in query: ' . $mysqli->error);
            }

            $mysqli->close();
            return true;
        } else {
            return false;
        }
    }

    public function deleteComputerBrand($name) {
        $mysqli = $this->connect();

        if ($mysqli) {
            $query = "DELETE FROM ComputerBrands WHERE BrandName = '$name'";
            if ($mysqli->query($query) === false) {
                die('Error in query: ' . $mysqli->error);
            }

            $mysqli->close();
            return true;
        } else {
            return false;
        }
    }
}