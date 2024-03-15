<?php
session_start();
$db_cunnect = mysqli_connect("localhost","root","","php_project");

$user_id = $_POST['user_id'];
$name = $_POST['name'];
$old_password = $_POST['old_password'];
$password = $_POST['password'];
$password_hash = password_hash($password, PASSWORD_DEFAULT);

$updated_at = date("Y-m-d h:i:s");


if($password == ''){
    $update = "UPDATE users SET name='$name',updated_at='$updated_at' WHERE id = $user_id";
    mysqli_query($db_cunnect,$update);
    header('location:user_list.php');
}
else{
    $update = "UPDATE users SET name='$name', password = '$password_hash',updated_at='$updated_at' WHERE id = $user_id";
    mysqli_query($db_cunnect,$update);
    header('location:user_list.php');
}


?>