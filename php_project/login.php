<?php
session_start();
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
                        if(isset($_SESSION['email_exists'])){
                        ?>
                            <div class="alert alert-danger"><?= $_SESSION['email_exists']?></div>
                        <?php
                        }unset($_SESSION['email_exists']);
                        ?>

                        <?php
                        if(isset($_SESSION['pass_exists'])){
                        ?>
                            <div class="alert alert-danger"><?= $_SESSION['pass_exists']?></div>
                        <?php
                        }unset($_SESSION['pass_exists']);
                        ?>

                        <?php
                        if(isset($_SESSION['not'])){
                        ?>
                            <div class="alert alert-danger"><?= $_SESSION['not']?></div>
                        <?php
                        }unset($_SESSION['not']);
                        ?>
                        <h4>Login form</h4>
                    </div>
                    <div class="card-body">
                        <form action="login_save.php" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">Ennter your email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Ennter your password</label>
                                <input type="password" name="password" class="form-control">
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