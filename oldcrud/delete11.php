<?php
include "config11.php";

class users {
    private $con;

    public function __construct() {
        $d = new Connection();
        $this->con = $d->con;
    }

    public function del($id) {
        $stmt = $this->con->prepare("DELETE FROM `users` WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

if (isset($_GET['id'])) {
    $user = new users();
    $id = $_GET['id'];
    if ($user->del($id)) {
        header('Location: display11.php');
        exit();
    } else {
        echo "Error: can't delete user.";
    }
}
?>
