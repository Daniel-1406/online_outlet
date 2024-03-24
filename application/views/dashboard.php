<!DOCTYPE html>
<html lang="en">
<?php $data["name"]=$church;
      $data["favicon"]=$favicon;?>
    <?php $this->load->view("load/header_main",$data) ?>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <?php $this->load->view("load/header") ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php $this->load->view("load/sidelinks",$data) ?>

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
                                        <h3><?php echo 'null'?></h3>

                                        <p>Unique Visitors</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php print base_url() ?>index.php/welcome/filefunc" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-blue">
                                    <div class="inner">
                                        <h3><?php echo $contact_count?></h3>

                                        <p>Contact Messages</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/welcome/viewmessages" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-purple">
                                    <div class="inner">
                                        <h3><?php echo $request_count?></h3>

                                        <p>Request Messages</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/welcome/viewrequests" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3><?php echo $menu_count?></h3>

                                        <p>Menu</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/menu/viewmenu" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-purple">
                                    <div class="inner">
                                        <h3><?php echo $records_count?></h3>

                                        <p>Records</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/record/viewrecord" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-dark">
                                    <div class="inner">
                                        <h3><?php echo $audio_count?></h3>

                                        <p>Audio</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/uploads/audio/viewaudio" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3><?php echo $video_count?></h3>

                                        <p>Videos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/video_upload/viewvideo" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3><?php echo $carousel_count?></h3>

                                        <p>Main Carousel</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/carousel/viewcarousel" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3><?php echo $minicarousel_count?></h3>

                                        <p>Mini Carousel</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/uploads/minicarousel/viewminicarousel" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-navy">
                                    <div class="inner">
                                        <h3><?php echo $memories_count?></h3>

                                        <p>Memories</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/gallery/viewgallery" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-teal">
                                    <div class="inner">
                                        <h3><?php echo $stories_count?></h3>

                                        <p>Stories</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/testimony/viewtestimonies" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-orange">
                                    <div class="inner">
                                        <h3><?php echo $pages_count?></h3>

                                        <p>Custom Pages</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/uploads/page/viewpages" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-black">
                                    <div class="inner">
                                        <h3><?php echo $program_count?></h3>

                                        <p>Programs</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/uploads/service/viewservices" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                             <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-secondary">
                                    <div class="inner">
                                        <h3><?php echo $exhortation_count?></h3>

                                        <p>Exhortations</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/uploads/exhortation/viewexhortations" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-purple">
                                    <div class="inner">
                                        <h3><?php echo $event_count?></h3>

                                        <p>Events</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/event/viewevents" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-light
">
                                    <div class="inner">
                                        <h3><?php echo $faq_count?></h3>

                                        <p>FAQs</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/uploads/details/menupages/viewchurchfaq" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-blue">
                                    <div class="inner">
                                        <h3><?php echo $prayer_count?></h3>

                                        <p>Prayer Resources</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/uploads/details/menupages/viewprayerresources" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3><?php echo $career_count ?></h3>

                                        <p>Available Careers</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php echo base_url(); ?>index.php/uploads/details/menupages/viewcareer" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
