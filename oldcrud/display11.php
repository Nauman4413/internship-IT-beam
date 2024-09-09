<?php
include "config11.php";
class users{
    private $con;
    public function __construct(){
        $d = new Connection();
        $this->con =$d->con;
    
    }
    public function getusers(){
        $sql="SELECT * FROM `users`";
        $result=$this->con->query($sql);
        return $result;
    }

}
$user= new users();
$users=$user->getusers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
</head>
<body>
    <div>
      <h2>List of Users</h2></h2>        
      <a href="create11.php"> Add new user</a>
      <table>
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            while($row=$users->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['email']?></td>
                <td><a href="update11.php?id=<?php echo $row['id'];?>">update</a>;
                <a href="delete11.php?id=<?php echo $row['id'];?>">delete</a></td>
            </tr>
            <?php }
            ?>
        </tbody>
      </table>
    </div>
    <br>
    <button><a href="login.php">login</a></button>
     <button><a href="signup.php">signup</a></button>
    
</body>
</html>