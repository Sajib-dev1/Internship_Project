<?php include_once('../cunnect/admin_head.php')?>
<?php
$db_connect = mysqli_connect('localhost','root','','votter_aplication');
if (!isset($_SESSION['login_success'])) {
    header('location:login.php');
}
$id = $_GET['id'];
$select_voter = "SELECT * FROM voters where id = $id";
$voter_info = mysqli_query($db_connect,$select_voter);
$voter_single_info = mysqli_fetch_assoc($voter_info);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4>Update User</h4>
                <p>
                    <img src="../image/<?= $voter_single_info['photo']?>" width="200" id="blah" alt="">
                </p>
            </div>
            <div class="card-body">
                <form action="update_user_info_sam.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="voter_id" value="<?= $voter_single_info['id']?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="name" class="form-label"><strong>Name</strong></label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="enter your name" value="<?= $voter_single_info['name']?>">
                                <?php
                                if(isset($_SESSION['name_error'])){
                                    ?>
                                    <div class="text-danger"><?=$_SESSION['name_error']?></div>
                                    <?php
                                }unset($_SESSION['name_error']);
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label"><strong>Email</strong></label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="enter your email" value="<?= $voter_single_info['email']?>">
                                <?php
                                if(isset($_SESSION['email_error'])){
                                    ?>
                                    <div class="text-danger"><?=$_SESSION['email_error']?></div>
                                    <?php
                                }unset($_SESSION['email_error']);
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label"><strong>Phone Number</strong></label>
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="enter your phone number" value="<?= $voter_single_info['phone']?>">
                                <?php
                                if(isset($_SESSION['phone_error'])){
                                    ?>
                                    <div class="text-danger"><?=$_SESSION['phone_error']?></div>
                                    <?php
                                }unset($_SESSION['phone_error']);
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>Father Name</strong></label>
                                <input type="text" name="father_name" class="form-control" placeholder="enter your father name" value="<?= $voter_single_info['father_name']?>">
                                <?php
                                if(isset($_SESSION['father_name_error'])){
                                    ?>
                                    <div class="text-danger"><?=$_SESSION['father_name_error']?></div>
                                    <?php
                                }unset($_SESSION['father_name_error']);
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>Mother Name</strong></label>
                                <input type="text" name="mother_name" class="form-control" placeholder="enter your mother name" value="<?= $voter_single_info['mother_name']?>">
                                <?php
                                if(isset($_SESSION['mother_name_error'])){
                                    ?>
                                    <div class="text-danger"><?=$_SESSION['mother_name_error']?></div>
                                    <?php
                                }unset($_SESSION['mother_name_error']);
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>Date of Birth</strong></label>
                                <input type="date" name="birth_day" class="form-control" value="<?= $voter_single_info['birth_day']?>">
                                <?php
                                if(isset($_SESSION['birth_day_error'])){
                                    ?>
                                    <div class="text-danger"><?=$_SESSION['birth_day_error']?></div>
                                    <?php
                                }unset($_SESSION['birth_day_error']);
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>NID number</strong></label>
                                <input type="number" name="nid_number" class="form-control" placeholder="enter your Nid number" value="<?= $voter_single_info['nid_number']?>">
                                <?php
                                if(isset($_SESSION['nid_number_error'])){
                                    ?>
                                    <div class="text-danger"><?=$_SESSION['nid_number_error']?></div>
                                    <?php
                                }unset($_SESSION['nid_number_error']);
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>Gender</strong></label>
                                <select name="gender" class="form-control" id="">
                                    <option value="mail" <?= $voter_single_info['gender'] == 'mail'?'selected':''?>>mail</option>
                                    <option value="femail"<?= $voter_single_info['gender'] == 'femail'?'selected':''?>>femail</option>
                                    <option value="other" <?= $voter_single_info['gender'] == 'other'?'selected':''?>>other</option>
                                </select>
                            </div>
                            <?php
                                if(isset($_SESSION['gender_error'])){
                                    ?>
                                    <div class="text-danger"><?=$_SESSION['gender_error']?></div>
                                    <?php
                                }unset($_SESSION['gender_error']);
                            ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>District</strong></label>
                                <input type="text" name="district" class="form-control" placeholder="enter your District"  value="<?= $voter_single_info['district']?>">
                            </div>
                            <?php
                                if(isset($_SESSION['district_error'])){
                                    ?>
                                    <div class="text-danger"><?=$_SESSION['district_error']?></div>
                                    <?php
                                }unset($_SESSION['district_error']);
                            ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>Sub District</strong></label>
                                <input type="text" name="subdistrict" class="form-control" placeholder="enter your Sub District"  value="<?= $voter_single_info['subdistrict']?>">
                            </div>
                            <?php
                                if(isset($_SESSION['subdistrict_error'])){
                                    ?>
                                    <div class="text-danger"><?=$_SESSION['subdistrict_error']?></div>
                                    <?php
                                }unset($_SESSION['subdistrict_error']);
                            ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>Vutter Area Number (zip)</strong></label>
                                <input type="number" name="zip" class="form-control" placeholder="enter your zip number" value="<?= $voter_single_info['zip']?>">
                            </div>
                            <?php
                                if(isset($_SESSION['zip_error'])){
                                    ?>
                                    <div class="text-danger"><?=$_SESSION['zip_error']?></div>
                                    <?php
                                }unset($_SESSION['zip_error']);
                            ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>Photo</strong></label>
                                <input type="file" name="photo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <?php
                                if(isset($_SESSION['photo_error'])){
                                    ?>
                                    <div class="text-danger"><?=$_SESSION['photo_error']?></div>
                                    <?php
                                }unset($_SESSION['photo_error']);
                            ?>
                        </div>
                        <div class="col-lg-12 mb-5">
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>Village</strong></label>
                                <input type="text" name="village" class="form-control" placeholder="enter your Village"  value="<?= $voter_single_info['village']?>">
                            </div>
                            <?php
                                if(isset($_SESSION['village_error'])){
                                    ?>
                                    <div class="text-danger"><?=$_SESSION['village_error']?></div>
                                    <?php
                                }unset($_SESSION['village_error']);
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-4 m-auto">
                        <div class="mb-3">
                            <button type="submit" name="submit" class="btn btn-primary w-100">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once('../cunnect/footer.php')?>