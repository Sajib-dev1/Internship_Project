<?php
$db_cunnect = mysqli_connect("localhost","root","","php_project");
$id = $_GET['id'];

// $select = "SELECT * FROM users where id = $id";
// $user_query = mysqli_query($db_cunnect,$select);
// $user_assoc = mysqli_fetch_assoc($user_query);

// $name = $user_assoc['name'];
// $email = $user_assoc['email'];
// $password = $user_assoc['password'];
// $password_hash = password_hash($password, PASSWORD_DEFAULT);

$deleted_at = date("Y-m-d h:i:s");

$update = "UPDATE users SET deleted_at='$deleted_at' WHERE id = $id";
mysqli_query($db_cunnect,$update);
header('location:user_list.php');





// $delete = "DELETE FROM users where id = $id";
// mysqli_query($conn,$delete);
// header('location:user_list.php');
?>