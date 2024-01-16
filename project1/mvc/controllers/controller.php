<?php

include_once 'models/model.php';

class Controller {
    private $model;
    public function __construct($connection) {
        $this->model = new userModel($connection);
    }

    public function computerBrands() {
        include 'views/computer_brands.php';
    }


    public function addComputerBrand() {
        $name = $_POST['name'];
        if (!$name) {
            echo "<p>Missing information</p>";
            $this->computerBrands();
            return;
        } else if ($this->model->insertComputerBrand($name)) {
            echo "<p>Added computer brand: $name</p>";
        } else {
            echo "<p>Could not add computer brand</p>";
        }
        $this->computerBrandsList();
    }

    public function deleteComputerBrand() {
        $id = $_POST['id'];
        $this->model->deleteComputerBrand($id);
        $this->computerBrandsList();
    }

}


include_once 'controllers/connection.php';
$connection = new Connection($host, $database, $username, $password);
