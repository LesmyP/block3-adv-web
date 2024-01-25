<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Part</title>
</head>
<body>

    <h2>Add Part</h2>

    <form method="POST">
    <input type="text" name="partName" placeholder="part Name" value="<?php echo $_POST['partName']?$_POST['partName']:""; ?>">
    <input type="number" name="partTypeID" placeholder="part Type ID" value="<?php echo $_POST['partTypeID']?$_POST['partTypeID']:""; ?>">
    <input type="number" name="brandID" placeholder="brand ID" value="<?php echo $_POST['brandID']?$_POST['brandID']:""; ?>">
    <input type="text" name="price" placeholder="price" value="<?php echo $_POST['price']?$_POST['price']:""; ?>">
    <input type="text" name="compatibility" placeholder="compatibility" value="<?php echo $_POST['compatibility']?$_POST['compatibility']:""; ?>">
    <button type="submit" name="submit">Add Part</button>

</form>
</body>
</html>
