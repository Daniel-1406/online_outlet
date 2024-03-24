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
                                <h1>Record</h1>
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
                                        <h3 class="card-title-danger">Update</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?php
                                    print form_open("record/updaterecord");
                                    echo '<div class="bg-danger" style="text-align:center;"><b>' . validation_errors() . '</b></div>';
                                    if (isset($pass_err))
                                        echo '<div class="bg-danger" style="text-align:center;"><b><i class="icon fas fa-ban">ERROR</i>' . $pass_err . '</b></div>';
                                    ?>
                                    <div class="card-body">
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">Record</label>
                                            <?php print form_input("record", set_value("record",$record), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Record ..."') ?>
                                            <!--<input type="text" >-->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Record Value</label>
                                            <?php print form_input("value", set_value("value",$value), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Record Value ..."') ?>
                                            <!--<input type="text" >-->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectRounded0">Numbering</label>
                                            <?php print form_dropdown("numbering", array("select" => "-numbering-", "1" => "1", "2" => "2", "3" => "3", "4" => "4"), set_value('numbering', $numbering), 'class="custom-select rounded-0" id="exampleSelectRounded0"') ?>
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
