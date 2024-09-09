<?php
include "config.php"; 
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $sql = "INSERT INTO `teachers`(`name`, `email`, `address`) 
    VALUES ('$name','$email', '$address')";
   $result = $conn->query($sql);
    if ($result == TRUE) {

        header('location:view1.php');
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teacher</title>
</head>
<body>
     <div class= "container">
        <h1>Create Teacher</h1>
        <form action="" method="POST">
            <h2>Teacher Information:</h2>
            Name: <br><br><input type="text" name="name" required> <br><br>
            Email: <br><br><input type="email" name="email" required> <br><br>
            Address: <br><br><input type="text" name="address"><br><br>
            <input type="submit" name="submit" value="submit">
        </form>
    </div>
</body>
</html>