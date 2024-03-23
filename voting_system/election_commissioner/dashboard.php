<?php include_once('../cunnect/admin_head.php')?>
<?php
    $db_connect = mysqli_connect('localhost','root','','votter_aplication');

    /*=======================================
                 total voter
    =======================================*/
    $total_voters = "SELECT COUNT(*) as count FROM `voters`";
    $voter_count_query = mysqli_query($db_connect,$total_voters);
    $after_all_voter_count = mysqli_fetch_assoc($voter_count_query);

    /*========================================
                   total_vote
    ========================================*/
    $select_vote_count = "SELECT COUNT(*) as total_vote FROM `voter_list`";
    $mysqli_count_vote = mysqli_query($db_connect,$select_vote_count);
    $total_vote = mysqli_fetch_assoc($mysqli_count_vote);

    /*===================================
                  voter list
    =====================================*/
    $select_canditor = "SELECT * FROM canditors";
    $select_canditor_infos = mysqli_query($db_connect,$select_canditor);
    $after_vote_count = mysqli_fetch_assoc($select_canditor_infos);
?>
<div class="row">
    <div class="col-lg-12">
        <h1>Welcome to Admin</h1>
    </div>
</div>
<div class="row mt-5">
    <div class="col-lg-3">
        <div class="card avtivity-card">
            <div class="card-body">
                <div class="media align-items-center">
                    <span class="activity-icon bgl-success mr-md-4 mr-3">
                        <img src="../image/logo_voter.png" width="80" alt="">
                    </span>
                    <div class="media-body">
                        <p class="fs-26 mb-2">Total voter</p>
                        <span class="title text-black font-w600"><?= $after_all_voter_count['count']?></span>
                    </div>
                </div>
                <div class="progress" style="height:5px;">
                    <div class="progress-bar bg-success" style="width: 42%; height:5px;" role="progressbar">
                        <span class="sr-only"></span>
                    </div>
                </div>
            </div>
            <div class="effect bg-success" style="top: 434px; left: 76px;"></div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card avtivity-card">
            <div class="card-body">
                <div class="media align-items-center">
                    <span class="activity-icon bgl-secondary  mr-md-4 mr-3">
                        <img src="../image/9690.png" width="80" alt="">
                    </span>
                    <div class="media-body">
                        <p class="fs-26 mb-2">Total Vote</p>
                        <span class="title text-black font-w600"><?= $total_vote['total_vote']?></span>
                    </div>
                </div>
                <div class="progress" style="height:5px;">
                    <div class="progress-bar bg-secondary" style="width: 82%; height:5px;" role="progressbar">
                        <span class="sr-only">42% Complete</span>
                    </div>
                </div>
            </div>
            <div class="effect bg-secondary" style="top: 52px; left: -10px;"></div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card avtivity-card">
            <div class="card-body">
                <div class="media align-items-center">
                    <span class="activity-icon bgl-danger mr-md-4 mr-3">
                        <svg width="40" height="39" viewBox="0 0 40 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.0977 7.90402L9.78535 16.7845C9.17929 17.6683 9.40656 18.872 10.2862 19.4738L18.6574 25.2104V30.787C18.6574 31.8476 19.4992 32.7357 20.5598 32.7568C21.6456 32.7735 22.5295 31.9023 22.5295 30.8207V24.1961C22.5295 23.5564 22.2138 22.9588 21.6877 22.601L16.3174 18.9184L20.8376 14.1246L23.1524 19.3982C23.4596 20.101 24.1582 20.5556 24.9243 20.5556H31.974C33.0346 20.5556 33.9226 19.7139 33.9437 18.6532C33.9605 17.5674 33.0893 16.6835 32.0076 16.6835H26.1953C25.4293 14.9411 24.6128 13.2155 23.9015 11.4478C23.5395 10.5556 23.3376 10.1684 22.6726 9.55389C22.5379 9.42763 21.5993 8.56904 20.7618 7.80305C19.9916 7.10435 18.8047 7.15065 18.0977 7.90402Z" fill="#FF3282"></path>
                            <path d="M26.0269 8.87206C28.4769 8.87206 30.463 6.88598 30.463 4.43603C30.463 1.98608 28.4769 0 26.0269 0C23.577 0 21.5909 1.98608 21.5909 4.43603C21.5909 6.88598 23.577 8.87206 26.0269 8.87206Z" fill="#FF3282"></path>
                            <path d="M8.16498 38.388C12.6744 38.388 16.33 34.7325 16.33 30.2231C16.33 25.7137 12.6744 22.0581 8.16498 22.0581C3.65559 22.0581 0 25.7137 0 30.2231C0 34.7325 3.65559 38.388 8.16498 38.388Z" fill="#FF3282"></path>
                            <path d="M31.835 38.388C36.3444 38.388 40 34.7325 40 30.2231C40 25.7137 36.3444 22.0581 31.835 22.0581C27.3256 22.0581 23.67 25.7137 23.67 30.2231C23.67 34.7325 27.3256 38.388 31.835 38.388Z" fill="#FF3282"></path>
                        </svg>
                    </span>
                    <div class="media-body">
                        <p class="fs-26 mb-2">Regected Voter</p>
                        <span class="title text-black font-w600">
                            <?php 
                                if ($after_all_voter_count['count']> 0) {
                                    echo 0;
                                }
                                else{
                                    echo $after_all_voter_count['count'];
                                }
                            ?>
                        </span>
                    </div>
                </div>
                <div class="progress" style="height:5px;">
                    <div class="progress-bar bg-danger" style="width: 90%; height:5px;" role="progressbar">
                        <span class="sr-only">42% Complete</span>
                    </div>
                </div>
            </div>
            <div class="effect bg-danger" style="top: 150px; left: 163px;"></div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card avtivity-card">
            <div class="card-body">
                <div class="media align-items-center">
                    <span class="activity-icon bgl-danger mr-md-4 mr-3">
                    </span>
                    <div class="media-body">
                    </div>
                </div>
                <div class="progress" style="height:5px;">
                    <div class="progress-bar bg-danger" style="width: 90%; height:5px;" role="progressbar">
                        <span class="sr-only">42% Complete</span>
                    </div>
                </div>
            </div>
            <div class="effect bg-danger" style="top: 150px; left: 163px;"></div>
        </div>
    </div>
