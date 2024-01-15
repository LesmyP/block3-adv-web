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
    <form action="" method="post">
        <label for="partName">Part Name:</label>
        <input type="text" id="partName" name="partName" required>

        <label for="partTypeID">Part Type ID:</label>
        <input type="number" id="partTypeID" name="partTypeID" required>

        <label for="brandID">Brand ID:</label>
        <input type="number" id="brandID" name="brandID" required>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>

        <label for="compatibility">Compatibility:</label>
        <input type="text" id="compatibility" name="compatibility" required>

        <button type="submit" name="submit">Add Part</button>
    </form>
</body>
</html>
