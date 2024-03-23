<?php include_once('../cunnect/header.php')?>
<?php
$select_canditor = "SELECT * FROM canditors";
$mysqli_query = mysqli_query($db_connect,$select_canditor);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <?php
                if(isset($_SESSION['exist_vote'])){
                    ?>
                    <div class="alert alert-danger"><?= $_SESSION['exist_vote'];?></div>
                    <?php
                }unset($_SESSION['exist_vote']);

                if(isset($_SESSION['success_vote'])){
                    ?>
                    <div class="alert alert-success"><?= $_SESSION['success_vote'];?></div>
                    <?php
                }unset($_SESSION['success_vote']);
                ?>
                <h3>Canditor list</h3>
            </div>
            <div class="card-body">
                <table class="table table-borderd">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Symble</th>
                            <th>Count</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php
                            foreach ($mysqli_query as $key => $canditor) {
                                $id_canditor = $canditor['id'];
                                $select_count = "SELECT COUNT(*) as total_vote FROM voter_list WHERE canditor_id = $id_canditor";
                                $mysqli_count_qunt = mysqli_query($db_connect,$select_count);
                                $after_assoc_count = mysqli_fetch_assoc($mysqli_count_qunt);

                                if($canditor['status'] == 1){
                                    ?>
                                    <form action="vote_submit_success.php" method="post">
                                        <tr>
                                            <td><?= $key+1?></td>
                                            <td>
                                                <img src="../image/<?= $canditor['canditor_photo']?>" width="100" alt="">
                                            </td>
                                            <td><?= $canditor['name']?></td>
                                            <td>
                                                <img src="../image/<?= $canditor['symble_photo']?>" width="100" alt="">
                                            </td>
                                            <td><?= $after_assoc_count['total_vote']?></td>
                                            <td>
                                                <button class="btn btn-primary">Prace to vote</button>
                                            </td>
                                            <input type="hidden" name="canditor_id" value="<?= $id_canditor?>">
                                        </tr>
                                    </form>
                                    <?php
                                }
                            }
                            ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once('../cunnect/footer.php')?>