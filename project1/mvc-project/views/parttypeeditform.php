<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Part Type</title>

</head>
<body>
    <div class="container">
        <h1>Edit Part Type form</h1>

        <form method="POST" action="?action=updateType">
            <input type="hidden" name="partTypeID" value="<?php echo $type['partTypeID']; ?>">
            <input type="text" name="typeName" placeholder="Part Type" value="<?php echo isset($type['typeName']) ? $type['typeName'] : ''; ?>">

            <input type="submit" name="submitType" value="Update">
            <input type="reset" name="resetType" value="Reset">
        </form>

    </div> 
</body>
</html>
