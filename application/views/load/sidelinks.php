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
                <img src="<?php print base_url() ?>/images/dnl_(2).jpg" class="img-circle elevation-2" alt="User Image">
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
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            School
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/welcome/schooldetails" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>School Information</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/welcome/socialmedia" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Social Media</p>
                            </a>
                        </li>

                    </ul>
                </li>




                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Features
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Facility
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/welcome/openfacility" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add facility</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/facility/viewfacility" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manage Facilities</p>
                                    </a>
                                </li>


                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Events
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/welcome/openevent" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add Events</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/eventci/viewevent" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manage Event</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    News
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/welcome/opennews" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add News</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/newsci/viewnews" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manage News</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                    </ul>
                </li>



                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Gallery
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/gallery/upload_photos" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Upload photos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/gallery/viewgallery" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mange photos</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php print base_url() ?>index.php/custompage/opencustompages" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Create Custom Pages</p>
                    </a>
                </li>




                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Website Menu
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/menuci/openregistermenu" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/menuci/openmenuview" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View registered Menu</p>
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
                            <a href="<?php echo base_url(); ?>index.php/carosel/createcarousel" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Carousel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/carosel/viewcarousel" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Carousels</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Students
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php print base_url() ?>index.php/welcome/openreg" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Register Student</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <li class="nav-item">
                            <a href="<?php print base_url() ?>index.php/welcome/openstudents" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Registered Students</p>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>Admin
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php print base_url() ?>index.php/welcome/openreg" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin Login
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php print base_url() ?>index.php/welcome/open_reg_stu" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Register new Admin</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?php print base_url() ?>index.php/welcome/logout" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Log out</p>
                    </a>
                </li>
            </ul>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>