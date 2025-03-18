<!DOCTYPE html>
<html lang="en">
    
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url()?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url()?>plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url()?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url()?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo base_url()?>plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="<?php echo base_url()?>plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="<?php echo base_url()?>plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>dist/css/adminlte.min.css">

<?php?>
    <?php $this->load->view("load/header_main") ?>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <??>
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
                                <h1>Feature</h1>
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
                        <?php print form_open_multipart("welcome/updatestoreinfo"); ?>
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
                                    
                                    echo '<div class="bg-danger" style="text-align:center;"><b>' . validation_errors() . '</b></div>';
                                    if (isset($error))
                                    echo '<div class="bg-danger" style="text-align:center;"><b>' .$error . '</b></div>';

                                    if (isset($pass_err))
                                        echo $pass_err;
                                    ?>
                                    <div class="card-body">
                                        <div class="form-group">

                                            <label for = "exampleInputFile">Name</label>
                                            <div class = "input-group">
                                                <?php print form_input("name",  set_value("name",$name),'class = "form-control" placeholder = "Enter Name"')?>
                                                
                                            </div>
                                            
                                        </div>
                                         
                                          <div class="form-group">

                                            <label for = "exampleInputFile">About Information</label>
                                            <div class = "input-group">
                                                <?php print form_textarea("information",  set_value("information",$information),'class = "form-control" placeholder = "Enter About Information"')?>
                                                
                                            </div>
                                            
                                        </div>
                                          <div class="form-group">

                                            <label for = "exampleInputFile">Address</label>
                                            <div class = "input-group">
                                                <?php print form_input("address",  set_value("address",$address),'class = "form-control" placeholder = "Enter Address"')?>
                                                
                                            </div>
                                            
                                        
                                        <div class="form-group">

                                            <label for = "exampleInputFile">Telephone</label>
                                            <div class = "input-group">
                                                <?php print form_input("telephone",  set_value("telephone",$telephone),'class = "form-control" placeholder = "Enter Telephone"')?>
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">

                                            <label for = "exampleInputFile">Email</label>
                                            <div class = "input-group">
                                                <?php print form_input("email",  set_value("email",$email),'class = "form-control" placeholder = "Enter Email"')?>
                                                
                                            </div>
                                            
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
                                            <label  ><img src="<?php print base_url('images/' . $logo) ?>" width='100%' height='300px'></label>

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Update Logo</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="userfile" id="exampleInputFile">
                                                    <label class="custom-file-label " for="exampleInputFile">Choose file</label>
                                                </div>


                                            </div>
                                        </div>
                                         <div class="form-group">

                                            <label for = "exampleInputFile">Google Map Location Embed</label>
                                            <div class = "input-group">
                                                <?php print form_input("googlemap",  set_value("googlemap",$googlemap),'class = "form-control" placeholder = "Paste Google Map Location"')?>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">

                                            <label for = "exampleInputFile">Facebook Link</label>
                                            <div class = "input-group">
                                                <?php print form_input("facebook",  set_value("facebook",$facebook),'class = "form-control" placeholder = "Enter facebook Link"')?>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">

                                            <label for = "exampleInputFile">Instagram Link</label>
                                            <div class = "input-group">
                                                <?php print form_input("instagram",  set_value("instagram",$instagram),'class = "form-control" placeholder = "Enter Instagram Link"')?>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">

                                            <label for = "exampleInputFile">Twitter Link</label>
                                            <div class = "input-group">
                                                <?php print form_input("twitter",  set_value("twitter",$twitter),'class = "form-control" placeholder = "Enter Twitter Link"')?>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">

                                            <label for = "exampleInputFile">Youtube Link</label>
                                            <div class = "input-group">
                                                <?php print form_input("youtube",  set_value("youtube",$youtube),'class = "form-control" placeholder = "Enter Youtube"')?>
                                                
                                            </div>
                                            
                                        </div>
                                        <?php print form_hidden("id", set_value("id", $id), 'class="form-control" id="exampleInputEmail1" placeholder="Facility name"') ?>

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
            
<!-- jQuery -->
<script src="<?php echo base_url()?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url()?>plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url()?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url()?>plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url()?>plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url()?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url()?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url()?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url()?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?php echo base_url()?>plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo base_url()?>plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  </script>
  // DropzoneJS Demo Code End

        
        <!-- ./wrapper -->

    </body>
</html>
