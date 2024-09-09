<?php
include "config12.php";

header('Content-Disposition: attachment;filename="export.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, array('name', 'email', 'number'));

$sql = "SELECT name, email, number FROM client";
$res = $conn->query($sql);

if ($res && $res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        fputcsv($output, $row);
    }
} else {
    fputcsv($output, array('Data not found'));
}

fclose($output);

$conn->close();
?>
