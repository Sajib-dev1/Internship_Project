<?php
session_start();
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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="backend/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        .toast{
            width : 480px !important;
            top : 70px !important;
            }
            .toast-success {
            background-color: #51a351 !important;
            }
            .toast-error {
                background-color: #bd362f !important;
            }
    </style>
</head>

<body class="h-100 bg-primary">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-12">
					
					<div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form" style="background-color: #fff;">
                                    <div class="first text-center mb-5">
                                        <img width="150" src="image/logo_voter.png" alt="">
                                        <h1 class="">Voter Registation Form</h1>
                                    </div>
                                    <form action="registation_save.php" method="post" enctype="multipart/form-data">
                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1"><strong>Name</strong></label>
                                                    <input type="text" name="name" class="form-control <?php
                                                    if (isset($_SESSION['name_error'])) {
                                                        ?>
                                                        border-danger
                                                        <?php
                                                    }
                                                    ?>" placeholder="name">
                                                    <?php
                                                        if(isset($_SESSION['name_error'])){
                                                            ?>
                                                            <div class="text-danger"><?= $_SESSION['name_error']?></div>
                                                            <?php
                                                        }unset($_SESSION['name_error']);
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1"><strong>Email</strong></label>
                                                    <input type="text" name="email" class="form-control <?php
                                                    if(isset($_SESSION['email_error'])){
                                                        ?>
                                                        border-danger
                                                        <?php
                                                    }
                                                    ?>" placeholder="email">
                                                    <?php
                                                        if(isset($_SESSION['email_exists'])){
                                                            ?>
                                                            <div class="text-danger"><?= $_SESSION['email_exists']?></div>
                                                            <?php
                                                        }unset($_SESSION['email_exists']);
                                                    ?>
                                                    <?php
                                                        if(isset($_SESSION['email_error'])){
                                                            ?>
                                                            <div class="text-danger"><?= $_SESSION['email_error']?></div>
                                                            <?php
                                                        }unset($_SESSION['email_error']);
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1"><strong>Phone Number</strong></label>
                                                    <input type="text" name="phone" class="form-control <?php
                                                    if(isset($_SESSION['phone_error'])){
                                                        ?>
                                                        border-danger
                                                        <?php
                                                    }
                                                    ?>" placeholder="Phone Number">
                                                    <?php
                                                        if(isset($_SESSION['phone_exists'])){
                                                            ?>
                                                            <div class="text-danger"><?= $_SESSION['phone_exists']?></div>
                                                            <?php
                                                        }unset($_SESSION['phone_exists']);
                                                    ?>
                                                    <?php
                                                        if(isset($_SESSION['phone_error'])){
                                                            ?>
                                                            <div class="text-danger"><?= $_SESSION['phone_error']?></div>
                                                            <?php
                                                        }unset($_SESSION['phone_error']);
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1"><strong>Father name</strong></label>
                                                    <input type="text" name="father_name" class="form-control <?php
                                                    if(isset($_SESSION['father_name_error'])){
                                                        ?>
                                                        border-danger
                                                        <?php
                                                    }
                                                    ?>" placeholder="Father name">
                                                    <?php
                                                        if(isset($_SESSION['father_name_error'])){
                                                            ?>
                                                            <div class="text-danger"><?= $_SESSION['father_name_error']?></div>
                                                            <?php
                                                        }unset($_SESSION['father_name_error']);
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1"><strong>Mother name</strong></label>
                                                    <input type="text" name="mother_name" class="form-control<?php
                                                    if(isset($_SESSION['mother_name_error'])){
                                                        ?>
                                                        border-danger
                                                        <?php
                                                    }unset($_SESSION['mother_name_error']);
                                                    ?>" placeholder="Mother name">
                                                    <?php
                                                        if(isset($_SESSION['mother_name_error'])){
                                                            ?>
                                                            <div class="text-danger"><?= $_SESSION['mother_name_error']?></div>
                                                            <?php
                                                        }unset($_SESSION['mother_name_error']);
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1"><strong>Date of Birth</strong></label>
                                                    <input type="date" name="birth_day" class="form-control<?php
                                                    if(isset($_SESSION['birth_day_error'])){
                                                        ?>
                                                        border-danger
                                                        <?php
                                                    }
                                                    ?>" placeholder="Date of Birth">
                                                    <?php
                                                        if(isset($_SESSION['birth_day_error'])){
                                                            ?>
                                                            <div class="text-danger"><?= $_SESSION['birth_day_error']?></div>
                                                            <?php
                                                        }unset($_SESSION['birth_day_error']);
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1"><strong>NID number</strong></label>
                                                    <input type="text" name="nid_number" class="form-control<?php
                                                    if(isset($_SESSION['nid_number_error'])){
                                                        ?>
                                                        border-danger
                                                        <?php
                                                    }
                                                    ?>" placeholder="NID number">
                                                    <?php
                                                        if(isset($_SESSION['nid_number_error'])){
                                                            ?>
                                                            <div class="text-danger"><?= $_SESSION['nid_number_error']?></div>
                                                            <?php
                                                        }unset($_SESSION['nid_number_error']);
                                                    ?>
                                                    <?php
                                                        if(isset($_SESSION['valid_number'])){
                                                            ?>
                                                            <div class="text-danger"><?= $_SESSION['valid_number']?></div>
                                                            <?php
                                                        }unset($_SESSION['valid_number']);
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1"><strong>Gender</strong></label>
                                                    <select name="gender" class="form-control<?php
                                                    if(isset($_SESSION['gender_error'])){
                                                        ?>
                                                        border-danger
                                                        <?php
                                                    }
                                                    ?>" id="">
                                                        <option value="">Select gender</option>
                                                        <option value="mail">mail</option>
                                                        <option value="femail">femail</option>
                                                        <option value="other">other</option>
                                                    </select>
                                                    <?php
                                                        if(isset($_SESSION['gender_error'])){
                                                            ?>
                                                            <div class="text-danger"><?= $_SESSION['gender_error']?></div>
                                                            <?php
                                                        }unset($_SESSION['gender_error']);
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1"><strong>District</strong></label>
                                                    <input type="text" name="district" class="form-control<?php
                                                    if(isset($_SESSION['district_error'])){
                                                        ?>
                                                        border-danger
                                                        <?php
                                                    }
                                                    ?>" placeholder="District">
                                                    <?php
                                                        if(isset($_SESSION['district_error'])){
                                                            ?>
                                                            <div class="text-danger"><?= $_SESSION['district_error']?></div>
                                                            <?php
                                                        }unset($_SESSION['district_error']);
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1"><strong>Sub District</strong></label>
                                                    <input type="text" name="subdistrict" class="form-control<?php
                                                    if(isset($_SESSION['subdistrict_error'])){
                                                        ?>
                                                        border-danger
                                                        <?php
                                                    }
                                                    ?>" placeholder="Sub District">
                                                    <?php
                                                        if(isset($_SESSION['subdistrict_error'])){
                                                            ?>
                                                            <div class="text-danger"><?= $_SESSION['subdistrict_error']?></div>
                                                            <?php
                                                        }unset($_SESSION['subdistrict_error']);
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1"><strong>Vutter Area Number (zip)</strong></label>
                                                    <input type="number" name="zip" class="form-control<?php
                                                    if(isset($_SESSION['zip_error'])){
                                                        ?>
                                                        border-danger
                                                        <?php
                                                    }
                                                    ?>" placeholder="Vutter Area Number (zip)">
                                                    <?php
                                                        if(isset($_SESSION['zip_error'])){
                                                            ?>
                                                            <div class="text-danger"><?= $_SESSION['zip_error']?></div>
                                                            <?php
                                                        }unset($_SESSION['zip_error']);
                                                    ?>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1"><strong>Image</strong></label>
                                                    <input type="file" class="form-control<?php
                                                    if(isset($_SESSION['photo_error'])){
                                                        ?>
                                                        border-danger
                                                        <?php
                                                    }
                                                    ?>" name="photo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                    <?php
                                                        if(isset($_SESSION['photo_error'])){
                                                            ?>
                                                            <div class="text-danger"><?= $_SESSION['photo_error']?></div>
                                                            <?php
                                                        }unset($_SESSION['photo_error']);
                                                    ?>
                                                </div>
                                                <div class="form-group">
                                                    <img src="" alt="" id="blah" width="100">
                                                </div>
                                            </div>

                                            <div class="col-lg-12 mb-5">
                                                <div class="form-group">
                                                    <label class="mb-1"><strong>Village</strong></label>
                                                    <input type="text" name="village" class="form-control<?php
                                                    if(isset($_SESSION['village_error'])){
                                                        ?>
                                                        border-danger
                                                        <?php
                                                    }
                                                    ?>" placeholder="Vutter Address">
                                                    <?php
                                                        if(isset($_SESSION['village_error'])){
                                                            ?>
                                                            <div class="text-danger"><?= $_SESSION['village_error']?></div>
                                                            <?php
                                                        }unset($_SESSION['village_error']);
                                                    ?>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-4 m-auto">
                                                <div class="form-group">
                                                    <button type="submit" name="submit" class="btn bg-primary text-white btn-block">Sign me up</button>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="">Alrady have an account? <a class="text-info" href="login.php">Sign In</a></p>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="backend/js/deznav-init.js"></script>
<?php
if(isset($_SESSION['message']) && $_SESSION['message'] != ''){
    ?>
    <script>
        Swal.fire({
            title: "Good job!",
            text: "<?= $_SESSION['message']?>",
            icon: "<?= $_SESSION['message_code']?>"
        });
    </script>
    <?php
    unset($_SESSION['message']);
    unset($_SESSION['message_code']);
}

if(isset($_SESSION['you_are_login']) && $_SESSION['you_are_login'] != ''){
    ?>
    <script>
        Swal.fire({
            title: "Regected!",
            text: "<?= $_SESSION['you_are_login']?>",
            icon: "<?= $_SESSION['message_code']?>"
        });
    </script>
    <?php
    unset($_SESSION['you_are_login']);
    unset($_SESSION['message_code']);
}

?>
</body>
</html>