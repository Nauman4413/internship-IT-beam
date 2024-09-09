<?php
class Connection {
    public $con;

    public function __construct() {
        $this->con = mysqli_connect('localhost', 'root', '', 'crud');
        if (!$this->con) {
            die('Connection failed: ' . mysqli_connect_error());
            echo"ddddd";
        } else {
            echo "Connected successfully";
        }
    }
}

$conn_obj = new Connection();
$conn = $conn_obj->con;
?>