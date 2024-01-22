<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Brand</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>
    <div class="container">
        <h1>Edit Brand</h1>

        <form method="POST" action="?action=update">
            <input type="hidden" name="brandID" value="<?php echo $brand['brandID']; ?>">
            <input type="text" name="brandName" placeholder="Brand" value="<?php echo $brand['brandName']; ?>">

            <input type="submit" name="submit" value="Update">
            <a href="?action=cancel">Cancel</a>
        </form>
    </div> 
    
</body>
</html>
