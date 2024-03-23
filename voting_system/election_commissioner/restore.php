<?php
session_start();

if (!isset($_SESSION['login_success'])) {
    header('location:login.php');
}
$db_connect = mysqli_connect('localhost','root','','votter_aplication');

$voter_id = $_GET['id'];
date_default_timezone_set('Asia/Dhaka');
$deleted_at = date("Y-m-d h:i:s");

$update = "UPDATE voters SET deleted_at= '$deleted_at' WHERE id = $voter_id";
mysqli_query($db_connect,$update);
$_SESSION['restore_success'] = "data restore successfull";
header('location:voter_list.php');

?>