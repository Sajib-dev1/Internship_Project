<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gymove - Fitness Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="backend/images/favicon.png">
    <link href="backend/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-12">
					
					<div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <!-- <h1 class="text-white text-center mb-5">Registation Form</h1> -->
                                    <form action="index.html" method="post">
                                        <div class="main d-flex justify-content-between align-items-center mb-5">
                                            <div class="first">
                                                <img src="image/logo.jpg" alt="">
                                            </div>
                                            <div class="second">
                                                <h4 class="text-white">Registation form Number : <span><?= random_int(10057800, 99999999);?></span> </h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1 text-white"><strong>Vutter Address</strong></label>
                                                    <input type="text" class="form-control" placeholder="username">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="mb-1 text-white"><strong>Vutter Area Number</strong></label>
                                                    <input type="text" class="form-control" placeholder="username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign me up</button>
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
<script src="backend/vendor/global/global.min.js"></script>
<script src="backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="backend/js/custom.min.js"></script>
<script src="backend/js/deznav-init.js"></script>

</body>
</html>