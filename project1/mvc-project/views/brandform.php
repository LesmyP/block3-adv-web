<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brand Form</title>
    <!-- <link rel="stylesheet" href="./style.css"> -->
</head>

<style>

</style>


<body>
<div class="container">

<h1>Brand Form</h1>

    <form method="POST" action="?action=add">
        <input type="text" name="brandName" placeholder="Brand" value="<?php echo isset($_POST['brandName']) ? $_POST['brandName'] : ''; ?>">

        <input class="btn" type="submit" name="submit" value="Submit">
        <input class="btn" type="reset" name="reset" value="Reset">

    </form>
</div>
</body>
</html>


