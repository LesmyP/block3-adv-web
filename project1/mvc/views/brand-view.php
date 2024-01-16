<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Brands</title>
</head>
<body>

    <h1>Computer Brands</h1>

    <form method="POST">
        <input type="text" name="name" placeholder="Name" value="<?php echo $_POST['name'] ? $_POST['name'] : ""; ?>">
        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
    </form>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>
        <?php
        // Initialize $brands if not set
        $brands = $brands ?? array();

        if ($brands) {
            foreach ($brands as $brand) {
                echo "<tr>";
                echo "<td>" . $brand['BrandID'] . "</td>"; 
                echo "<td>" . $brand['BrandName'] . "</td>"; 
                echo "</tr>";
            }
        } else {
            echo '<tr><td colspan="2">No brands found</td></tr>';
        }
        ?>
    </table>

</body>
</html>

