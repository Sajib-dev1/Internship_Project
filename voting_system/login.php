<?php
session_start();
/*==============================================
   without logout not show login page
==============================================*/
if(isset($_SESSION['login_success'])){
    header('location:voter/dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Election-Pannel</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="image/logo_voter.png">
    <link href="backend/css/style.css" rel="stylesheet">
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
									<div class="text-center">
										<a href="index.html"><img src="image/logo_voter.png" width="100" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form action="login_save.php" method="post">

                                        <div class="form-group">
                                            <label class="mb-1"><strong>name</strong></label>
                                            <input type="name" class="form-control<?php
                                            if(isset($_SESSION['name_error'])){
                                                ?>
                                                border-danger
                                                <?php
                                            }
                                            ?>" name="name" placeholder="Enter your name">
                                            <?php
                                            if(isset($_SESSION['name_error'])){
                                                ?>
                                                <div class="text-danger"><?= $_SESSION['name_error']?></div>
                                                <?php
                                            }unset($_SESSION['name_error']);
                                            ?>
                                            <?php
                                            if(isset($_SESSION['name_not_match'])){
                                                ?>
                                                <div class="text-danger"><?= $_SESSION['name_not_match']?></div>
                                                <?php
                                            }unset($_SESSION['name_not_match']);
                                            ?>
                                        </div>

                                        <div class="form-group">
                                            <label class="mb-1"><strong>Phone number</strong></label>
                                            <input type="tel" class="form-control<?php
                                            if(isset($_SESSION['phone_error'])){
                                                ?>
                                                border-danger
                                                <?php
                                            }
                                            ?>" name="phone" placeholder="Enter phone number">

                                            <?php
                                            if(isset($_SESSION['phone_error'])){
                                                ?>
                                                <div class="text-danger"><?= $_SESSION['phone_error']?></div>
                                                <?php
                                            }unset($_SESSION['phone_error']);
                                            ?>

                                            <?php
                                            if(isset($_SESSION['phone_not_match'])){
                                                ?>
                                                <div class="text-danger"><?= $_SESSION['phone_not_match']?></div>
                                                <?php
                                            }unset($_SESSION['phone_not_match']);
                                            ?>
                                        </div>

                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary text-white btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="">Don't have an account? <a class="text-info" href="registation.php">Sign up</a></p>
                                    </div>
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
    <script src="backend/vendor/global/global.min.js"></script>
	<script src="backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="backend/js/custom.min.js"></script>
    <script src="backend/js/deznav-init.js"></script>

</body>

</html>