<?php
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);

include_once 'models/brandsmodel.php';

class Controller {
    private $model;

    public function __construct($connection) {
        $this->model = new brandModel($connection);
    }

    public function showBrands() {
        $brands = $this->model->selectBrand();
        include 'views/brandview.php';
    }

    public function showForm() {
        include 'views/brandform.php';
    }

    public function add() {
        try {
            $name = $_POST['brandName'];

            if (empty($name)) {
                throw new Exception('Brand name is required.');
            }

            if ($this->model->insertBrand($name)) {
                echo "<p>Added brand: $name</p>";
            } else {
                echo "<p>Could not add brand</p>";
            }
        } catch (Exception $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>";
            $this->showForm();
        }
    }

    public function edit($brandID) {
        // Fetch brand details by ID and show the edit form
        $brand = $this->model->getBrandByID($brandID);
        include 'views/brandeditform.php';
    }

    public function update() {
        try {
            $brandID = $_POST['brandID'];
            $name = $_POST['brandName'];

            if (empty($name) || empty($brandID)) {
                throw new Exception('Brand ID and name are required.');
            }

            if ($this->model->updateBrand($brandID, $name)) {
                echo "<p>Updated brand: $name</p>";
            } else {
                echo "<p>Could not update brand</p>";
            }
        } catch (Exception $e) {
            echo "<p>Error: " . $e->getMessage() . "</p>";
            $this->showForm();
        }
    }

    public function delete($brandID) {
        // Delete brand by ID
        if ($this->model->deleteBrand($brandID)) {
            echo "<p>Deleted brand with ID: $brandID</p>";
        } else {
            echo "<p>Could not delete brand</p>";
        }
    }
    
}

include_once 'controllers/connection.php';
$connection2 = new connectionBrand($host, $username, $password, $database);
$controller = new Controller($connection2);

// Check for actions like edit and delete
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'edit':
            if (isset($_GET['id'])) {
                $controller->edit($_GET['id']);
            } else {
                echo "Invalid ID for editing";
            }
            break;
        case 'delete':
            if (isset($_GET['id'])) {
                $controller->delete($_GET['id']);
            } else {
                echo "Invalid ID for deletion";
            }
            break;
        default:
            $controller->showBrands();
            break;
    }
} else {
    // Normal flow
    if (isset($_POST['submit'])) {
        $controller->add();
    } else {
        $controller->showForm();
    }

    $controller->showBrands();
}
?>
