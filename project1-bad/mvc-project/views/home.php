<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home View</title>
</head>
<body>
    <h1>Home page</h1>
    HOME
    <form action="">
            <select name="" id="">
                <option value="">Select a brand</option>
                
    <?php
    if($brands) {
        foreach($brands as $brand) {
            echo "<option value=" .  $brand['brandID'] . ">" . $brand['brandName'] . "</option>";
        }
    } else {
        echo 'No brands found';
    }
    ?>
            </select>
        </form>


</body>
</html>
