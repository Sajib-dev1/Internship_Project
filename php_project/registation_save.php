<?php
session_start();
$db_cunnect = mysqli_connect("localhost","root","","php_project");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
}
date_default_timezone_set('Asia/Dhaka');
$created_at = date("Y-m-d h:i:s");

$email_exist = "SELECT COUNT(*) as total FROM users WHERE email = '$email'";
$mysqli_query =  mysqli_query($db_cunnect,$email_exist);
$after_accos = mysqli_fetch_assoc($mysqli_query);

if($after_accos['total'] == 1){
    $_SESSION['exists_email'] = "This email alrady exist";
    header('location:register.php');
}
else{
    $insert = "INSERT INTO users (name, email, password, created_at) VALUES ('$name','$email','$password_hash','$created_at')"; 
    mysqli_query($db_cunnect,$insert);
    $_SESSION['reg_success'] = "registation successfull";
    header('location:register.php');
}




?>