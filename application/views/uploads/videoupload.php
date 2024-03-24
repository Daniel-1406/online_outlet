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
                                <h1>Upload</h1>
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
                                    <div class="card-header"><h3>Video Upload</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?php
                                    print form_open_multipart("video_upload/do_upload");
                                    echo '<div class="bg-danger" style="text-align:center;"><b>' . validation_errors() . '</b></div>';
                                    if (isset($error))
                                        echo '<div class="bg-danger" style="text-align:center;"><b><i class="icon fas fa-ban">ERROR</i>' . $error . '</b></div>';


                                    if (isset($pass_err))
                                        echo '<div class="bg-danger" style="text-align:center;"><b><i class="icon fas fa-ban">ERROR</i>' . $pass_err . '</b></div>';
                                    ?>
                                    <div class="card-body">
                                    <div class="form-group">  
                                            <label for="exampleInputEmail1">Header</label>
                                            <?php print form_input("topic", set_value("topic", ""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Video Heading..."') ?>
                                        </div>
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">Speaker</label>
                                            <?php print form_input("speaker", set_value("speaker", ""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Speaker Name..."') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Summary</label>
                                            <?php print form_textarea("summary", set_value("summary", ""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Video Summary ..."') ?>
                                        </div>
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">Date</label>
                                            <?php print form_input("date", set_value("date", ""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Date..."') ?>
                                        </div>
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">Link</label>
                                            <?php print form_input("link", set_value("link", ""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Video Link..."') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Overlay Photo</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="userfile" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Upload Overlay Photo</label> 
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <?php print form_submit("Submit", "Upload", 'class="btn btn-primary "') ?>

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
