<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <a href="<?php print base_url() ?>" class="brand-link">
        <img src="<?php print base_url() ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">School</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php print base_url() ?>dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo strtoupper($this->session->userdata("admin")); ?></a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php print base_url() ?>index.php/open/opendashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-school"></i>
                        <p>
                            School
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/open/schoolinfo" class="nav-link">
                                <i class="fas fa-copy nav-icon"></i>
                                <p>School Information</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/open/socialmedia" class="nav-link">
                                <i class="fas fa-thumbs-up nav-icon"></i>
                                <p>Social Media</p>
                            </a>
                        </li>

                    </ul>
                </li>




                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fas fa-copy"></i>
                        <p>
                            Features
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-tree nav-icon"></i>
                                <p>
                                    Facility Info
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/open/openfacility" class="nav-link">
                                        <i class="far fa-edit nav-icon"></i>
                                        <p>Add Facility Info</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/facility/viewfacility" class="nav-link">
                                        <i class="fas fa-barcode nav-icon"></i>
                                        <p>Manage Facilities Info</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-users nav-icon "></i>
                                <p>
                                    Events
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/open/openevent" class="nav-link">
                                        <i class="far fa-edit nav-icon"></i>
                                        <p>Add Event Info</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/event/viewevent" class="nav-link">
                                        <i class="fas fa-barcode nav-icon"></i>
                                        <p>Manage Events Info</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-file nav-icon"></i>
                                <p>
                                    News
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/open/opennews" class="nav-link">
                                        <i class="far fa-edit nav-icon"></i>
                                        <p>Add News</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/news/viewnews" class="nav-link">
                                        <i class="fas fa-barcode nav-icon"></i>
                                        <p>Manage News</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                    </ul>
                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/uploadphotos/openphotos" class="nav-link">
                                <i class="fas fa-upload nav-icon"></i>
                                <p>Upload photo</p>
                            </a>
                        </li>
            
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/uploadphotos/viewgallery" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Mange photos</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book "></i>
                        <p>
                            Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/custompage/opencustompages" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Create Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/custompage/viewpages" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage Pages</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Website Menu
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/menu/openmenu" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Create Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/menu/openmenuview" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage Website Menu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Carousel
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/carousel/opencarousel" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Create Carousel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/carousel/viewcarousel" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage Carousels</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-plus-square"></i>
                        <p>
                            Students
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php print base_url() ?>index.php/student/openstudents" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Register Student</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <li class="nav-item">
                            <a href="<?php print base_url() ?>index.php/student/managestudents" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage Registered Students</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php print base_url() ?>index.php/welcome/logout" class="nav-link">
                        <i class="fas fa-dot-circle nav-icon text-danger"></i>
                        <p>Log out</p>
                    </a>
                </li>
            </ul>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>