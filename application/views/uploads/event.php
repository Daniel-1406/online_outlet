<!DOCTYPE html>
<html lang="en">
<?php $data["name"]=$church;
      $data["favicon"]=$favicon;?>
    <?php $this->load->view("load/header_main",$data) ?>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <??>
            <?php $this->load->view("load/header") ?>
    
            <?php $this->load->view("load/sidelinks",$data) ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Events</h1>
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
                                    <div class="card-header"><h3>Event Upload</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?php
                                    print form_open_multipart("event/do_upload");
                                    echo '<div class="bg-danger" style="text-align:center;"><b>' . validation_errors() . '</b></div>';
                                    if (isset($error))
                                        echo '<div class="bg-danger" style="text-align:center;"><b><i class="icon fas fa-ban">ERROR</i>' . $error . '</b></div>';


                                    if (isset($pass_err))
                                        echo '<div class="bg-danger" style="text-align:center;"><b><i class="icon fas fa-ban">ERROR</i>' . $pass_err . '</b></div>';
                                    ?>
                                    <div class="card-body">
                                    <div class="form-group">  
                                        <label for="exampleInputEmail1">Event Title</label>
                                        <?php print form_input("title", set_value("title",""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Event Title..."') ?>
                                    </div>
                                    <div class="form-group">  
                                        <label for="exampleInputEmail1">Event Summary</label>
                                        <?php print form_textarea("summary", set_value("summary",""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Event Summary ..."') ?>
                                        <!--<input type="text" >-->
                                    </div>
                                    <div class="form-group">  
                                        <label for="exampleInputEmail1">Speaker</label>
                                        <?php print form_input("speaker", set_value("speaker", ""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Event Speaker..."') ?>
                                    </div>
                                    <div class="form-group">  
                                        <label for="exampleInputEmail1">Role</label>
                                        <?php print form_input("role", set_value("role", ""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Speaker Role..."') ?>
                                    </div>
                                    <div class="form-group">  
                                        <label for="exampleInputEmail1">Event Time</label>
                                        <?php print form_input("time", set_value("time", ""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Event Time..."') ?>
                                    </div>                   
                                    <div class="form-group">
                                        <label>Event Date</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input value="" type="text" name="date" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="form-group">  
                                        <label for="exampleInputEmail1">Event Location</label>
                                        <?php print form_input("location", set_value("location", ""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Event Location..."') ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Upload photo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="userfile" id="exampleInputFile">
                                                <label class="custom-file-label " for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <?php print form_submit("Submit", "Upload Event", 'class="btn btn-primary "') ?>

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
    </body>
</html>
