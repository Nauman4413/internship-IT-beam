<?php
include "config11.php";

class users {
    private $con;

    public function __construct() {
        $d = new Connection();
        $this->con = $d->con;
    }

    public function getbyid($id) {
        $stmt = $this->con->prepare("SELECT * FROM `users` WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function updateuser($id, $name, $email) {
        $stmt = $this->con->prepare("UPDATE `users` SET `name` = ?, `email` = ? WHERE `id` = ?");
        $stmt->bind_param("ssi", $name, $email, $id);
        return $stmt->execute();
    }
}

$user = new users();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $udata = $user->getbyid($id);
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    if ($user->updateuser($id, $name, $email)) {
        header("Location: display11.php");
        exit();
    } else {
        echo "Error: can't update user.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <div>
        <h2>Update User</h2>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $udata['id']; ?>">
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" value="<?php echo $udata['name']; ?>" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo $udata['email']; ?>" required>
            </div>
            <button type="submit" name="update">Update User</button>
        </form>
    </div>
</body>
</html>