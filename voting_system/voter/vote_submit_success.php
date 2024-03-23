<?php
session_start();
$db_connect = mysqli_connect('localhost','root','','votter_aplication');

if(!isset($_SESSION['login_success'])){
    header('location:../login.php');
}

$voter_id = $_SESSION['voter_id'];
$canditor_id = $_POST['canditor_id'];

$voter_exists = "SELECT COUNT(*) as vote FROM voter_list WHERE voter_id = $voter_id";
$mysqli_query = mysqli_query($db_connect,$voter_exists);
$after_assoc = mysqli_fetch_assoc($mysqli_query);

if($after_assoc['vote'] != 1){
    $insert = "INSERT INTO voter_list(canditor_id,voter_id) VALUES ('$canditor_id','$voter_id')";
    mysqli_query($db_connect,$insert);
    $_SESSION['success_vote'] = "Your Vote successfully done";
    header('location: canditor_list.php');
}
else{
    $_SESSION['exist_vote'] = "You Voted";
    header('location:canditor_list.php');
}
?>