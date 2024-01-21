<?php

include_once 'models/brands.php';

   
class Controller {
    private $model;
    public function __construct($connection) {
        $this->model = new userModel($connection);
    }
    public function showBrands() {
        // echo "SELECT * FROM brands";
        $users = $this->model->selectBrand();
        include 'views/home.php';
    }
    
    public function showForm() {
        include 'views/brands.php';
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
$connection2 = new connectionObject($host, $username, $password, $database);
$controller = new Controller($connection2);

if(isset($_POST['submit'])) {
    $controller->add();
} else {
    $controller->showForm();
}
?>
