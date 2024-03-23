<?php
session_start();

if (!isset($_SESSION['login_success'])) {
    header('location:login.php');
}
$db_connect = mysqli_connect('localhost','root','','votter_aplication');

$voter_id = $_GET['id'];

$update = "DELETE FROM voters WHERE id = $voter_id";
mysqli_query($db_connect,$update);
$_SESSION['voter_delete'] = "Voter delete successfull";
header('location:voter_list.php');

?>