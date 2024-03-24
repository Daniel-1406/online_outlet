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
                                <h1>Menu</h1>
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
                                        <h3 class="card-title-danger">Upload Menu</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?php
                                    print form_open("menu/menu_upload");
                                    echo '<div class="bg-danger" style="text-align:center;"><b>' . validation_errors() . '</b></div>';
                                    if (isset($pass_err))
                                        echo '<div class="bg-danger" style="text-align:center;"><b><i class="icon fas fa-ban">ERROR</i>' . $pass_err . '</b></div>';
                                    ?>
                                    <div class="card-body">
                                        <div class="form-group">  
                                            <label for="exampleInputEmail1">Menu name</label>
                                            <?php print form_input("name", set_value("name", ""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter menu name ..."') ?>
                                            <!--<input type="text" >-->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Menu url</label>
                                            <?php print form_input("url", set_value("url", ""), 'class="form-control" id="exampleInputEmail1" placeholder="Enter menu url ..."') ?>
                                            <!--<input type="text" >-->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Orientation</label>
                                            <select name="orientation" class="custom-select rounded-0" id="exampleSelectRounded0">
                                                <?php echo $menu; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Child Menu Orientation</label>
                                            <select name="suborientation" class="custom-select rounded-0" id="exampleSelectRounded0">
                                                <?php echo $submenu; ?>
                                            </select>
                                        </div>
                                        

                                        <div class="form-group">
                                            <label for="exampleSelectRounded0">Numbering</label>
                                            <select name="numbering" class="custom-select rounded-0" id="exampleSelectRounded0">
                                                <option>1</option>
                                                <option>2</option> 
                                                <option>3</option> 
                                                <option>4</option> 
                                                <option>5</option> 
                                                <option>6</option> 
                                                <option>7</option> 
                                                <option>8</option> 
                                                <option>9</option> 
                                                <option>10</option> 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelectRounded0">Status</label>
                                            <select name="status" class="custom-select rounded-0" id="exampleSelectRounded0">
                                                <option>Enable</option>
                                                <option>Disable</option> 
                                            </select>
                                        </div>
                                    </div>

                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <?php print form_submit("Submit", "Upload", 'class="btn btn-primary"') ?>

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
