<?php
include "config.php";
$sql="SELECT * FROM teachers";
$result1=$conn->query($sql);
$name=$email=$address="";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>teachers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class= 'container position-relative'>
    <a href="user.php" class= "position-absolute end-0 mt-3"><button><b>Add New User</b></button></a><br><br>
    <a href="teacher.php" class= "position-absolute end-0 mt-3"><button><b>Add New Teacher</b></button></a>

    <h3>your details</h3>
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
      <?php
      while($row=$result1->fetch_assoc()){
        ?>
        <td><?php echo $row['id'] ;?></td>
       <td><?php echo $row ['name'];?></td>
       <td><?php echo $row ['email'];?></td>
       <td><?php echo  $row ['address'];?></td>
       <td> <a href="update1.php?id=<?php echo $row['id'];?>"><button>edit </button></a>
        <a href="delete1.php?id=<?php echo $row['id'];?>"><button> delete</button></a> 
        <a href="show1.php?id=<?php echo $row['id'];?>"><button>show</button></a>
    </td>
       </tr>
<?php
} 
?>
  
        
      </tbody>
      </table>
      </div>
</body>
</html>

