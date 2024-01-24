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
                        $_SESSION['success_message'] = "Brand added successfully.";
                    } else {
                        $_SESSION['error_message'] = "Could not add brand.";
                    }
                } catch (Exception $e) {
                    $_SESSION['error_message'] = "Error: " . $e->getMessage();
                }
        
                header("Location: index.php");
                exit();
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
                        $_SESSION['success_message'] = "Brand updated successfully.";
                    } else {
                        $_SESSION['error_message'] = "Could not update brand.";
                    }
                } catch (Exception $e) {
                    $_SESSION['error_message'] = "Error: " . $e->getMessage();
                }
        
                header("Location: index.php");
                exit();
            }
        
            public function delete($brandID) {
                // Delete brand by ID
                if ($this->model->deleteBrand($brandID)) {
                    $_SESSION['success_message'] = "Brand deleted successfully.";
                } else {
                    $_SESSION['error_message'] = "Could not delete brand.";
                }
        
                header("Location: index.php");
                exit();
            }
        }
        


include_once 'controllers/connection.php';
$connection2 = new connectionBrand($host, $username, $password, $database);
$controller = new Controller($connection2);

// Check for actions like edit and delete
if (isset($_GET['action']) && $_GET['action'] === 'edit') {
    // Handle edit action
    if (isset($_GET['id'])) {
        $controller->edit($_GET['id']);
    } else {
        echo "Invalid ID for editing";
    }
} elseif (isset($_GET['action']) && $_GET['action'] === 'delete') {
    // Handle delete action
    if (isset($_GET['id'])) {
        $controller->delete($_GET['id']);
        header("Location: index.php");
        exit();
    } else {
        echo "Invalid ID for deletion";
    }
} elseif (isset($_GET['action']) && $_GET['action'] === 'update') {
    // Handle update action
    $controller->update();
    header("Location: index.php");
    exit();
} elseif (isset($_POST['submit'])) {
    $controller->add();
    header("Location: index.php");
    exit();
} else {
    $controller->showForm();
}

$controller->showBrands();



?>