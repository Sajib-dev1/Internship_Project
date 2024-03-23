<?php
session_start();
$db_connect = mysqli_connect('localhost','root','','votter_aplication');
/*=================================
        form fild data
===================================*/
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $nid_number = $_POST['nid_number'];
    $distic = $_POST['distic'];
    $symbol_name = $_POST['symbol_name'];
    $canditor_photo = $_FILES['canditor_photo'];
    $symble_photo = $_FILES['symble_photo'];
}

$after_explode = explode('.',$canditor_photo['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg','png','jpeg');
$photo_name = random_int(1000, 9999);

if(in_array($extension,$allowed_extension)){
    $file_name = $photo_name.'.'.$extension;
    $new_location = '../image/'.$file_name;
    move_uploaded_file($canditor_photo['tmp_name'],$new_location);

}
else{
    $_SESSION['picture_error'] = "picture is error alow picture jpg,png,jpeg";
    header('location:canditor.php');
}

$after_pic_explode = explode('.',$symble_photo['name']);
$extension_pic = end($after_pic_explode);
$allowed_extension_pic = array('jpg','png','jpeg');
$photo_name = random_int(1000, 9999);

if(in_array($extension_pic,$allowed_extension_pic)){
    $file_name_pic = $photo_name.'.'.$extension_pic;
    $new_location = '../image/'.$file_name_pic;
    move_uploaded_file($symble_photo['tmp_name'],$new_location);
}
else{
    $_SESSION['photo_error'] = "picture is error alow picture jpg,png,jpeg";
    header('location:canditor.php');
}
/*======================================
      local time zone
======================================*/
date_default_timezone_set('Asia/Dhaka');
$created_at = date("Y-m-d h:i:s");

/*========================================
          Form fild error
==========================================*/ 
$flug = false;

if(!$name){
    $flug = true;
    $_SESSION['name_err'] = "name fild is required";
}

if(!$email){
    $flug = true;
    $_SESSION['email_err'] = "email fild is required";
}

if(!$phone){
    $flug = true;
    $_SESSION['phone_err'] = "phone fild is required";
}

if(!$nid_number){
    $flug = true;
    $_SESSION['nid_number_err'] = "nid number fild is required";
}

if(!$distic){
    $flug = true;
    $_SESSION['distic_err'] = "distic fild is required";
}

if(!$symbol_name){
    $flug = true;
    $_SESSION['symbol_name_err'] = "symbol_name fild is required";
}

if(!$canditor_photo['name']){
    $flug = true;
    $_SESSION['canditor_photo_err'] = "canditor photo fild is required";
}

if(!$symble_photo['name']){
    $flug = true;
    $_SESSION['symble_photo_err'] = "symble photo fild is required";
}


if($flug){
    header('location:canditor.php');
}
else{
    /*=======================================
               data insert
    =========================================*/
    $insert = "INSERT INTO canditors (name,email,phone,nid_number,distic,symbol_name,canditor_photo,symble_photo,created_at) VALUES ('$name','$email','$phone','$nid_number','$distic','$symbol_name','$file_name','$file_name_pic','$created_at')";
    mysqli_query($db_connect,$insert);
    header('location:canditor.php');
}
?>