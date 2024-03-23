
<?php include('../cunnect/header.php')?>
<?php
$select_comitional = "SELECT * FROM `comitionar`";
$select_mysqli = mysqli_query($db_connect,$select_comitional);
$mysqli_fetch_assoc = mysqli_fetch_assoc($select_mysqli);

?>
<div class="row">
    <div class="col-lg-4 m-auto">
        <div class="card">
            <div class="card-header">
                <h4>Election comitional Information</h4>
            </div>
            <div class="card-body">
                <table class="table table-borderd">
                    <tr>
                        <th>Name : </th>
                        <td> <?= $mysqli_fetch_assoc['name']?></td>
                    </tr>
                    <tr>
                        <th>Email : </th>
                        <td> <?= $mysqli_fetch_assoc['email']?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('../cunnect/footer.php')?>