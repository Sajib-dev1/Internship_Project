<?php
session_start();
$db_cunnect = mysqli_connect("localhost","root","","php_project");

$user_id = $_GET['id'];
$select_user = "SELECT * FROM users where id = $user_id";
$select_user_result = mysqli_query($db_cunnect,$select_user);
$after_accos_user = mysqli_fetch_assoc($select_user_result);

?>
<?php include('../cunnect/header.php');?>
<div class="row">
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header">
                <h3>User edit</h3>
            </div>
            <div class="card-body">
                <form action="user_update.php" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">User name</label>
                        <input type="text" name="name" class="form-control" value="<?= $after_accos_user['name']?>">
                        <input type="hidden" name="user_id" class="form-control" value="<?= $after_accos_user['id']?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Current password</label>
                        <input type="password" name="old_password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">New password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('../cunnect/footer.php');?> 