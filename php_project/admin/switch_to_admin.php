<?php
    session_start();
    // include('login_check.php');
    $db_cunnect = mysqli_connect("localhost","root","","php_project");
    $user_id = $_SESSION['id'];

    $select_user = "SELECT * FROM users where id != $user_id";
    $select_user_result = mysqli_query($db_cunnect,$select_user);
?>
<?php include('../cunnect/header.php');?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4>User permition (Sir)</h4>
            </div>
            <div class="card-body">
                <table class="table table-borderd">
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>status</th>
                    </tr>
                    <?php
                    foreach ($select_user_result as $key => $select_user) {
                        ?>
                        <?php
                        $type = $select_user['user_type'];
                        $replace_type = str_replace('_',' ',$type);
                        ?>
                    <tr>
                        <td><?= $key+1?></td>
                        <td><?= $select_user['name']?></td>
                        <td><?= $select_user['email']?></td>
                        <td><?= $replace_type ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <?php
            if(isset($_SESSION['success_permition'])){
                ?>
                <div class="alert alert-success"><?= $_SESSION['success_permition'];?></div>
                <?php
            }
            ?>
            <div class="card-header">
                <h4>Parmition to subadmin</h4>
            </div>
            <div class="card-body">
                <form action="user_type_update.php" method="get">
                    <div class="mb-3">
                        <label for="" class="form-label">Permition</label>
                        <input type="text" class="form-control" name="type">
                    </div>
                    <div class="mb-3">
                        <select name="user_id" id="">
                            <option value="">Select model</option>
                            <?php
                                foreach ($select_user_result as $key => $select_user) {
                                ?>
                                    <option value="<?= $select_user['id']?>"><?= $select_user['name']?></option>
                                <?php
                            }
                            ?>           
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('../cunnect/footer.php');?>
