<?php
include 'mvc/controllers/Controller.php';

$controller = new Controller($conn);
$parts = $controller->getAllParts();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $partName = $_POST['partName'];
        $partTypeID = $_POST['partTypeID'];
        $brandID = $_POST['brandID'];
        $price = $_POST['price'];
        $compatibility = $_POST['compatibility'];

        $controller->addPart($partName, $partTypeID, $brandID, $price, $compatibility);
    }
}

include 'mvc/views/home.php';
?>
