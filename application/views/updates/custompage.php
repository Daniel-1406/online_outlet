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
                                <h1>Custom Page</h1>
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
                                    <div class="card-header"><h3>Custom Page Update</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?php
                                    print form_open_multipart("updates/page/do_upload");
                                    echo '<div class="bg-danger" style="text-align:center;"><b>' . validation_errors() . '</b></div>';
                                    if (isset($error))
                                        echo '<div class="bg-danger" style="text-align:center;"><b><i class="icon fas fa-ban">ERROR</i>' . $error . '</b></div>';


                                    if (isset($pass_err))
                                        echo '<div class="bg-danger" style="text-align:center;"><b><i class="icon fas fa-ban">ERROR</i>' . $pass_err . '</b></div>';
                                    ?>
                                    <div class="card-body">
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">Page Title</label>
                                            <?php print form_input("name", set_value("name", $name), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Page Title..."') ?>
                                        </div>
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">Page Identifier</label>
                                            <?php print form_input("identifier", set_value("identifier",$identifier), 'class="form-control" id="exampleInputEmail1" placeholder="Enter Page Identifier..."') ?>
                                        </div>
                                        <div class="form-group">  
                                            <label  ><img src="<?php print base_url('images/' . $banner) ?>" width='100%' height='300px'></label>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Page Banner</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="userfile" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose File</label> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Date</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <?php print form_input("date", set_value("date",$date), 'type="date" class="form-control" id="exampleInputEmail1" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Enter Page Date..."') ?>
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputEmail1">Page Content</label>
                                            <textarea id="summernote" class="form-control" id="summernote" name="content" id="exampleInputEmail1" placeholder="Enter Exhortation Information...">
                                            <?php print set_value("content", $content);?>
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
            <div id="feedback" class="modal">
                             <?php ?>
                        </div>
            <?php $this->load->view("load/footer") ?>

