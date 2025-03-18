<!DOCTYPE html>
<html lang="en">
<?php?>
    <?php $this->load->view("load/header_main") ?>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <?php $this->load->view("load/header") ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php $this->load->view("load/sidelinks") ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1><b>Hi <?php echo strtoupper($this->session->userdata("admin_pass")) ?>!</b></h1>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="content"> 
                    <div class="container-fluid">
                        <div class="row">
                          
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-pink">
                                    <div class="inner">
                                        <h3><?php echo '0'?></h3>

                                        <p>Unique Visitors</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php print base_url() ?>index.php/welcome/filefunc" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-pink">
                                    <div class="inner">
                                        <h3><?php echo '0'?></h3>

                                        <p>Users</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php print base_url() ?>index.php/welcome/filefunc" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-pink">
                                    <div class="inner">
                                        <h3><?php echo $menu_count?></h3>

                                        <p>Menu</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php print base_url() ?>index.php/welcome/filefunc" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-pink">
                                    <div class="inner">
                                        <h3><?php echo '0'?></h3>

                                        <p>Categories</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php print base_url() ?>index.php/welcome/filefunc" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-pink">
                                    <div class="inner">
                                        <h3><?php echo '0'?></h3>

                                        <p>Products</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php print base_url() ?>index.php/welcome/filefunc" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-pink">
                                    <div class="inner">
                                        <h3><?php echo '0'?></h3>

                                        <p>Carousel</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php print base_url() ?>index.php/welcome/filefunc" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-pink">
                                    <div class="inner">
                                        <h3><?php echo '0'?></h3>

                                        <p>Custom Pages</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php print base_url() ?>index.php/welcome/filefunc" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-pink">
                                    <div class="inner">
                                        <h3><?php echo '0'?></h3>

                                        <p>Sales</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php print base_url() ?>index.php/welcome/filefunc" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        



                           
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php $this->load->view("load/footer") ?>


        </div>
        <!-- ./wrapper -->

    </body>
</html>
