<?php
include "config11.php"; 

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    if ($password != $repeat_password) {
        echo '<br><br><footer>Error: Passwords do not match</footer>';
    } else {
        $sql = $conn->prepare("INSERT INTO `users` (`name`, `email`, `password`) VALUES (?, ?, ?)");
        if ($sql === false) {
            die"Prepare failed: " ;
        }

        $sql->bind_param("sss", $name, $email, $password);

        if ($sql->execute()) {
            echo "<br><br>Registration successful";
        } else {
            echo "<br><br>Error: " ;
        }

        $sql->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
</head>
<body>
    <h2>Signup Form</h2>
    <form action="" method="post">
        Name: <br> <input type="text" name="name" required><br><br>
        Email: <br> <input type="email" name="email" required><br><br>
        Password: <br> <input type="password" name="password" required><br><br>
        Repeat Password: <br> <input type="password" name="repeat_password" required><br><br>
        <input type="submit" name="submit">
        <p>Already a user? <a href="login.php">Login</a></p>
    </form>
</body>
</html>
