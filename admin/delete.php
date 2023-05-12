<?php

include 'connection.php';

$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = "DELETE FROM foods WHERE id = '$id'";
$result = $conn->query($query);

header('location: index.php');

?>