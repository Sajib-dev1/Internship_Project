<?php
if (!isset($_SESSION['login_success'])) {
    header('location:login.php');
}

$db_connect = mysqli_connect('localhost','root','','votter_aplication');

$canditor_id = $_GET['id'];
$select_sqli = "SELECT * FROM canditors WHERE id = $canditor_id";
$mysqli_query = mysqli_query($db_connect,$select_sqli);
$after_accos_canditor = mysqli_fetch_assoc($mysqli_query);

print_r($after_accos_canditor['status']);

if($after_accos_canditor['status'] == 1){
    $update = "UPDATE canditors SET status='0' WHERE id = $canditor_id";
    mysqli_query($db_connect,$update);
    header('location:canditor_list.php');
}
?>