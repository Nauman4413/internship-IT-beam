<?php
include "config11.php";
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <?php
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_array($result);

        if ($user) {
            if ($password === $user["password"]) {
                $_SESSION['user_id'] = $user['id']; 
                header("Location: welcome.php"); 
                                exit();
            } else {
                echo "<br><br>Wrong password";
            }
        } else {
            echo "<br><br>Wrong email";
        }
    }
    ?>

    <h2>Login User</h2>
    <form action="" method="post">
        Email: <br> <input type="email" name="email" required> <br><br>
        Password: <br> <input type="password" name="password" required> <br><br>
        <input type="submit" name="login" value="Login">
        Not a user? <a href="signup.php">Signup</a>
    </form>
</body>
</html>
