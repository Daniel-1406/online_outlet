<!DOCTYPE html>
<html lang="en">
    
<?php $data["name"]=$church;
      $data["favicon"]=$favicon;?>
    <?php $this->load->view("load/header_main",$data) ?>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <??>
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
                                <h1>Updates</h1>
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
                                        <h3 class="card-title-danger">Event For Livestream</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?php
                                    print form_open_multipart("updates/headerministers/do_upload");
                                    echo '<div class="bg-danger" style="text-align:center;"><b>' . validation_errors() . '</b></div>';
                                    if (isset($error))
                                        echo '<div class="bg-danger" style="text-align:center;"><b><i class="icon fas fa-ban">ERROR</i>' . $error . '</b></div>';
                                    ?>
                                    <div class="card-body">
                                       
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">Title</label>
                                            <?php print form_input("title", set_value("title", $title), 'class="form-control" id="exampleInputEmail1"') ?>
                                        </div>
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">Link</label>
                                            <?php print form_input("link", set_value("link", $link), 'class="form-control" id="exampleInputEmail1" ') ?>
                                        </div>
                                        <div class="form-group">
                                        <label>Date and time of the latest Livestream event</label>
                                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                                <?php echo form_input("date",set_value("date",$date), 'class="form-control datetimepicker-input" data-target="#reservationdatetime"')?>
                                                <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label>Upload Date</label>
                                            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                                <?php echo form_input("upload_date",set_value("upload_date",$upload_date), 'disabled class="form-control datetimepicker-input" data-target="#reservationdatetime"')?>
                                                <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">  
                                            <label  ><img src="<?php print base_url('images/' . $photo) ?>" width='100%' height='300px'></label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Update photo</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="userfile" id="exampleInputFile">
                                                    <label class="custom-file-label " for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <?php print form_submit("Submit", "Update", 'class="btn btn-primary"') ?>

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
