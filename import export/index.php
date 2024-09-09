<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import & Export</title>
</head>
<body>
    <h1>Import and Export File</h1> <br>
    
    <h3>Import File</h3><br>
    <form action="import.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file" accept=".csv" required>
        <button type="submit" name="submit">Import CSV</button>
    </form>

    <h3>Export File</h3><br>
    <a href="export.php">Download CSV File</a>
</body>
</html>
