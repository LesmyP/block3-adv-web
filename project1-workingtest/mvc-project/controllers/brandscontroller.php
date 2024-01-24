<?php

include_once 'models/brandsmodel.php';

class Controller {
    private $model;
    public function __construct($connection) {
        $this->model = new brandModel($connection);
    }
    public function showBrands() {
        // echo "SELECT * FROM brands";
        $brands = $this->model->selectBrand();
        include 'views/brandview.php';
    }
    
    public function showForm() {
        include 'views/brandform.php';
    }
    public function add() {
        $name = $_POST['brandName'];
        if (!$name) {
            echo "<p>Missing information</p>";
            $this->showForm();
            return;
        } else if($this->model->insertBrand($name)){
            echo "<p>Added brand: $name</p>";
        } else {
            echo "<p>Could not add brand</p>";
        }
        $this->showBrands();
    }
}


include_once 'controllers/connection.php';
$connection2 = new connectionBrand($host, $username, $password, $database);
$controller = new Controller($connection2);

$controller->showBrands();

if(isset($_POST['submit'])) {
    $controller->add();
} else {
    $controller->showForm();
}
?>
