<?php
/*===============================================
     dashboard not access with out login
================================================*/
if(isset($_SESSION['login_success'])){
    header('location:../login.php');
}

?>
<?php include_once('../cunnect/header.php')?>
<div class="row">
    <div class="col-lg-12">
        <h2>Welcome to <strong class="text-info">- <?= $after_ascos_voter_name['name']?></strong></h2>
    </div>
    <div class="col-lg-12">
        <h3>Your Vote number is <strong class="text-info">- <?= $after_ascos_voter_name['id']?></strong></h3>
    </div>
</div>
<?php include_once('../cunnect/footer.php')?>