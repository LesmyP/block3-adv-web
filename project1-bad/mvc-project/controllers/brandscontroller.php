<?php

include_once 'models/brandsmodel.php';

class BrandsController {
    private $model;

    public function __construct($connection) {
        $this->model = new BrandModel($connection);
    }

    public function showBrands() {
        $brands = $this->model->selectBrand();
        // Include your view file here
        include 'views/brands.php';
    }

    public function showForm() {
        include 'views/brands.php'; 
    }

    public function add() {
        if (isset($_POST['brandName'])) {
            $name = $_POST['brandName'];
            if (!$name) {
                echo "<p>Missing information</p>";
                $this->showForm();
                return;
            } elseif ($this->model->insertBrand($name)) {
                echo "<p>Added brand: $name</p>";
            } else {
                echo "<p>Could not add brand</p>";
            }
        }
        $this->showBrands();
    }
}

?>

