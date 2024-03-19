<?php
session_start();
include('login_check.php');
$db_cunnect = mysqli_connect("localhost","root","","php_project");

$user_id = $_SESSION['id'];
$select = "SELECT * FROM users where id != $user_id";
$users = mysqli_query($db_cunnect,$select);

$select_user = "SELECT * FROM users where id = $user_id";
$select_user_result = mysqli_query($db_cunnect,$select_user);
$after_accos_user = mysqli_fetch_assoc($select_user_result);
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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i data-feather="check-square"></i>
                        </button>
                        <!-- <a title="edit" href="user_edit.php?id=<?= $user['id']?>" class="btn btn-primary btn-icon">
                            <i data-feather="check-square"></i>
                        </a> -->
                        <a title="soft deleted" href="user_soft_delete.php?id=<?= $user['id']?>" class="btn btn-warning btn-icon">
                            <i data-feather="archive"></i>
                        </a>
                        </td>
                    </tr>

                    

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="user_update.php" method="post">
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="" class="form-label">User name</label>
                                            <input type="text" name="name" class="form-control" value="<?= $user['name']?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Current password</label>
                                            <input type="password" name="old_password" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">New password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>





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
    <!-- Modal -->
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