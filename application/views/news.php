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
                                <h1>Latest News</h1>
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
                                        <h3 class="card-title-danger">Upload News</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?php
                                    print form_open_multipart("news/do_upload");
                                    print "<span style='color:red'>" . validation_errors() . "</span>";
                                    if (isset($error))
                                        print "<span style='color:red'>" . $error . "</span>";

                                    if (isset($pass_err))
                                        echo $pass_err;
                                    ?>
                                    <div class="card-body">
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">News Title</label>
                                            <?php print form_input("title", set_value("title", ""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter news title"') ?>
                                            <!--<input type="text" >-->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">News photo</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="userfile"id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>News Date </label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">News Description</label>
                                            <?php print form_textarea("description", set_value("description", ""), 'class="form-control" id="exampleInputEmail1" placeholder="News description"') ?>
                                            <!--<input type="text" >-->
                                        </div>


                                    </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <?php print form_submit("Submit", "Upload News", 'class="btn btn-primary"') ?>

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
