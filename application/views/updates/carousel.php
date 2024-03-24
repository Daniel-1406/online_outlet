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
                                <h1>Update</h1>
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
                                    print form_open_multipart("updates/carousel/do_upload");
                                    echo '<div class="bg-danger" style="text-align:center;"><b>' . validation_errors() . '</b></div>';
                                    if (isset($error))
                                        echo '<div class="bg-danger" style="text-align:center;"><b><i class="icon fas fa-ban">ERROR</i>' . $error . '</b></div>';
                                    ?>
                                    <div class="card-body">
                                        <div class="form-group">  
                                            <label  ><img src="<?php print base_url('images/' . $photo) ?>" width='100%' height='300px'></label>

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Carousel photo</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="userfile" id="exampleInputFile">
                                                    <label class="custom-file-label " for="exampleInputFile">Choose file</label>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1"> Carousel Header</label>
                                            <?php print form_input("header", set_value("header", $header), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Carousel Header..."') ?>
                                        </div>
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">Carousel Text</label>
                                            <?php print form_input("text", set_value("text", $text), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Carousel Text..."') ?>
                                        </div>

                                        <?php print form_hidden("id", set_value("id", $id), 'class="form-control" id="exampleInputEmail1" placeholder="Facility name"') ?>



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
