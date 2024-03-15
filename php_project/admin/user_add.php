<?php
session_start();
$db_cunnect = mysqli_connect("localhost","root","","php_project");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
}

$created_at = date("Y-m-d h:i:s");

$insert = "INSERT INTO users (name, email, password, created_at) VALUES ('$name','$email','$password_hash','$created_at')"; 
mysqli_query($db_cunnect,$insert);
$_SESSION['reg_success'] = "user added successfull";
header('location:user_list.php');


?>