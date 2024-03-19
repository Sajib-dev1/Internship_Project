<?php
session_start();
$db_connect = mysqli_connect('localhost','root','','votter_aplication');

/*===============================
      form fild access
===============================*/
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
}

/*=================================
        form validation    
==================================*/
$flug = false;

if(!$name){
    $flug = true;
    $_SESSION['name_error'] = "Name is messing";
}

if(!$phone){
    $flug = true;
    $_SESSION['phone_error'] = "phone number is messing";
}

if($flug){
    header('location:login.php');
}
else {
    /*=======================================
             exist name validation
    =========================================*/
    $exist_name = "SELECT COUNT(*) as total FROM `voters` WHERE name = '$name'";
    $mysqli_query = mysqli_query($db_connect,$exist_name);
    $after_assoc = mysqli_fetch_assoc($mysqli_query);

    if($after_assoc['total'] == 1){
        /*=======================================
                 exist phone validation
        =========================================*/
        $exist_phone = "SELECT COUNT(*) as result FROM `voters` WHERE phone = '$phone'";
        $mysqli_query_phone = mysqli_query($db_connect,$exist_phone);
        $after_assoc_id = mysqli_fetch_assoc($mysqli_query_phone);

        if($after_assoc_id['result'] == 1){
            /*=======================================
                         login id excess
            =========================================*/
            $select_voter = "SELECT * FROM `voters` WHERE phone = '$phone'";
            $mysqli_phone = mysqli_query($db_connect,$select_voter);
            $after_assoc_voter_id = mysqli_fetch_assoc($mysqli_phone);
            
            $_SESSION['login_success'] = '';
            $_SESSION['voter_id'] = $after_assoc_voter_id['id'];
            header('location:voter/dashboard.php');
        }
        else{
            $_SESSION['phone_not_match']="phone doesn't match";
            header('location:login.php');
        }
    }
    else{
        $_SESSION['name_not_match']="name doesn't match";
        header('location:login.php');
    }
}

?>