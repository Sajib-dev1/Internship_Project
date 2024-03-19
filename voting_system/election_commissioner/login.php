<?php
session_start();

/*===============================================
    without login not access dashboard
================================================*/
if(isset($_SESSION['login_success'])){
    header('location:dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Voter</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../backend/images/favicon.png">
    <link href="../backend/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100 bg-primary">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form" style="background-color: #fff;">
									<div class="text-center mb-3">
										<a href="index.html"><img src="../image/logo_voter.png" width="100" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">Admin Login page</h4>
                                    <form action="login_save.php" method="POST">

                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control <?php
                                            if(isset($_SESSION['email_err'])){
                                                ?>
                                                border-danger
                                            <?php
                                            }unset($_SESSION['email_err']);
                                            ?>" name="email" placeholder="Enter your email">
                                            <?php
                                            if(isset($_SESSION['email_err'])){
                                                ?>
                                                <div class="text-danger"><?= $_SESSION['email_err'];?></div>
                                                <?php
                                            }unset($_SESSION['email_err']);
                                            ?>
                                            <?php
                                            if(isset($_SESSION['email_not_match'])){
                                                ?>
                                                <div class="text-danger"><?= $_SESSION['email_not_match'];?></div>
                                                <?php
                                            }unset($_SESSION['email_not_match']);
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control <?php
                                            if(isset($_SESSION['pass_err'])){
                                                ?>
                                                border-danger
                                                <?php
                                            }unset($_SESSION['pass_err']);
                                            ?>" name="password" placeholder="Enter your password">
                                            <?php
                                            if(isset($_SESSION['pass_err'])){
                                                ?>
                                                <div class="text-danger"><?= $_SESSION['pass_err'];?></div>
                                                <?php
                                            }unset($_SESSION['pass_err']);
                                            ?>
                                            <?php
                                            if(isset($_SESSION['pass_err'])){
                                                ?>
                                                <div class="text-danger"><?= $_SESSION['pass_err'];?></div>
                                                <?php
                                            }unset($_SESSION['pass_err']);
                                            ?>
                                        </div>
                                        
                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn bg-primary text-white btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="../backend/vendor/global/global.min.js"></script>
	<script src="../backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../backend/js/custom.min.js"></script>
    <script src="../backend/js/deznav-init.js"></script>

</body>

</html>