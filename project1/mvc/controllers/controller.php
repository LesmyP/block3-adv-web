<?php
    include_once 'models/model.php';
   
    class Controller {
        private $model;
        public function __construct($connection) {
            $this->model = new userModel($connection);
        }
        public function showBrands() {
            $users = $this->model->selectBrand();
            include 'views/home.php';
        }
        public function showForm() {
            include 'views/form.php';
        }
        public function add() {
            $name = $_POST['brandName'];
            if (!$name) {
                echo "<p>Missing information</p>";
                $this->showForm();
                return;
            } else if($this->model->selectBrand($name)){
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

    // $controller->showBrands();
    // $controller->showForm();
    // $controller->add();
    // if page gets information, add it
    // otherwise show form
    if(isset($_POST['submit'])) {
        $controller->add();
    } else {
        $controller->showForm();
    }

?>