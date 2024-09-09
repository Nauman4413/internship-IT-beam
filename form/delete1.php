<?php
include "config.php";
if (isset($_GET['id'])){
    $teacher_id=$_GET['id'];
    $sql="DELETE FROM `teachers`WHERE `id` = '$teacher_id'";
    $result1=$conn->query($sql);
    if ($result1 == true){
        header("location: view1.php");
    }
    else{
        echo "error:".$sql. "<br>" . $conn->error;
    }
}
?>