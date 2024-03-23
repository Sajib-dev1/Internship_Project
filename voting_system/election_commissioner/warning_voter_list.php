<?php
$db_connect = mysqli_connect('localhost','root','','votter_aplication');

$select_users = "SELECT * FROM voters WHERE deleted_at = '2020-03-20 11:22:29'";
$mysqli_connect = mysqli_query($db_connect,$select_users);
?>
<?php include_once('../cunnect/admin_head.php')?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Warning list</h4>
            </div>
            <div class="card-body">
                <table class="table table-borderd">
                    <tr>
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone number</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    foreach ($mysqli_connect as $key => $connect ) {
                        ?>
                        <tr>
                            <td><?= $key+1?></td>
                            <td>
                                <img src="../image/<?= $connect['photo']?>" width="200" alt="">
                            </td>
                            <td><?= $connect['name']?></td>
                            <td><?= $connect['email']?></td>
                            <td><?= $connect['phone']?></td>
                            <td>
                            <a title="restore" href="restore.php?id=<?= $connect['id']?>" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-reply" aria-hidden="true"></i></a>
                            <a title="delete" href="delete_voter.php?id=<?= $connect['id']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once('../cunnect/footer.php')?>