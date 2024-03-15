<?php
session_start();
include('login_check.php');
$db_cunnect = mysqli_connect("localhost","root","","php_project");

$user_id = $_SESSION['id'];
$select = "SELECT * FROM users where id != $user_id";
$users = mysqli_query($db_cunnect,$select);
?>
<?php include('../cunnect/header.php') ?>
<div class="row">
    <div class="col-lg-8">
        <?php
        if(isset($_SESSION['restore_user'])){
            ?>
            <div class="alert alert-success"><?= $_SESSION['restore_user'];?></div>
            <?php
        }unset($_SESSION['restore_user']);
        ?>
        <?php
        if(isset($_SESSION['user_delete'])){
            ?>
            <div class="alert alert-danger"><?= $_SESSION['user_delete'];?></div>
            <?php
        }unset($_SESSION['user_delete']);
        ?>
        <div class="card">
            <div class="card-header">
                <div class="wrap d-flex justify-content-between align-items-center">
                <h4>User List</h4>
                <a href="login_destroy.php" class="btn btn-primary"><i data-feather="align-justify"></i> destroy user</a>
                </div>
            </div>
            <div class="card-body">
            <table class="table table-bordert">
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                <?php
                foreach ($users as $key => $user) {
                ?>
                    <?php
                    if($user['deleted_at'] == '' || $user['deleted_at'] == '2020-03-14 05:26:47'){
                    ?>
                    <tr>
                        <td><?= $key+1?></td>
                        <td><?= $user['name']?></td>
                        <td><?= $user['email']?></td>
                        <td>
                        <a title="edit" href="user_edit.php?id=<?= $user['id']?>" class="btn btn-primary btn-icon">
                            <i data-feather="check-square"></i>
                        </a>
                        <a title="soft deleted" href="user_soft_delete.php?id=<?= $user['id']?>" class="btn btn-warning btn-icon">
                            <i data-feather="archive"></i>
                        </a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                <?php
                }
                ?>
            </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <?php
                if(isset($_SESSION['reg_success'])){
                ?>
                <div class="alert alert-success"><?= $_SESSION['reg_success'];?></div>
                <?php
                }unset($_SESSION['reg_success']);
                ?>
                <h4>Add new user</h4>
            </div>
            <div class="card-body">
                <form action="user_add.php" method="post">
                    <div class="mb-3">
                        <label for="" class="form-label">User Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">User email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">User password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary" name="submit">Add user</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('../cunnect/footer.php') ?>