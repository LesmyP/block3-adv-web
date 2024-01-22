<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parts View</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="../style.css">
    
</head>
<body>
   
    
    <div class="container">

        <h1>Parts form view page </h1>

        <form method="POST">
            <input type="text" name="typeName" placeholder="PartType" value="<?php echo $_POST['typeName']?$_POST['typeName']:""; ?>">

            <input type="submit" name="submit" value="Submit">
            <input type="reset" name="reset" value="Reset">
        
        </form>
    </div>  
</body>
</html>