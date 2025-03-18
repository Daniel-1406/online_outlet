<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("load/header_main") ?>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <??>
            <?php $this->load->view("load/header") ?>
    
            <?php $this->load->view("load/sidelinks") ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Product Category</h1>
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
                                        <h3 class="card-title-danger">Update Product Category</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?php
                                    print form_open("categories/categoryupdate");
                                    echo '<div class="bg-danger" style="text-align:center;"><b>' . validation_errors() . '</b></div>';
                                    if (isset($pass_err))
                                        echo '<div class="bg-danger" style="text-align:center;"><b><i class="icon fas fa-ban">ERROR</i>' . $pass_err . '</b></div>';
                                    ?>
                                    <div class="card-body">
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">Category Name</label>
                                            <?php print form_input("cat_name", set_value("cat_name", $cat_name), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Category name ..."') ?>
                                            <!--<input type="text" >-->
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleSelectRounded0">Orientation</label>
                                            <?php print form_dropdown("cat_orientation", array("Main" => "Main Category", "Child" => "Child Category", "Class" => "Class", "Tag" => "Tag", "Class" => "Class"), set_value('cat_orientation', $cat_orientation), 'class="custom-select rounded-0" id="exampleSelectRounded0"') ?>

                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleSelectRounded0">Child Category Orientation {Relevent if only Category Orientation is Child Category}</label>
                                            <?php print form_dropdown("child_orientation",$maincategory , set_value('child_orientation',$child_orientation),'class="custom-select rounded-0" id="exampleSelectRounded0"') ?>

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
