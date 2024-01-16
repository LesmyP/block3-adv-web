<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>MVC with mySQL Lesmy new</h1>

    <?php
        include_once 'controllers/controller.php';

        // Instantiate the connection
        $connection = new connectionObject($host, $username, $password, $database);

        // Instantiate the model
        $modelBrand = new brandsModel($connection);

        // Get brands data
        $brands = $modelBrand->selectComputerBrands();

        // Include the view
        include 'views/brand-view.php';
    ?>
</body>
</html>









<!-- /project1
  /controllers
    Controller.php
    ControllerBrand.php
  /models
    Model.php
    ModelBrand.php
  /views
    home.php
    brand-view.php
  index.php -->