<?php 
include "config11.php";
session_start(); 
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome to the Dashboard</h2>
    <p>You are logged in! Here are some actions you can perform:</p>
    <a href="display11.php">See All Users</a><br>
    <a href="logout.php">Logout</a>
</body>
</html>
