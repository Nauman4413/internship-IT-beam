<?php
include "config.php";

if (isset($_GET['id'])){
    $user_id=$_GET['id'];
    $sql="DELETE FROM `users`WHERE `id` = '$user_id'";
    $result=$conn->query($sql);
    if ($result == true){
        header("location: view.php");
    }
    else{
        echo "error:".$sql. "<br>" . $conn->error;
    }
}?>