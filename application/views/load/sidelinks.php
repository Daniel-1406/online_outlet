<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php print base_url() ?>" class="brand-link">
        <img src="<?php print base_url() ?>images/<?php echo $logo?>"  alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; border-radius:45;">
        <br><span class="brand-text font-weight-light"><?php echo $name ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php print base_url() ?>dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo strtoupper($this->session->userdata("admin_pass")); ?></a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?php print base_url() ?>index.php/welcome/opendashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/welcome/openinfo" class="nav-link">
                                <i class="fas fa-info nav-icon"></i>
                                <p>Information</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/footerbg/openfooterbg" class="nav-link">
                                <i class="fas fa-trademark nav-icon"></i>
                                <p>Logo</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Menu
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/menu/openmenu" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Upload Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/menu/viewmenu" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage Menu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-star"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/categories/openproductcategory" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Upload</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/categories/viewcategories" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage</p>
                            </a>
                        </li>
                    </ul>
                </li>
            
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/product/openproduct" class="nav-link">
                                <i class="fas fa-upload nav-icon"></i>
                                <p>Upload Product</p>
                            </a>
                        </li>
            
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/product/viewproducts" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage Products</p>
                            </a>
                        </li>

                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Carousel
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/carousel/opencarousel" class="nav-link">
                                <i class="fas fa-upload nav-icon"></i>
                                <p>Upload Carousel</p>
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
                    <a href="<?php print base_url() ?>index.php/welcome/logout" class="nav-link">
                        <i class="fas fa-power-off nav-icon text-danger"></i>
                        <p>Log out</p>
                    </a>
                </li>
            </ul>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
