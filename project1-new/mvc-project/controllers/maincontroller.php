<?php
include_once 'controllers/connection.php';
include_once 'controllers/brandscontroller.php';

// include other controllers here

class MainController {
    private $brandController;

    public function __construct() {
        $connectionBrand = new ConnectionBrand($host, $username, $password, $database);
        $this->brandController = new BrandsController($connectionBrand);
    }

    public function handleRequest() {
        // Handle the request
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            switch ($action) {
                case 'showBrands':
                    $this->brandController->showBrands();
                    break;
                case 'addBrand':
                    $this->brandController->add();
                    break;
                // Add other cases for different actions
                default:
                    // Handle invalid actions or redirect to a default page
                    break;
            }
        } else {
            // Default action when no action is specified
            $this->brandController->showBrands();
        }
    }
}

$mainController = new MainController();
$mainController->handleRequest();

?>
