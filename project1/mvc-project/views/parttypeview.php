<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part Type View</title>


</head>
<body>
    <h1>Part Type view page</h1>

    <?php
    if($partTypes)
    {
        foreach($partTypes as $type)
        {
            echo $type['typeName'] . ' <a href="?action=edit&id=' . $type['partTypeID'] . '">Edit</a> <a href="?action=delete&id=' . $type['partTypeID'] . '">Delete</a><br>';
        }
    }

?>


</body>
</html>

