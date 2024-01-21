<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brands View</title>
</head>
<body>
    <h1>Brands page</h1>

    <form method="POST">
    <input type="text" name="brandName" placeholder="Brand" value="<?php echo $_POST['brandName']?$_POST['brandName']:""; ?>">

    <input type="submit" name="submit" value="Submit">
    <input type="reset" name="reset" value="Reset">

    
</form>
</body>
</html>
