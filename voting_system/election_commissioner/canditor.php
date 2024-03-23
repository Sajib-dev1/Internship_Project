<?php include_once('../cunnect/admin_head.php')?>
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
               <h3> Add new canditor</h3>
               <a href="canditor_list.php" class="btn btn-info">Canditor List</a>
            </div>
            <div class="card-body">
                <form action="canditor_save.php" method="post" enctype="multipart/form-data">
                    <div class="row mb-5">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="name" class="form-label"><strong>Canditor name</strong></label>
                                <input type="text" id="name" name="name" class="form-control<?php
                                if(isset($_SESSION['name_err'])){
                                    ?>
                                    border-danger
                                    <?php
                                }
                                ?>" placeholder="Canditor name">
                                <?php
                                if(isset($_SESSION['name_err'])){
                                    ?>
                                    <div class="text-danger"><?= $_SESSION['name_err']?></div>
                                    <?php
                                }unset($_SESSION['name_err']);
                                ?>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email" class="form-label"><strong>Canditor Email</strong></label>
                                <input type="email" id="email" name="email" class="form-control<?php
                                if(isset($_SESSION['email_err'])){
                                    ?>
                                    border-danger
                                    <?php
                                }
                                ?>" placeholder="Canditor Email">
                                <?php
                                    if(isset($_SESSION['email_err'])){
                                        ?>
                                        <div class="text-danger"><?= $_SESSION['email_err']?></div>
                                        <?php
                                    }unset($_SESSION['email_err']);
                                ?>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="phone" class="form-label"><strong>Canditor phone number</strong></label>
                                <input type="tel" id="phone" name="phone" class="form-control<?php
                                if(isset($_SESSION['phone_err'])){
                                    ?>
                                    border-danger
                                    <?php
                                }
                                ?>" placeholder="phone number">
                                <?php
                                    if(isset($_SESSION['phone_err'])){
                                        ?>
                                        <div class="text-danger"><?= $_SESSION['phone_err']?></div>
                                        <?php
                                    }unset($_SESSION['phone_err']);
                                ?>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="nid_number" class="form-label"><strong>Canditor NID number</strong></label>
                                <input type="number" id="nid_number" name="nid_number" class="form-control<?php
                                if(isset($_SESSION['nid_number_err'])){
                                    ?>
                                    border-danger
                                    <?php
                                }
                                ?>" placeholder="NID number">
                                <?php
                                    if(isset($_SESSION['nid_number_err'])){
                                        ?>
                                        <div class="text-danger"><?= $_SESSION['nid_number_err']?></div>
                                        <?php
                                    }unset($_SESSION['nid_number_err']);
                                ?>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="distic" class="form-label"><strong>Distric Name</strong></label>
                                <input type="text" id="distic" name="distic" class="form-control<?php
                                if(isset($_SESSION['distic_err'])){
                                    ?>
                                    border-danger
                                    <?php
                                }
                                ?>" placeholder="Distric Name">
                                <?php
                                    if(isset($_SESSION['distic_err'])){
                                        ?>
                                        <div class="text-danger"><?= $_SESSION['distic_err']?></div>
                                        <?php
                                    }unset($_SESSION['distic_err']);
                                ?>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="symbol_name" class="form-label"><strong>Symbol name</strong></label>
                                <input type="text" id="symbol_name" name="symbol_name" class="form-control<?php
                                if(isset($_SESSION['symbol_name_err'])){
                                    ?>
                                    border-danger
                                    <?php
                                }
                                ?>" placeholder="Symbol name">
                                <?php
                                    if(isset($_SESSION['symbol_name_err'])){
                                        ?>
                                        <div class="text-danger"><?= $_SESSION['symbol_name_err']?></div>
                                        <?php
                                    }unset($_SESSION['symbol_name_err']);
                                ?>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>Canditor Photo</strong></label>
                                <input type="file" name="canditor_photo" class="form-control<?php
                                if(isset($_SESSION['canditor_photo_err'])){
                                    ?>
                                    border-danger
                                    <?php
                                }
                                ?>">
                                <?php
                                    if(isset($_SESSION['canditor_photo_err'])){
                                        ?>
                                        <div class="text-danger"><?= $_SESSION['canditor_photo_err']?></div>
                                        <?php
                                    }unset($_SESSION['canditor_photo_err']);
                                ?>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="" class="form-label"><strong>Symble Photo</strong></label>
                                <input type="file" name="symble_photo" class="form-control<?php
                                if(isset($_SESSION['symble_photo_err'])){
                                    ?>
                                    border-danger
                                    <?php
                                }
                                ?>">
                                <?php
                                    if(isset($_SESSION['symble_photo_err'])){
                                        ?>
                                        <div class="text-danger"><?= $_SESSION['symble_photo_err']?></div>
                                        <?php
                                    }unset($_SESSION['symble_photo_err']);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-5 m-auto">
                        <div class="mb-3">
                            <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include_once('../cunnect/footer.php')?>