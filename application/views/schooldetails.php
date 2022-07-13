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
                                <h1>School Information</h1>
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
                                        <h3 class="card-title-danger">Update School Information</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?php
                                    print form_open_multipart("welcome/updateschoolinfo");
                                    print "<span style='color:red'>" . validation_errors() . "</span>";
                                    if (isset($error))
                                        print "<span style='color:red'>" . $error . "</span>";

                                    if (isset($pass_err))
                                        echo $pass_err;
                                    ?>
                                    <div class="card-body">
                                        <?php print form_open("welcome/updateschoolinfo"); ?>
                                        <div class="form-group">

                                            <label for = "exampleInputFile">Update School Name</label>
                                            <div class = "input-group">
                                                <input type = "text" class = "form-control" name = "schoolname" placeholder = "School Name">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Update School Motto</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="motto" placeholder="School Motto">
                                            
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Update School Email</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="email" placeholder="School Email">
                                                 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Update School Address</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="addresss" placeholder="School Address">
                                                
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Update School Postcode/Zip</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="postcode" placeholder="School Postcode/Zip">
                                                 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Update School Town/City</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="city" placeholder="School Town/City">
                                                 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Site Major Colour</label>

                                            <div class="input-group my-colorpicker2">
                                                <input type="text" class="form-control" name="majorcolour">

                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                                </div>
                                                 
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        <div class="form-group">
                                            <label>Site Minor Color</label>

                                            <div class="input-group my-colorpicker2">
                                                <input type="text" class="form-control" name="minorcolour">

                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                                </div>
                                                 
                                            </div>
                                            <!-- /.input group -->
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Update School Phone Number</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="phonenumber" placeholder="School Phone Number">
                                                 
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                             <div class = "input-group-append">
                                                    <?php print form_submit("Submit", "Register", 'class="btn btn-primary "')
                                                    ?> 
                                                </div>
                                        </div> 

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
