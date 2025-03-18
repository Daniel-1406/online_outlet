<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view("load/header_main") ?>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <?php $this->load->view("load/header") ?>
            <?php $this->load->view("load/sidelinks") ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Product</h1>
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
                            <div class="col-md-12"> 
                                <div class="card card-primary">
                                    <div class="card-header"><h3>Product Upload</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?php
                                    print form_open_multipart("product/updateproduct");
                                    echo '<div class="bg-danger" style="text-align:center;"><b>' . validation_errors() . '</b></div>';
                                    if (isset($error))
                                        echo '<div class="bg-danger" style="text-align:center;"><b><i class="icon fas fa-ban">ERROR</i>' . $error . '</b></div>';


                                    if (isset($pass_err))
                                        echo '<div class="bg-danger" style="text-align:center;"><b><i class="icon fas fa-ban">ERROR</i>' . $pass_err . '</b></div>';
                                    ?>
                                    <div class="card-body">
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">Product Name</label>
                                            <?php print form_input("pr_name", set_value("pr_name", $pr_name), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Product Name..."') ?>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Product Information</label>
                                        <?php print form_textarea("pr_info", set_value("pr_info", $pr_info), 'rows="3" class="form-control" id="exampleInputEmail1" placeholder="Enter Product Information..."') ?>
                                        </div>
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">Product Selling Price</label>
                                            <?php print form_input("pr_sell_price", set_value("pr_sell_price", $pr_sell_price), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Product Selling Price..."') ?>
                                        </div>
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">Product Slashed Price</label>
                                            <?php print form_input("pr_slash_price", set_value("pr_slash_price",$pr_slash_price), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Product Slashed Price..."') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectRounded0">Main Category</label>
                                            <?php print form_dropdown("main_category",$maincategories , set_value('main_category',$main_category),'class="custom-select rounded-0" id="exampleSelectRounded0"') ?>

                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectRounded0">Class Category</label>
                                            <?php print form_dropdown("class_category",$classcategories , set_value('class_category',$class_category),'class="custom-select rounded-0" id="exampleSelectRounded0"') ?>

                                        </div>
                                        
                                        <div class="form-group">
                                        <label for="">Tags</label>
                                            <?php echo $tags?>                                       
                                        </div>
                                
                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Description</label>
                                            <textarea id="summernote" class="form-control" id="summernote" name="pr_desc" id="exampleInputEmail1" placeholder="">
                                            <?php print set_value("pr_desc", $pr_desc);?></textarea>
                                        </div>
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
                                        <?php print form_hidden("id", set_value("id", $id), 'class="form-control" id="exampleInputEmail1" placeholder="Facility name"') ?>

                                       
                                    </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <?php print form_submit("Submit", "Update Product", 'class="btn btn-primary "') ?>

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
            <div id="feedback" class="modal">
                             <?php ?>
                        </div>
            <?php $this->load->view("load/footer") ?>

