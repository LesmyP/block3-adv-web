<?php
include 'connection.php';
include '../model/model.php'; 

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

    public function deletePart($partID) {
        return $this->model->deletePart($partID);
    }

    public function updatePart($partID, $partName, $partTypeID, $brandID, $price, $compatibility) {
        
    }
}
?>
