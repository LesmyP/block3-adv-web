<?php
include 'controllers/connection.php';

class Model {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAllParts() {
        $query = "SELECT * FROM ComputerParts";
        $result = $this->conn->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function addPart($partName, $partTypeID, $brandID, $price, $compatibility) {
        $query = "INSERT INTO ComputerParts (PartName, PartTypeID, BrandID, Price, Compatibility) VALUES ('$partName', $partTypeID, $brandID, $price, '$compatibility')";
        return $this->conn->query($query);
    }


}
?>

