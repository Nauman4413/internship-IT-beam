<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT USER</title>
</head>
<body>
<?php
include "config.php";
if(isset($_POST['update'])){
    $user_id=$_POST['user_id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $sql="UPDATE`users`SET `name`='$name',`email`='$email', `address`='$address'WHERE `id`='$user_id'";
    $result=$conn->query($sql);
    if ($result==TRUE){
        header('location:view.php');
    } else{
        echo "error:". $sql ."<br>" .$conn->error;
    }
}
if (isset($_GET['id'])){
    $user_id=$_GET['id'];
    $sql="SELECT * FROM `users` WHERE `id`='$user_id'";
    $result=$conn->query($sql);
    if($result->num_rows > 0) {
        while($row=$result->fetch_assoc()){
           
            $name=$row['name'];
            $email=$row['email'];
            $address=$row['address'];
            $id=$row['id'];
        }
        ?><h2>edit user:</h2>
        <form action="" method="post">
            
            <input type="hidden" name="user_id" value="<?php echo $id;?>"><br>
            name: <br> <input type="text" name="name" value="<?php echo "$name";?>"><br>
            email: <br> <input type="email" name="email" value="<?php echo "$email";?>"><br>
            address: <br> <input type="text" name="address" value="<?php echo "$address";?>"><br>
            <input type="submit" value="update" name="update">
        </form>
        </body>
</html>
        <?php

    }else{
        header('location:view.php');
    }
}
?>