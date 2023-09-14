<?php
include_once 'db.php';
if (isset($_GET["id"]) ) {
    $ID = $_GET["id"];

$sql = "DELETE FROM clients WHERE ID=$ID";
$connection->query($sql);
}

header("location: /internship_HR/index.php");
exit;
?>