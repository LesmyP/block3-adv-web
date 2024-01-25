<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCV Project - Lesmy Perez</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container messages">
    <?php
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL);

        session_start(); // Start the session to access session variables

        // Check for success and error messages in the session
        if (isset($_SESSION['success_message'])) {
            echo '<p class="success">' . $_SESSION['success_message'] . '</p>';
            unset($_SESSION['success_message']); // Clear the success message
        }

        if (isset($_SESSION['error_message'])) {
            echo '<p class="error">' . $_SESSION['error_message'] . '</p>';
            unset($_SESSION['error_message']); // Clear the error message
        }
    ?>
    </div>
    <div class="container">
    
        <h1>Computer part tables</h1>
        <!-- add controller -->
        <?php
            include_once("controllers/brandscontroller.php");
            include_once("controllers/parttypescontroller.php");
        ?>
    </div>
</body>
</html>
