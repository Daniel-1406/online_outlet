<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php print base_url() ?>" class="brand-link">
        <img src="<?php print base_url() ?>images/<?php echo $favicon?>"  alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; border-radius:45;">
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
                            Display Features
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
                        <i class="nav-icon fas fa-square"></i>
                        <p>
                            Page Banners
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/updates/headerevent/load" class="nav-link">
                                <i class="fas fa-calendar nav-icon"></i>
                                <p>Upcoming Events</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/updates/headernewhere/load" class="nav-link">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Leadership Team</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a href="<?php echo base_url(); ?>index.php/updates/headermemories/load" class="nav-link">
                                <i class="fas fa-camera nav-icon"></i>
                                <p>Memories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a href="<?php echo base_url(); ?>index.php/updates/headermemcenter/load" class="nav-link">
                                <i class="fas fa-hourglass nav-icon"></i>
                                <p>Livestream</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a href="<?php echo base_url(); ?>index.php/updates/headerresources/load" class="nav-link">
                                <i class="fas fa-tasks nav-icon"></i>
                                <p>Resources</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/updates/headerabout/load" class="nav-link">
                                <i class="fas fa-edit nav-icon"></i>
                                <p>Request Forms</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a href="<?php echo base_url(); ?>index.php/updates/headerministers/load" class="nav-link">
                                <i class="fas fa-copy nav-icon"></i>
                                <p>Event For Livestream</p>
                            </a>
                        </li>
                        <li class="nav-item">   
                        <a href="<?php echo base_url(); ?>index.php/updates/headervideos/load" class="nav-link">
                                <i class="fas fa-film nav-icon"></i>
                                <p>Videos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/welcome/opendonateupdate" class="nav-link">
                                <i class="far fa-heart nav-icon"></i>
                                <p>Donate</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a href="<?php echo base_url(); ?>index.php/updates/headerexhortation/load" class="nav-link">
                                <i class="fas fa-book nav-icon"></i>
                                <p>Exhortation</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                        <a href="<?php echo base_url(); ?>index.php/updates/headerrecord/load" class="nav-link">
                                <i class="fas fa-pencil-square nav-icon"></i>
                                <p>Request Forms</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                        <a href="<?php echo base_url(); ?>index.php/updates/headercontact/load" class="nav-link">
                                <i class="fas fa-phone nav-icon"></i>
                                <p>Contact Us</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-warning"></i>
                        <p>
                            Page Updates
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/updates/display/openmission" class="nav-link">
                                <i class="fas fa-copy nav-icon"></i>
                                <p>Mission And Beliefs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/updates/display/openleadpastorinfo" class="nav-link">
                                <i class="fas fa-copy nav-icon"></i>
                                <p>About Lead Pastor</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/updates/display/openplanavisit" class="nav-link">
                                <i class="fas fa-copy nav-icon"></i>
                                <p>Plan Your Visit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/updates/display/openlifeatjhc" class="nav-link">
                                <i class="fas fa-copy nav-icon"></i>
                                <p>Life At JHC</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/updates/display/opentakenextstep" class="nav-link">
                                <i class="fas fa-copy nav-icon"></i>
                                <p>Take A Next Step</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/updates/display/openrcf" class="nav-link">
                                <i class="fas fa-copy nav-icon"></i>
                                <p>About RCF</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/updates/display/openconnectgroups" class="nav-link">
                                <i class="fas fa-copy nav-icon"></i>
                                <p>About Connect Groups</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/updates/display/opencareeropp" class="nav-link">
                                <i class="fas fa-copy nav-icon"></i>
                                <p>About Career Opportunities</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/updates/display/openoutreach" class="nav-link">
                                <i class="fas fa-copy nav-icon"></i>
                                <p>About Outreach Ministries</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/updates/display/openrccgvirginia" class="nav-link">
                                <i class="fas fa-copy nav-icon"></i>
                                <p>About RCCG Virginia</p>
                            </a>
                        </li>
                        
                    </ul>
                </li> -->

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file "></i>
                        <p>
                            Pages
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/uploads/page/opencustompage" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Upload Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/uploads/page/viewpages" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage Pages</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>
                            Page Details
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <p>
                                        <i class="fas fa-question nav-icon"></i>
                                         Church FAQs
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>index.php/uploads/details/menupages/openchurchfaq" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Upload</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>index.php/uploads/details/menupages/viewchurchfaq" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage</p>
                                </a>
                            </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <p>
                                        <i class="far fa-circle nav-icon"></i>
                                         RCF FAQs
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>index.php/uploads/details/menupages/openrcffaq" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Upload</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>index.php/uploads/details/menupages/viewrcffaq" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage</p>
                                </a>
                            </li>
                            </ul>
                        </li> -->
                        <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <p>
                                        <i class="fas fa-tasks nav-icon"></i>
                                         Next Step
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>index.php/uploads/details/menupages/opennextstep" class="nav-link">
                                <i class="fas fa-edit nav-icon"></i>
                                <p>Upload</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>index.php/uploads/details/menupages/viewnextstep" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage</p>
                                </a>
                            </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <p>
                                        <i class="fas fa-circle nav-icon"></i>
                                         Prayer Resources
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>index.php/uploads/details/menupages/openprayerresources" class="nav-link">
                                <i class="fas fa-edit nav-icon"></i>
                                <p>Upload</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>index.php/uploads/details/menupages/viewprayerresources" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage</p>
                                </a>
                            </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <p>
                                        <i class="fas fa-certificate nav-icon"></i>
                                         Careers Available
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                            <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>index.php/uploads/details/menupages/opencareer" class="nav-link">
                                <i class="fas fa-edit nav-icon"></i>
                                <p>Upload</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url(); ?>index.php/uploads/details/menupages/viewcareer" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage</p>
                                </a>
                            </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-church"></i>
                        <p>
                            Other Parishes
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/quicklink/openquicklink" class="nav-link">
                                <i class="fas fa-upload nav-icon"></i>
                                <p>Add Parish Information</p>
                            </a>
                        </li>
            
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/quicklink/viewquicklinks" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage Parish Information</p>
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
                        <i class="nav-icon fas fa-barcode"></i>
                        <p>
                            Records
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/record/openrecord" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Upload Record</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/record/viewrecord" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage Records</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-star"></i>
                        <p>
                            Form Category
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/record/openform" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Upload</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/record/viewform" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage</p>
                            </a>
                        </li>
                    </ul>
                </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-camera-retro"></i>
                            <p>
                                Media
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>
                                            <i class="fas fa-film nav-icon"></i>
                                            Video
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/video_upload/openvideoupload" class="nav-link">
                                    <i class="fas fa-edit nav-icon"></i>
                                    <p>Upload Video</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/video_upload/viewvideo" class="nav-link">
                                    <i class="fas fa-barcode nav-icon"></i>
                                    <p>Manage Videos</p>
                                    </a>
                                </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <p>
                                            <i class="fas fa-music nav-icon"></i>
                                            Audio
                                            <i class="fas fa-angle-left right"></i>
                                        </p>
                                    </a>
                                <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/uploads/audio/openaudio" class="nav-link">
                                    <i class="fas fa-edit nav-icon"></i>
                                    <p>Upload Audio</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url(); ?>index.php/uploads/audio/viewaudio" class="nav-link">
                                    <i class="fas fa-barcode     nav-icon"></i>
                                    <p>Manage Audio</p>
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
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Leadership Team
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/leadershipteam/openleadershipteam" class="nav-link">
                                <i class="fas fa-upload nav-icon"></i>
                                <p>Upload</p>
                            </a>
                        </li>
            
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/leadershipteam/viewleaders" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-camera"></i>
                        <p>
                            Memories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/gallery/opengallery" class="nav-link">
                                <i class="fas fa-upload nav-icon"></i>
                                <p>Upload</p>
                            </a>
                        </li>
            
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/gallery/viewgallery" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-heart"></i>
                        <p>
                            Stories
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/testimony/opentestimony" class="nav-link">
                                <i class="fas fa-upload nav-icon"></i>
                                <p>Upload</p>
                            </a>
                        </li>
            
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/testimony/viewtestimonies" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage</p>
                            </a>
                        </li>

                    </ul>
                </li>
                
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Mini Carousel
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/uploads/minicarousel/openminicarousel" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Upload</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/uploads/minicarousel/viewminicarousel" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage Carousels</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Programs
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/uploads/service/openservice" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Upload</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/uploads/service/viewservices" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage Programs</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Exhortations
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/uploads/exhortation/openexhortation" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Upload Exhortation</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/uploads/exhortation/viewexhortations" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage Exhortations</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Events
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/event/openevent" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Upload Event</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/event/viewevents" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage Events</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Sermon Text
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/uploads/sermon/uploadsermon" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Upload Sermon Text</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url(); ?>index.php/uploads/sermon/viewsermon" class="nav-link">
                                <i class="fas fa-barcode nav-icon"></i>
                                <p>Manage Sermon Texts</p>
                            </a>
                        </li>

                    </ul>
                </li> -->
                <li class="nav-item">
                    <a href="<?php print base_url() ?>index.php/welcome/viewmessages" class="nav-link">
                        <i class="fas fa-phone nav-icon "></i>
                        <p>Contact Messages</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php print base_url() ?>index.php/welcome/viewrequests" class="nav-link">
                        <i class="far fa-envelope nav-icon "></i>
                        <p>Request Messages</p>
                    </a>
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
