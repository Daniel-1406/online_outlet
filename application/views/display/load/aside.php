
<aside class="col-lg-3 col-xl-5col order-lg-first">
                            <div class="sidebar sidebar-shop">
                                <div class="widget widget-categories">
                                    <h3 class="widget-title">Product Categories</h3><!-- End .widget-title -->

                                    <div class="widget-body">
                                        <div class="accordion" id="widget-cat-acc">
                                            <div class="acc-item">
                                                <div id="collapse-1" class="show" data-parent="#widget-cat-acc">
                                                    <div class="collapse-wrap">
                                                        <ul>
                                                        <?php 
                                    if(!$mainCategoriesDisplay){
                                        echo "";
                                    }else{
                                        foreach($mainCategoriesDisplay->result() as $category){
                                            echo "
                                            <li><a href='".base_url()."index.php/home/searchlist/$category->id'>$category->cat_name</a></li>
    
                                            ";
                                        }
                                    }
                                   ?>
                                                        </ul>
                                                    </div><!-- End .collapse-wrap -->
                                                </div><!-- End .collapse -->
                                            </div><!-- End .acc-item -->

                                            
                                    </div><!-- End .widget-body -->
                                </div><!-- End .widget -->
                                <div class="widget widget-categories">
                                    <h3 class="widget-title">Product Classes</h3><!-- End .widget-title -->

                                    <div class="widget-body">
                                        <div class="accordion" id="widget-cat-acc">
                                            <div class="acc-item">
                                                <div id="collapse-1" class="show" data-parent="#widget-cat-acc">
                                                    <div class="collapse-wrap">
                                                        <ul>
                                                        <?php 
                                    if(!$classDisplay){
                                        echo "";
                                    }else{
                                        foreach($classDisplay->result() as $class){
                                            echo "
                                            <li><a href='".base_url()."index.php/home/searchlist/$class->id'>$class->cat_name</a></li>
    
                                            ";
                                        }
                                    }
                                   ?>
                                                        </ul>
                                                    </div><!-- End .collapse-wrap -->
                                                </div><!-- End .collapse -->
                                            </div><!-- End .acc-item -->

                                            
                                    </div><!-- End .widget-body -->
                                </div><!-- End .widget -->
                                <div class="widget widget-categories">
                                    <h3 class="widget-title">Price</h3><!-- End .widget-title -->

                                    <div class="widget-body">
                                        <div class="accordion" id="widget-cat-acc">
                                            <div class="acc-item">
                                                <div id="collapse-1" class="show" data-parent="#widget-cat-acc">
                                                    <div class="collapse-wrap">
                                                        <ul>
                                                            <li><a href="#">Under N1 000</a></li>
                                                            <li><a href="#">N1 000 to N10 000</a></li>
                                                            <li><a href="#">N10 000 to N50 000</a></li>
                                                            <li><a href="#">N50 000 to N100 000</a></li>
                                                            <li><a href="#">N100 000 to N500 000</a></li>
                                                            <li><a href="#">500 000 to N1 000 000</a></li>
                                                            <li><a href="#">Above 1 000 000</a></li>
                                                        </ul>
                                                    </div><!-- End .collapse-wrap -->
                                                </div><!-- End .collapse -->
                                            </div><!-- End .acc-item -->

                                            
                                    </div><!-- End .widget-body -->
                                </div><!-- End .widget -->

                                
                                <div class="widget widget-banner-sidebar">
                                    <div class="banner-sidebar-title">ad banner 218 x 430px</div><!-- End .ad-title -->
                                    
                                    <div class="banner-sidebar banner-overlay">
                                        <a href="#">
                                            <img src="<?php echo base_url(); ?>f_assets/images/demos/demo-13/banners/banner-6.jpg" alt="banner">
                                        </a>
                                    </div><!-- End .banner-ad -->
                                </div><!-- End .widget -->
                            </div><!-- End .sidebar sidebar-shop -->
                        </aside><!-- End .col-lg-3 -->