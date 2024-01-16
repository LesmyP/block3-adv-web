<?php

class Controller {
    private $model;
    
    public function __construct($connection) {
        $this->model = new userModel($connection);
    }

    public function computerBrands() {
        $this->computerBrandsList();
    }

    public function addComputerBrand() {
        $name = $_POST['name'];

        if (isset($_POST['insert'])) {
            // Insert action
            $this->insertBrand($name);
        } elseif (isset($_POST['delete'])) {
            // Delete action
            $this->deleteBrand($name);
        } else {
            echo "<p>Invalid action</p>";
            $this->computerBrandsList();
        }

        // Retrieve brands after insert or delete
        $this->computerBrandsList();
    }

    private function insertBrand($name) {
        if (!$name) {
            echo "<p>Missing information</p>";
        } elseif ($this->model->insertComputerBrand($name)) {
            echo "<p>Added computer brand: $name</p>";
        } else {
            echo "<p>Could not add computer brand</p>";
        }
    }

    private function deleteBrand($name) {
        if (!$name) {
            echo "<p>Missing information</p>";
        } else {
            $this->model->deleteComputerBrand($name);
            echo "<p>Deleted computer brand: $name</p>";
        }
    }

    public function computerBrandsList() {
        $brands = $this->model->selectComputerBrands();
        include 'views/brand-view.php';
    }
}