</div>
<div class="row">
    <?php
    foreach ($select_canditor_infos as $key => $select_canditor) {
        $id_caditor =  $select_canditor['id'];
        $select_count = "SELECT COUNT(*) as total FROM `voter_list` WHERE canditor_id= $id_caditor";
        $mysqli_count_query = mysqli_query($db_connect,$select_count);
        $after_accos_voter_count = mysqli_fetch_assoc($mysqli_count_query);
        ?>
        <?php
        if($select_canditor['status'] == 1){
            ?>
            <div class="col-lg-3">
                <div class="card avtivity-card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <span class="activity-icon bgl-warning  mr-md-4 mr-3">
                                <img src="<?php echo "../image/". $select_canditor['symble_photo']?>" width="80" alt=""  class="rounded-circle">
                            </span>
                            <div class="media-body">
                                <p class="fs-26 mb-2"><?= $select_canditor['symbol_name']?></p>
                                <span class="title text-black font-w600"><?= $after_accos_voter_count['total']?></span>
                            </div>
                        </div>
                        <div class="progress" style="height:5px;">
                            <div class="progress-bar bg-warning" style="width: 42%; height:5px;" role="progressbar">
                                <span class="sr-only">42% Complete</span>
                            </div>
                        </div>
                    </div>
                    <div class="effect bg-warning" style="top: 141px; left: -27px;"></div>
                </div>
            </div>
            <?php
        }
        ?>
        <?php
    }    
    ?>
</div>
<?php include_once('../cunnect/footer.php')?>