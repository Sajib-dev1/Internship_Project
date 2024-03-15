<?php
    session_start();
    include('login_check.php');
    $db_cunnect = mysqli_connect("localhost","root","","php_project");
    $user_id = $_SESSION['id'];

    $select_user = "SELECT * FROM users where id = $user_id";
    $select_user_result = mysqli_query($db_cunnect,$select_user);
    $after_accos_user = mysqli_fetch_assoc($select_user_result);
?>
<?php include('../cunnect/header.php');?>
<h4 class="mb-3 mb-md-0">Welcome to <span class="text-primary"> - (<?= $after_accos_user['name']?>)</span></h4>
<?php include('../cunnect/footer.php');?>                   