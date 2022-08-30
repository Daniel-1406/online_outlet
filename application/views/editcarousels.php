<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("load/header_main") ?>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
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
                                <h1>Carousel</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">General Form</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content"> 
                    <div class="container-fluid">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-6"> 
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title-danger">Update Carousel</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?php
                                    print form_open_multipart("caroselupdate/do_upload");
                                    print "<span style='color:red'>" . validation_errors() . "</span>";
                                    if (isset($error))
                                        print "<span style='color:red'>" . $error . "</span>";

                                    if (isset($pass_err))
                                        echo $pass_err;
                                    ?>
                                    <div class="card-body">
                                         <div class="form-group">  
                                             <label  ><img src="<?php print base_url('images/'.$photo)?>" width='100px' ></label>
                                             
                                        </div>
                                        <div class="form-group">  
                                            <label for="exampleInputEmai1">Carousel name</label>
                                            <?php print form_input("name", set_value("name", $name), 'class="form-control" id="exampleInputEmail1" placeholder="Enter carousel name"') ?>
                                            <!--<input type="text" >-->
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="userfile" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">Carousel heading</label>
                                            <?php print form_input("heading", set_value("heading", $heading), 'class="form-control" id="exampleInputEmail1" placeholder="Enter carousel heading"') ?>
                                            <!--<input type="text" >-->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Description</label>
                                            <?php print form_textarea("description", set_value("description", $description), 'class="form-control" id="exampleInputEmail1" placeholder="Enter carousel description"') ?>
                                            <!--<input type="text" >-->
                                        </div>
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">Carousel url</label>
                                            <?php print form_input("url", set_value("url", $url), 'class="form-control" id="exampleInputEmail1" placeholder="Enter carousel url"') ?>
                                            <!--<input type="text" >-->
                                        </div>

 
                                         <div class="form-group">
                                            <label for="exampleSelectRounded0">Gender</label>
                                            <?php print form_dropdown("orientation",array("select"=>"-orientation-","1"=>"1","2"=>"2","3"=>"3","4"=>"4","5"=>"5","6"=>"6","7"=>"7","8"=>"8","9"=>"9","10"=>"10"),set_value('orientation',$orientation),'class="custom-select rounded-0" id="exampleSelectRounded0"')?>
                               
                                        </div>

                                         <div class="form-group">
                                            <label for="exampleSelectRounded0">Gender</label>
                                            <?php print form_dropdown("status",array("select"=>"-status-","Enable"=>"Enable","Disable"=>"Disable"),set_value('status',$status),'class="custom-select rounded-0" id="exampleSelectRounded0"')?>
<!--                                            <select name="gender" class="custom-select rounded-0" id="exampleSelectRounded0">
                                                <option>Male</option>
                                                <option>Female</option> 
                                            </select>-->
                                        </div>
                                        <?php print form_hidden("id", set_value("id", $carouselid), 'class="form-control" id="exampleInputEmail1"') ?>
                                    </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <?php print form_submit("Submit", "Update Carousel", 'class="btn btn-primary"') ?>

                                    </div>
                                    <?php print form_close(); ?>
                                </div>
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
