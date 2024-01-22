<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCV Project - Lesmy Perez</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    this is the index page database is connected
    <?php
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);
    ?>


    <div class="container">
    <h1>Computer part tables</h1>
        <!-- add controller -->
        <?php
        include_once("controllers/brandscontroller.php");
        include_once("controllers/parttypescontroller.php");
        
        
        
    ?>
    </div>

    <!-- This is the folder with 2 tables connected to the database -->
    
</body>
</html>