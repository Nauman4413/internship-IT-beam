<?php
include "config.php";
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
        ?><h2>user details:</h2>
        <form action="" method="post">
            
            <input type="hidden" name="user_id" value="<?php echo $id;?>"><br>
          <h3>  name: <br> <input type="text" name="name" value="<?php echo "$name";?>"><br></h3>
          <h3>   email: <br> <input type="email" name="email" value="<?php echo "$email";?>"><br></h3>
           <h3> address: <br> <input type="text" name="address" value="<?php echo "$address";?>"><br></h3>
        </form>
        <a href="view.php"><button>go back</button></a>
        <?php

    }
}
?>