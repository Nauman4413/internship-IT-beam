<?php
include "config12.php"; 

if (isset($_POST['submit'])) {
    if ($_FILES['file']['name']) {
        $filename = $_FILES['file']['tmp_name']; 
        $file = fopen($filename, "r");

        fgetcsv($file);
        
        while (($d = fgetcsv($file, 1000, ",")) !== FALSE) {
            $sql = "INSERT INTO client(`name`, `email`, `number`) VALUES ('$d[0]', '$d[1]', '$d[2]')";
            
            if ($conn->query($sql) === FALSE) {
                echo "Error: " . $conn->error;
            }
        }
        fclose($file);
        echo "File imported successfully";
    }
}
$conn->close();
?>
