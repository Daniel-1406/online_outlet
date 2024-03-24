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
                                <h1>Sermon Upload</h1>
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
                                        <h3 class="card-title-danger">Sermon Upload</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?php
                                    print form_open("uploads/sermon/uploadsermon");
                                    echo '<div class="bg-danger" style="text-align:center;"><b>' . validation_errors() . '</b></div>';
                                    if (isset($pass_err))
                                        echo '<div class="bg-danger" style="text-align:center;"><b><i class="icon fas fa-ban">ERROR</i>' . $pass_err . '</b></div>';
                                    ?>
                                    <div class="card-body">
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">Sermon Topic</label>
                                            <?php print form_input("topic", set_value("topic", ""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Sermon Topic..."') ?>
                                            <!--<input type="text" >-->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Preacher</label>
                                            <?php print form_input("preacher", set_value("preacher", ""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Preacher ..."') ?>
                                            <!--<input type="text" >-->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sermon Text</label>
                                            <?php print form_input("text", set_value("text", ""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Sermon Text ..."') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sermon Date</label>
                                            <?php print form_input("date", set_value("date", ""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Sermon Date ..."') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sermon Message</label>
                                            <?php print form_textarea("message", set_value("message", ""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Sermon Message ..."') ?>
                                        </div>
                                    </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <?php print form_submit("Submit", "Upload Sermon", 'class="btn btn-primary"') ?>

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
