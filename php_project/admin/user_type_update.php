<?php
session_start();
$db_cunnect = mysqli_connect("localhost","root","","php_project");

$type = $_GET['type'];
$user_id = $_GET['user_id'];

$type_replace = str_replace(' ','_',$type);

$update = "UPDATE users SET user_type='$type_replace' WHERE id = $user_id";
mysqli_query($db_cunnect,$update);
$_SESSION['success_permition']="Parmition added successfull";
header('location:switch_to_admin.php');

?>