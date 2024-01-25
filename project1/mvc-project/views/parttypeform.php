<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parts View</title>
</head>
<body>
    <div class="container">
        <h1>Parts Type form</h1>



        <form method="POST" action="?action=addtype">
            <input type="text" name="typeName" placeholder="PartType" value="<?php echo isset($_POST['typeName']) ? $_POST['typeName'] : ''; ?>">
            <input type="submit" name="submitType" value="Submit">
            <input type="reset" name="reset" value="Reset">
        </form>
    </div>
</body>
</html>