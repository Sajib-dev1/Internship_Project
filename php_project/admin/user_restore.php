<?php
session_start();
$db_cunnect = mysqli_connect("localhost","root","","php_project");
$id = $_GET['id'];

$deleted_at = "2020-03-14 05:26:47";


$update = "UPDATE users SET deleted_at='$deleted_at' WHERE id = $id";
mysqli_query($db_cunnect,$update);
$_SESSION['restore_user'] = "user restore successfull";
header('location:user_list.php');

?>