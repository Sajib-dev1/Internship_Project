<?php
session_start();
$db_connect = mysqli_connect('localhost','root','','votter_aplication');

//validation check page

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
}
$flug = false;

if(!$email){
    $flug = true;
    $_SESSION['email_err'] = "Email is missing";
}

if(!$password){
    $flug = true;
    $_SESSION['pass_err'] = "password is missing";
}


if($flug){
    header('location:login.php');
}
else {
    //login email excess
    $email_exists = "SELECT COUNT(*) as total FROM comitionar WHERE email = '$email'";
    $mysqli_query = mysqli_query($db_connect,$email_exists);
    $after_assoc = mysqli_fetch_assoc($mysqli_query);

    if($after_assoc['total'] == 1){
        //login password access
        $current_pass = "SELECT * FROM comitionar WHERE email = '$email'";
        $mysqli_pass_query =  mysqli_query($db_connect,$current_pass);
        $after_assoc_pass = mysqli_fetch_assoc($mysqli_pass_query);
        if(password_verify($password,$after_assoc_pass['password'])){
            $_SESSION['login_success'] = "";
            header('location:dashboard.php');
        }
        else{
           echo 'pass not match';
        }
    }
    else{
        $_SESSION['email_not_match'] = "Email doesn't match";
        header('location:login.php');
    }
}
?>