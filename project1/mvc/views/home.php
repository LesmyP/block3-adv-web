<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Computer Parts</title>
</head>
<body>
    <h1>Computer Parts</h1>

    <?php foreach ($parts as $part): ?>
        <div class="part">
            <h3><?php echo $part['PartName']; ?></h3>
            <p>Type: <?php echo $part['PartTypeID']; ?></p>
            <p>Brand: <?php echo $part['BrandID']; ?></p>
            <p>Price: <?php echo $part['Price']; ?></p>
            <p>Compatibility: <?php echo $part['Compatibility']; ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>
