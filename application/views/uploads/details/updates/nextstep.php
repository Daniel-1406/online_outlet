<!DOCTYPE html>
<html lang="en">
<style>

</style>
<?php $data["name"]=$church;
      $data["favicon"]=$favicon;?>
    <?php $this->load->view("load/header_main",$data) ?>
    <body class="hold-transition sidebar-mini">
    <?php if(isset($feedback)) echo $feedback?>

        <div class="wrapper">
            
            <?php $this->load->view("load/header") ?>
    
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
                            <div class="col-md-12"> 
                                <div class="card card-primary">
                                    <div class="card-header"><h3>Next Steps</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?php
                                    print form_open_multipart("uploads/details/menupages/updatenextstep");
                                    echo '<div class="bg-danger" style="text-align:center;"><b>' . validation_errors() . '</b></div>';
                                     ?>
                                    <div class="card-body">
                                    <div class="form-group">  
                                            <label for="exampleInputEmail1">Title</label>
                                            <?php print form_input("title", set_value("title",$title), 'class="form-control" id="exampleInputEmail1"') ?>
                                            <!--<input type="text" >-->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Order Number</label>
                                            <?php print form_input("numbering", set_value("numbering",$numbering), 'class="form-control" id="exampleInputEmail1"') ?>
                                            <!--<input type="text" >-->
                                        </div> 
                                      
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Information About Step</label>
                                            <textarea id="summernote" class="form-control" id="summernote" name="info" id="exampleInputEmail1" placeholder="Enter Exhortation Information...">
                                        <?php echo $info?>
                                        </textarea>
                                        </div>   
                                        <?php print form_hidden("id", set_value("id", $id), 'class="form-control" id="exampleInputEmail1" placeholder="Facility name"') ?>
              
                                    </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <?php print form_submit("Submit", "Update", 'class="btn btn-primary "') ?>

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

