<?php
    session_start();
    $db_cunnect = mysqli_connect("localhost","root","","php_project");

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
    }

    $email_exist = "SELECT COUNT(*) as total FROM users WHERE email = '$email'";
    $mysqli_query =  mysqli_query($db_cunnect,$email_exist);
    $after_accos = mysqli_fetch_assoc($mysqli_query);

    if($after_accos['total'] == 1){
        $current_pass = "SELECT * FROM users WHERE email = '$email'";
        $mysqli_pass_query =  mysqli_query($db_cunnect,$current_pass);
        $after_assoc_pass = mysqli_fetch_assoc($mysqli_pass_query);
        
        if(password_verify($password,$after_assoc_pass['password'])){
            $current_type = "SELECT * FROM users WHERE email = '$email'";
            $mysqli_type_query =  mysqli_query($db_cunnect,$current_pass);
            $after_assoc_type = mysqli_fetch_assoc($mysqli_type_query);
            if($after_assoc_type['user_type'] == 'admin' || $after_assoc_type['user_type'] == 'supper_admin' || $after_assoc_type['user_type'] == 'sub_admin'){
                $_SESSION['login_success'] = "";
                $_SESSION['id'] = $after_assoc_type['id'];
                header('location:admin/dashboard.php');
            }
            else{
                $_SESSION['not'] = "you are not a admin";
                header('location:login.php');
            }
        }
        else{
            $_SESSION['pass_exists'] = "This password is't match";
            header('location:login.php');
        }
    }
    else{
        $_SESSION['email_exists'] = "This email is't match";
        header('location:login.php');
    }

?>