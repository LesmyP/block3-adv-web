<?php
include 'connection.php';
include '../models/model.php'; // Update the path as needed

class Controller {
    private $model;

    public function __construct($conn) {
        $this->model = new Model($conn);
    }

    public function getAllParts() {
        return $this->model->getAllParts();
    }

    public function addPart($partName, $partTypeID, $brandID, $price, $compatibility) {
        return $this->model->addPart($partName, $partTypeID, $brandID, $price, $compatibility);
    }

    // Add functions for other CRUD operations
}
?>
