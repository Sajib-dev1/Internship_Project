<?php
    session_start();
    include('login_check.php');
    $db_cunnect = mysqli_connect("localhost","root","","php_project");
    $select_user = "SELECT * FROM users";
    $destroy_users = mysqli_query($db_cunnect,$select_user);

?>
<?php include('../cunnect/header.php');?>
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                <h4>Trushed users</h4>
                <a href="" ><i data-feather="align-justify"></i> View user list</a>
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
                foreach ($destroy_users as $key => $user) {
                ?>
                    <?php
                    if($user['deleted_at'] != '' && $user['deleted_at'] != '2020-03-14 05:26:47'){
                    ?>
                    <tr>
                        <td><?= $key+1?></td>
                        <td><?= $user['name']?></td>
                        <td><?= $user['email']?></td>
                        <td>
                        <a href="user_restore.php?id=<?= $user['id']?>" title="restore" class="btn btn-success btn-icon">
                            <i data-feather="corner-up-left"></i>
                        </a>
                        <a href="user_delete.php?id=<?= $user['id']?>" title="delete" class="btn btn-danger btn-icon">
                            <i data-feather="trash"></i>
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
</div>
<?php include('../cunnect/footer.php');?> 