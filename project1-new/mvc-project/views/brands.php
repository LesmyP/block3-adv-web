<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brands View</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="../style.css">
    
</head>
<body>
   
    
    <div class="container">

        <h1>Brands page updated</h1>

        <form method="POST">
            <input type="text" name="brandName" placeholder="Brand" value="<?php echo $_POST['brandName']?$_POST['brandName']:""; ?>">

            <input type="submit" name="submit" value="Submit">
            <input type="reset" name="reset" value="Reset">
        
        </form>
    </div>  
</body>
</html>
