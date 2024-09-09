<?php
include "config11.php";
class users{
    public $name,$email,$passsword="";
    private $con;
    public function __construct(){
        $d=new Connection();
        $this->con = $d->con;
    }
    public function add_user($name,$email,$password){
        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
        
        $stmt=$this->con->prepare("INSERT INTO `users`(`name`,`email`,`password`) VALUES(?,?,?) ");
        $stmt->bind_param("sss", $this->name,$this->email,$this->password);
        if($stmt->execute()){
            echo "<footer>user added</footer>";
        }
    else{
        echo"error";
    }
    $stmt->close();
}
}
$user=new users();
if (isset($_POST['submit'])){
    $user->add_user($_POST['name'],$_POST['email'],$_POST['password']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
</head>
<body>
    <h3>Add Details:</h3>
    <form action="" method="post">
        <br> name: <br> <input type="text" name="name" required> <br>
        <br> email: <br> <input type="email" name="email" required><br>
        <br>password: <br> <input type="password" name="password" required><br>
        <input type="submit" name ="submit">
    </form>
    <button><a href="login.php">login</a></button>
    <button><a href="display11.php">display all users</a></button>
</body>
</html>