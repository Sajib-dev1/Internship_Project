<?php include_once('../cunnect/admin_head.php')?>
<?php
if (!isset($_SESSION['login_success'])) {
    header('location:login.php');
}

$db_connect = mysqli_connect('localhost','root','','votter_aplication');

$id = $_GET['id'];

$select_voter = "SELECT * FROM voters where id = $id";
$voter_info = mysqli_query($db_connect,$select_voter);
$voter_single_info = mysqli_fetch_assoc($voter_info);

?>
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-body">
                <div class="profile-tab">
                    <div class="custom-tab-1">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link active">About <?= $voter_single_info['name']?></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="about-me" class="tab-pane fade active show">
                                <div class="profile-about-me">
                                    <div class="pt-4 border-bottom-1 pb-3">
                                    </div>
                                </div>
                                <div class="profile-personal-info">
                                    <h4 class="text-primary mb-4">Personal Information</h4>

                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $voter_single_info['name']?></span>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $voter_single_info['email']?></span>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Phone number <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $voter_single_info['phone']?></span>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Birthday <span class="pull-right">:</span>
                                            </h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $voter_single_info['birth_day']?></span>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">NID Number <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $voter_single_info['nid_number']?></span>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Father Name <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $voter_single_info['father_name']?></span>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Mother Name <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $voter_single_info['mother_name']?></span>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Gender <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $voter_single_info['gender']?></span>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Distric <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $voter_single_info['district']?></span>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Sub Distric <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $voter_single_info['subdistrict']?></span>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Zip <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $voter_single_info['zip']?></span>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Village <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $voter_single_info['village']?></span>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-sm-3 col-5">
                                            <h5 class="f-w-500">Voter Join <span class="pull-right">:</span></h5>
                                        </div>
                                        <div class="col-sm-9 col-7"><span><?= $voter_single_info['created_at']?></span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once('../cunnect/footer.php')?>