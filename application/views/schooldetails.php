<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("load/header_main") ?>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            <?php $this->load->view("load/header") ?>
            <!-- /.navbar -->
            <link rel="stylesheet" href="<?php print base_url() ?>plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
            <!-- Main Sidebar Container -->
            <?php $this->load->view("load/sidelinks") ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 style="color:green">School/School Information</h1>
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
                        <?php print form_open_multipart("welcome/updateschoolinfo"); ?>
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-6"> 
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title-danger">Basic Information</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?php
                                    
                                    print "<span style='color:red'>" . validation_errors() . "</span>";
                                    if (isset($error))
                                        print "<span style='color:red'>" . $error . "</span>";

                                    if (isset($pass_err))
                                        echo $pass_err;
                                    ?>
                                    <div class="card-body">
                                        <?php print form_open("welcome/updateschoolinfo"); ?>
                                        <div class="form-group">

                                            <label for = "exampleInputFile">Name</label>
                                            <div class = "input-group">
                                                <?php print form_input("schoolname",  set_value("schoolname",$school["schoolname"]),'class = "form-control" placeholder = "School Name"')?>
                                                
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Motto</label>
                                            <div class="input-group">
                                                <?php print form_input("schoolmotto",  set_value("schoolmotto",$school["schoolmotto"]),'class = "form-control" placeholder = "School Motto"')?>
                                                 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Email</label>
                                            <div class="input-group">
                                                 <?php print form_input("email",  set_value("email",$school["email"]),'class = "form-control" placeholder = "School Email"')?>
                                                 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Address</label>
                                            <div class="input-group">
                                                <?php print form_input("address",  set_value("address",$school["address"]),'class = "form-control" placeholder = "School Address"')?>
                                                 
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputFile">Town/City</label>
                                            <div class="input-group">
                                                 <?php print form_input("city",  set_value("city",$school["city"]),'class = "form-control" placeholder = "School Town/City"')?>
                                                 
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputFile">Phone Number</label>
                                            <div class="input-group">
                                                <?php print form_input("phonenumber",  set_value("phonenumber",$school["phonenumber"]),'class = "form-control" placeholder = "School Phone Number"')?>
                                                 
                                            </div>
                                        </div>   

                                        
                                         <div class="form-group">
                                            <label>State</label>
                                            <?php print form_dropdown("nigeirastates", $state,set_value("nigeirastates",$school["nigeirastates"]),"class='form-control select2' style='width:100%'")?>
                                             
                                        </div>
  
  

                                    </div>
 
                                </div>
                            </div>
                            <div class="col-md-6"> 
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title-danger">Extra Information</h3>
                                    </div>
                                    
                                    <div class="card-body">
                                         
                                        <div class="form-group">
                                            <label>Major Colour</label>

                                            <div class="input-group my-colorpicker2">
                                                <?php print form_input("majorcolour",  set_value("majorcolour",$school["majorcolour"]),'class = "form-control" ')?>
                                                 
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                                </div>

                                            </div>
                                            <!-- /.input group -->
                                        </div> 
                                        <div class="form-group">
                                            <label>Minor Color</label>

                                            <div class="input-group my-colorpicker3">
                                                <!--<input type="text" class="form-control" name="minorcolour">-->
                                                <?php print form_input("minorcolour",  set_value("minorcolour",$school["minorcolour"]),'class = "form-control" ')?>
                                                 
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-square"></i></span>
                                                </div>

                                            </div>
                                            <!-- /.input group -->
                                        </div> 

                                        <div class="form-group" style="margin-left: 75%;">
                                            <div class = "input-group-append">
                                                <?php print form_submit("Submit", "Update", 'class="btn btn-primary "')
                                                ?> 
                                            </div>
                                        </div> 

                                    </div>
 
                                </div>
                            </div>
                        </div>
                        <?php print form_close(); ?>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php $this->load->view("load/footer") ?>

            <script type="text/javascript">
                $(function () {

                    //color picker with addon
                    $('.my-colorpicker2').colorpicker()

                    $('.my-colorpicker2').on('colorpickerChange', function (event) {
                        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
                    })

                    $('.my-colorpicker3').colorpicker()

                    $('.my-colorpicker3').on('colorpickerChange', function (event) {
                        $('.my-colorpicker3 .fa-square').css('color', event.color.toString());
                    })

                })
            </script>
        </div>
        <!-- ./wrapper -->

    </body>
</html>
