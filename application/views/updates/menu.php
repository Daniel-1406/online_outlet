<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("load/header_main") ?>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <??>
            <?php $this->load->view("load/header") ?>
    
            <?php $this->load->view("load/sidelinks") ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Menu</h1>
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
                                        <h3 class="card-title-danger">Update Menu</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?php
                                    print form_open("menu/updatemenu");
                                    echo '<div class="bg-danger" style="text-align:center;"><b>' . validation_errors() . '</b></div>';
                                    if (isset($pass_err))
                                        echo $pass_err;
                                    ?>
                                    <div class="card-body">
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">Menu name</label>
                                            <?php print form_input("name", set_value("name", $menu_name), 'class="form-control" id="exampleInputEmail1" placeholder="Enter menu name"') ?>
                                            <!--<input type="text" >-->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Menu url</label>
                                            <?php print form_input("url", set_value("url", $url), 'class="form-control" id="exampleInputEmail1" placeholder="Enter menu url"') ?>
                                            <!--<input type="text" >-->
                                        </div>
   

                                        <div class="form-group">
                                            <label for="exampleSelectRounded0">Numbering</label>
                                            <?php print form_dropdown("numbering", array("select" => "-numbering-", "1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10"), set_value('numbering', $numbering), 'class="custom-select rounded-0" id="exampleSelectRounded0"') ?>

                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="exampleSelectRounded0">Status</label>
                                            <select name="status" class="custom-select rounded-0" id="exampleSelectRounded0" value='<?php echo $status?>'>
                                                <option>Enable</option>
                                                <option>Disable</option> 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectRounded0">Main Menu Orientation</label>
                                            <?php print form_dropdown("orientation",$menu , set_value('orientation',$orientation),'class="custom-select rounded-0" id="exampleSelectRounded0"') ?>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectRounded0">Child Menu Orientation</label>
                                            <?php print form_dropdown("suborientation",$submenu , set_value('orientation',$orientation),'class="custom-select rounded-0" id="exampleSelectRounded0"') ?>

                                        </div>
                                        <?php print form_hidden("id", set_value("id", $id), 'class="form-control" id="exampleInputEmail1" placeholder="Facility name"') ?>

                                    </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <?php print form_submit("Submit", "Update Menu", 'class="btn btn-primary"') ?>

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
