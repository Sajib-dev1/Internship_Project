<?php include_once('../cunnect/admin_head.php')?>
<?php
$db_connect = mysqli_connect('localhost','root','','votter_aplication');
$select_voter = "SELECT * FROM voters";
$voters = mysqli_query($db_connect,$select_voter);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4>All Voter list</h4>
                <a href="warning_voter_list.php" class="btn btn-warning">Warning Voter</a>
            </div>
            <div class="card-body">
                <?php
                    if(isset($_SESSION['data_update'])){
                        ?>
                        <div class="alert alert-success"><span>&#9989;</span><?= $_SESSION['data_update']?></div>
                        <?php
                    }unset($_SESSION['data_update']);
                ?>
                <?php
                    if(isset($_SESSION['soft_delete'])){
                        ?>
                        <div class="alert alert-danger"><span>&#10071;</span><?= $_SESSION['soft_delete']?></div>
                        <?php
                    }unset($_SESSION['soft_delete']);
                ?>
                <?php
                    if(isset($_SESSION['voter_delete'])){
                        ?>
                        <div class="alert alert-danger"><span>&#10071;</span><?= $_SESSION['voter_delete']?></div>
                        <?php
                    }unset($_SESSION['voter_delete']);
                ?>
                <table class="table table-borderd">
                    <tr>
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    foreach ($voters as $voter) {
                        ?>
                        <?php
                        if($voter['deleted_at'] != '2020-03-20 11:22:29'){
                            ?>
                            <tr>
                                <td><?=  $voter['id']?></td>
                                <td>
                                    <img src="../image/<?=  $voter['photo']?>" width="100" alt="">
                                </td>
                                <td><?=  $voter['name']?></td>
                                <td><?=  $voter['email']?></td>
                                <td><?=  $voter['phone']?></td>
                                <td><?=  $voter['gender']?></td>
                                <td>
                                    <div class="d-flex">
                                        <a title="view" href="view.php?id=<?=$voter['id']?>" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <a title="edit" href="edit_voter.php?id=<?=$voter['id']?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        <a title="warning list" href="soft_delete.php?id=<?=$voter['id']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                    </div>
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
<?php include_once('../cunnect/footer.php')?>