<?php
session_start();
$db_cunnect = mysqli_connect("localhost","root","","php_project");
$id = $_GET['id'];

$delete = "DELETE FROM users where id = $id";
mysqli_query($db_cunnect,$delete);
$_SESSION['user_delete'] = "User deleted successfully";
header('location:user_list.php');
?>