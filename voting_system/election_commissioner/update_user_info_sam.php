<?php
session_start();
$db_connect = mysqli_connect('localhost','root','','votter_aplication');

if(isset($_POST['submit'])){
    $voter_id = $_POST['voter_id'];
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
$photo_name = random_int(1000, 999999);

/*==================================
       local time zone
====================================*/
date_default_timezone_set('Asia/Dhaka');
$updated_at = date("Y-m-d h:i:s");


$flug = false;

if (!$name) {
    $flug = true;
    $_SESSION['name_error'] = "name filed is required";
    
}
if (!$email) {
    $flug = true;
    $_SESSION['email_error'] = "email filed is required";
}
if (!$phone) {
    $flug = true;
    $_SESSION['phone_error'] = "email filed is required";
}
if (!$father_name) {
    $flug = true;
    $_SESSION['father_name_error'] = "father name filed is required";
}
if (!$mother_name) {
    $flug = true;
    $_SESSION['mother_name_error'] = "mother name filed is required";
}
if (!$birth_day) {
    $flug = true;
    $_SESSION['birth_day_error'] = "birth day filed is required";
}
if (!$nid_number) {
    $flug = true;
    $_SESSION['nid_number_error'] = "nid number filed is required";
}
if (!$gender) {
    $flug = true;
    $_SESSION['gender_error'] = "Select your gender";
}
if (!$district) {
    $flug = true;
    $_SESSION['district_error'] = "district filed is required";
}
if (!$subdistrict) {
    $flug = true;
    $_SESSION['subdistrict_error'] = "sub district filed is required";
}
if (!$zip) {
    $flug = true;
    $_SESSION['zip_error'] = "zip filed is required";
}
if (!$photo['name']) {
    $flug = true;
    $_SESSION['photo_error'] = "photo filed is required";
}
if (!$village) {
    $flug = true;
    $_SESSION['village_error'] = "village filed is required";
}

if($flug){
    header('location:edit_voter.php');

}
else{
    if($_FILES['photo']['name'] == null){
        $update = "UPDATE voters SET name='$name',email='$email',phone='$phone',father_name='$father_name',mother_name='$mother_name',birth_day='$birth_day',nid_number='$nid_number',gender='$gender',district='$district',subdistrict='$subdistrict',zip='$zip',village='$village' WHERE id = $voter_id";
        mysqli_query($db_connect,$update);
        $_SESSION['data_update'] = "Data Updated successfull";
        header('location:voter_list.php');
    
    }
    else{
        $after_explode = explode('.',$photo['name']);
        $extension = end($after_explode);
        $allowed_extension = array('jpg','png','jpeg');
    
        if(in_array($extension,$allowed_extension)){
            $file_name = $photo_name.'.'.$extension;
            $new_location = '../image/'.$file_name;
            move_uploaded_file($photo['tmp_name'],$new_location);
        
            $update = "UPDATE voters SET name='$name',email='$email',phone='$phone',father_name='$father_name',mother_name='$mother_name',birth_day='$birth_day',nid_number='$nid_number',gender='$gender',district='$district',subdistrict='$subdistrict',zip='$zip',village='$village',photo='$file_name' WHERE id = $voter_id";
            mysqli_query($db_connect,$update);
            $_SESSION['data_update'] = "Data Updated successfull";
            header('location:voter_list.php');
        }
    }
}

?>