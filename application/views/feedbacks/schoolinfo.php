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
            <div class="content-wrapper" style="background-color:white;">
                <!-- Content Header (Page header) -->
                <section class="content-header" style="background-color:white;">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1><b> School Update Feedback</b></h1>
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
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Feedback</h3>
                                    </div>



                                    <form>
                                        <div class="card-body">

                                            <?php
                                                echo  $msg ;
                                            ;
                                            ?> 


                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                             <button type="button" class="btn btn-block btn-danger btn-lg">Back</button>
                                             <button type="button" class="btn btn-block btn-warning btn-lg">Visit Site</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.row -->
                            </div><!-- /.container-fluid -->
                            </section>









                            <!-- /.content -->
                        </div>
                        <!-- /.content-wrapper -->
                        <?php $this->load->view("load/footer") ?>

                    </div>
                    <!-- ./wrapper -->

                    </body>
                    </html>
