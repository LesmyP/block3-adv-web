<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Part Type View</title>
</head>
<body>
    <h1>Part Type page</h1>


        
    <?php
    if ($partType) {
        foreach ($partType as $type) {
            echo $type['typeName'] . '<br>';
        }
    }
    ?>

</body>
</html>
