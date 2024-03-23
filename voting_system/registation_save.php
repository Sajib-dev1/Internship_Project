<?php
session_start();
$db_connect = mysqli_connect('localhost','root','','votter_aplication');

if(isset($_SESSION['login_success'])){
    $_SESSION['you_are_login'] = "Your Acount has been regected";
    $_SESSION['message_code'] = "error";
    header('location:registation.php');
}
else{
/*====================================
          form fild data
=====================================*/
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $birth_day = $_POST['birth_day'];
    $nid_number = $_POST['nid_number'];
    $gender = $_POST['gender'];
    $district = $_POST['district'];
    $subdistrict = $_POST['subdistrict'];
    $zip = $_POST['zip'];
    $village = $_POST['village'];
    $photo = $_FILES['photo'];
}

    // if($nid_number > 9999999999999){
    //     $_SESSION['valid_number'] = "This NID Number is wrong";
    //     header('location:registation.php');
    // }
    // else{
    //     if($nid_number > 1000000000000){
    //         $nid_number_valided = $_POST['nid_number'];
    //     }
    //     else{
    //         $_SESSION['valid_number'] = "This NID Number is wrong";
    //         header('location:registation.php');
    //     }
    // }

/*===============================
      photo extension name
=================================*/
$photo_name = random_int(1000, 9999);

/*==================================
       local time zone
====================================*/
date_default_timezone_set('Asia/Dhaka');
$created_at = date("Y-m-d h:i:s");

/*=================================
        image name create
===================================*/
$photo = $_FILES['photo'];
$after_explode = explode('.',$photo['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg','png','jpeg');

/*==============================
  not multipul email access
=================================*/
$email_exist = "SELECT COUNT(*) as total FROM voters WHERE email = '$email'";
$mysqli_query =  mysqli_query($db_connect,$email_exist);
$after_accos = mysqli_fetch_assoc($mysqli_query);


if($after_accos['total'] != 1 ){

    /*========================================
             not multipul phone access
    =========================================*/
    $phone_exist = "SELECT COUNT(*) as total FROM voters WHERE phone = '$phone'";
    $mysqli_query =  mysqli_query($db_connect,$phone_exist);
    $after_accos = mysqli_fetch_assoc($mysqli_query);
    if($after_accos['total'] != 1 ){
        if(in_array($extension,$allowed_extension)){

            /*==========================
                     insert data
            ============================*/
            $file_name = $photo_name.'.'.$extension;
            $new_location = 'image/'.$file_name;
            move_uploaded_file($photo['tmp_name'],$new_location);

            $insert = "INSERT INTO voters (name,email,phone,father_name,mother_name,birth_day,nid_number,gender,district,subdistrict,zip,village,photo,created_at) VALUES ('$name','$email','$phone','$father_name','$mother_name','$birth_day','$nid_number','$gender','$district','$subdistrict','$zip','$village','$file_name','$created_at')";
            mysqli_query($db_connect,$insert);
            $_SESSION['message'] = "Your registation successfully";
            $_SESSION['message_code'] = "success";
            header('location:registation.php');
        }
        else{

            /*======================================
                          form validation
            ========================================*/
            if (!$name) {
                $_SESSION['name_error'] = "name filed is required";
                header('location:registation.php');
            }
            if (!$email) {
                $_SESSION['email_error'] = "email filed is required";
                header('location:registation.php');
            }
            if (!$phone) {
                $_SESSION['phone_error'] = "email filed is required";
                header('location:registation.php');
            }
            if (!$father_name) {
                $_SESSION['father_name_error'] = "father name filed is required";
                header('location:registation.php');
            }
            if (!$mother_name) {
                $_SESSION['mother_name_error'] = "mother name filed is required";
                header('location:registation.php');
            }
            if (!$birth_day) {
                $_SESSION['birth_day_error'] = "birth day filed is required";
                header('location:registation.php');
            }
            if (!$nid_number) {
                $_SESSION['nid_number_error'] = "nid number filed is required";
                header('location:registation.php');
            }
            if (!$gender) {
                $_SESSION['gender_error'] = "Select your gender";
                header('location:registation.php');
            }
            if (!$district) {
                $_SESSION['district_error'] = "district filed is required";
                header('location:registation.php');
            }
            if (!$subdistrict) {
                $_SESSION['subdistrict_error'] = "sub district filed is required";
                header('location:registation.php');
            }
            if (!$zip) {
                $_SESSION['zip_error'] = "zip filed is required";
                header('location:registation.php');
            }
            if (!$village) {
                $_SESSION['village_error'] = "village filed is required";
                header('location:registation.php');
            }
            if (!$photo['name']) {
                $_SESSION['photo_error'] = "photo filed is required";
                header('location:registation.php');
            }

            /*==================================
                    allow image extension 
            ===================================*/
            $_SESSION['photo_error'] = "only jpg phg jpeg allowed";
            header('location:registation.php');
        }
    }
    else{
        $_SESSION['phone_exists'] = "phone number alredy exists";
        header('location:registation.php');
    }
}
else{
    $_SESSION['email_exists'] = "Email alredy exists";
    header('location:registation.php');
}
}




?>
