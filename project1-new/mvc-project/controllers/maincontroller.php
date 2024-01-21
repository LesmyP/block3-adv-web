<?php
include_once 'controllers/connection.php';
include_once 'controllers/brandscontroller.php';

// You can include other controllers here as needed

class MainController {
    private $brandController;

    public function __construct() {
        $connectionBrand = new ConnectionBrand($host, $username, $password, $database);
        $this->brandController = new BrandsController($connectionBrand);
    }

    public function handleRequest() {
        // Handle requests and route to the appropriate controller/method based on your application logic
        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            switch ($action) {
                case 'showBrands':
                    $this->brandController->showBrands();
                    break;
                case 'addBrand':
                    $this->brandController->addBrand();
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
