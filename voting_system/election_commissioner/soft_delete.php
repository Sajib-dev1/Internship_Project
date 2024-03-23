<?php
session_start();

if (!isset($_SESSION['login_success'])) {
    header('location:login.php');
}
$db_connect = mysqli_connect('localhost','root','','votter_aplication');

$voter_id = $_GET['id'];

$deleted_at = '2020-03-20 11:22:29';

$update = "UPDATE voters SET deleted_at= '$deleted_at' WHERE id = $voter_id";
mysqli_query($db_connect,$update);
$_SESSION['soft_delete'] = "User is warning list";
header('location:voter_list.php');
?>