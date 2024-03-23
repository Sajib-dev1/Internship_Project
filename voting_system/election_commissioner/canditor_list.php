<?php include_once('../cunnect/admin_head.php')?>
<?php
$db_connect = mysqli_connect('localhost','root','','votter_aplication');

$select_sqli = "SELECT * FROM canditors";
$mysqli_query = mysqli_query($db_connect,$select_sqli);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3>Canditor List</h3>
            </div>
            <div class="card-body">
                <table class="table table-borderd">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>phone</th>
                            <th>Distic</th>
                            <th>Symble name</th>
                            <th>Symble pic</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($mysqli_query as $key => $mysqli_query) {
                           ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td>
                                    <img src="../image/<?=$mysqli_query['canditor_photo']?>" width="150" alt="">
                                </td>
                                <td><?=$mysqli_query['name']?></td>
                                <td><?=$mysqli_query['email']?></td>
                                <td><?=$mysqli_query['phone']?></td>
                                <td><?=$mysqli_query['distic']?></td>
                                <td><?=$mysqli_query['symbol_name']?></td>
                                <td>
                                    <img src="../image/<?=$mysqli_query['symble_photo']?>" width="100" alt="">
                                </td>
                                <td>
                                    <?php
                                    if($mysqli_query['status'] == 1){
                                        ?>
                                        <a href="canditor_status.php?id=<?=$mysqli_query['id']?>" class="btn btn-success">Active</a>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <button class="btn btn-light">Deactive</button>
                                        <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                           <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include_once('../cunnect/footer.php')?>