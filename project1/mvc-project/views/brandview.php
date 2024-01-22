<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand View</title>
</head>
<body>
    <h1>Brand page</h1>
    

        
    <?php
if ($brands) {
    foreach ($brands as $brand) {
        echo $brand['brandName'] . ' <a href="?action=edit&id=' . $brand['brandID'] . '">Edit</a> <a href="?action=delete&id=' . $brand['brandID'] . '">Delete</a><br>';
    }
}
    ?>

</body>
</html>
