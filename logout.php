<?php 
include 'database.php';

session_start();

session_destroy();
header("location:index.php");

$email = $_SESSION['email'];

$update = mysqli_query($conn, "UPDATE users  SET time = '$time', status='offline' where email = '$email' ");
?>