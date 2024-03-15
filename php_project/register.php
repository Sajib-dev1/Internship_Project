<?php
session_start();
if(!isset($_SESSION['login_success'])){
    header('location:login.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <?php
                        if(isset($_SESSION['reg_success'])){
                            ?>
                            <div class="alert alert-success"><?= $_SESSION['reg_success']?></div>
                            <?php
                        }unset($_SESSION['reg_success']);
                        ?>
                        <?php
                        if(isset($_SESSION['exists_email'])){
                            ?>
                            <div class="alert alert-danger"><?= $_SESSION['exists_email']?></div>
                            <?php
                        }unset($_SESSION['exists_email']);
                        ?>
                        <h4>Register form</h4>
                    </div>
                    <div class="card-body">
                        <form action="registation_save.php" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">User Name</label>
                                <input type="text" name="name" class="form-control">
                                <?php
                                if(isset($_SESSION['error_name'])){
                                    ?>
                                    <div class="text-danger"><?= $_SESSION['error_name']?></div>
                                <?php
                                }unset($_SESSION['error_name']);
                                ?>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">User Email</label>
                                <input type="email" name="email" class="form-control">
                                    <?php
                                if(isset($_SESSION['error_email'])){
                                    ?>
                                        <div class="text-danger"><?= $_SESSION['error_email']?></div>
                                    <?php
                                    }unset($_SESSION['error_email']);
                                    ?>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control">
                                    <?php
                                if(isset($_SESSION['error_password'])){
                                    ?>
                                        <div class="text-danger"><?= $_SESSION['error_password']?></div>
                                    <?php
                                    }unset($_SESSION['error_password']);
                                    ?>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>