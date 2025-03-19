<!DOCTYPE html>
<html lang="en">


<!-- molla/category-market.html  22 Nov 2019 10:02:55 GMT -->
<head>
    <?php 
        $this->load->view("display/load/headerlinks");
    ?>
</head>

<body>
    <div class="page-wrapper">
        <header class="header header-10">
        <?php 
            $this->load->view("display/load/headertop");
        ?>
            <!-- End .header-top -->
            <?php 
            $this->load->view("display/load/headermiddle");
            ?>
            <!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                        <?php 
                        $this->load->view("display/load/categorydropdown");
                        ?>
                            <!-- End .category-dropdown -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-lg-9">
                            <?php
                            $this->load->view("display/load/nav");
                            ?>
                            <!-- End .main-nav -->
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-xl-4-5col">
                            <div class="category-banners-slider owl-carousel owl-simple owl-nav-inside" data-toggle="owl" 
                                data-owl-options='{
                                    "nav": false,
                                    "responsive": {
                                        "768": {
                                            "nav": true
                                        }
                                    }
                                }'>
                                <div class="banner banner-poster">
                                    
                                    <a href="#">
                                        <img src="<?php echo base_url(); ?>f_assets/images/demos/demo-13/banners/banner-7.jpg" alt="Banner">
                                    </a>

                                    <div class="banner-content banner-content-right">
                                        <h3 class="banner-subtitle"><a href="#">Amazing Value</a></h3><!-- End .banner-subtitle -->
                                        <h2 class="banner-title"><a href="#">High Performance 4K TVs</a></h2><!-- End .banner-title -->
                                        <a href="#" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->

                                <div class="banner banner-poster">
                                    <a href="#">
                                        <img src="<?php echo base_url(); ?>f_assets/images/demos/demo-13/banners/banner-8.jpg" alt="Banner">
                                    </a>

                                    <div class="banner-content">
                                        <h3 class="banner-subtitle"><a href="#">Weekend Deal</a></h3><!-- End .banner-subtitle -->
                                        <h2 class="banner-title"><a href="#">Apple & Accessories</a></h2><!-- End .banner-title -->
                                        <a href="#" class="banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            </div><!-- End .owl-carousel -->

                            <div class="mb-3"></div><!-- End .mb-3 -->

                            
                            <div class="mb-3 mb-lg-5"></div><!-- End .mb-3 mb-lg-5 -->

                            <div class="cat-blocks-container">
                                <div class="row">
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <a href="category.html" class="cat-block">
                                            <h3 class="cat-block-title">Desktop Computers</h3><!-- End .cat-block-title -->
                                        </a>
                                    </div><!-- End .col-6 col-md-4 col-lg-3 -->

                                    <div class="col-6 col-md-4 col-lg-3">
                                        <a href="category.html" class="cat-block">
                                            
                                            <h3 class="cat-block-title">Monitors</h3><!-- End .cat-block-title -->
                                        </a>
                                    </div><!-- End .col-6 col-md-4 col-lg-3 -->

                                    <div class="col-6 col-md-4 col-lg-3">
                                        <a href="category.html" class="cat-block">
                                           
                                            <h3 class="cat-block-title">Laptops</h3><!-- End .cat-block-title -->
                                        </a>
                                    </div><!-- End .col-6 col-md-4 col-lg-3 -->

                                    <div class="col-6 col-md-4 col-lg-3">
                                        <a href="category.html" class="cat-block">
                                            
                                            <h3 class="cat-block-title">iPads & Tablets</h3><!-- End .cat-block-title -->
                                        </a>
                                    </div><!-- End .col-6 col-md-4 col-lg-3 -->

                                    <div class="col-6 col-md-4 col-lg-3">
                                        <a href="category.html" class="cat-block">
                                           

                                            <h3 class="cat-block-title">Hard Drives & Storage</h3><!-- End .cat-block-title -->
                                        </a>
                                    </div><!-- End .col-6 col-md-4 col-lg-3 -->
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <a href="category.html" class="cat-block">
                                            <h3 class="cat-block-title">Printers & Supplies</h3><!-- End .cat-block-title -->
                                        </a>
                                    </div><!-- End .col-6 col-md-4 col-lg-3 -->
                                    <div class="col-6 col-md-4 col-lg-3">
                                        <a href="category.html" class="cat-block">
                                            <h3 class="cat-block-title">Computer Accessories</h3><!-- End .cat-block-title -->
                                        </a>
                                    </div><!-- End .col-6 col-md-4 col-lg-3 -->
                                </div><!-- End .row -->
                            </div><!-- End .cat-blocks-container -->

                            <div class="mb-2"></div><!-- End .mb-2 -->

                            <h2 class="title title-border">Featured Items</h2><!-- End .title -->

                            <div class="owl-carousel owl-simple owl-nav-top carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                                data-owl-options='{
                                    "nav": true, 
                                    "dots": false,
                                    "margin": 20,
                                    "loop": false,
                                    "responsive": {
                                        "0": {
                                            "items":2
                                        },
                                        "480": {
                                            "items":2
                                        },
                                        "768": {
                                            "items":3
                                        },
                                        "1200": {
                                            "items":4
                                        }
                                    }
                                }'>
                                <div class="product">
                                    <figure class="product-media">
                                    <span class="product-label label-top">Top</span>
                                    <span class="product-label label-new">New</span>
                                                <span class="product-label label-sale">Sale</span>

                                    <a href="product.html">
                                            <img src="<?php echo base_url(); ?>f_assets/images/demos/demo-13/products/product-7.jpg" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Laptops</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">MacBook Pro 13" Display, i5</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            N 1 200 000.00
                                        </div><!-- End .product-price -->
                                        
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                
                            </div><!-- End .owl-carousel -->

                            <div class="mb-4"></div><!-- End .mb-4 -->

                                
                            <h2 class="title title-border">New Stocks</h2><!-- End .title -->


                            <div class="products mb-3">
                                <div class="row">
                                    <div class="col-6 col-md-4 col-xl-3">
                                    <div class="product">
                                    <figure class="product-media">
                                    <span class="product-label label-top">Top</span>
                                    <span class="product-label label-new">New</span>
                                                <span class="product-label label-sale">Sale</span>

                                    <a href="product.html">
                                            <img src="<?php echo base_url(); ?>f_assets/images/demos/demo-13/products/product-7.jpg" alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Laptops</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">MacBook Pro 13" Display, i5</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            N 1 200 000.00
                                        </div><!-- End .product-price -->
                                        
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                    </div><!-- End .col-sm-6 col-md-4 col-xl-3 -->
                                </div><!-- End .row -->
                            </div><!-- End .products -->

                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                            <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                        </a>
                                    </li>
                                    <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item-total">of 17</li>
                                    <li class="page-item">
                                        <a class="page-link page-link-next" href="#" aria-label="Next">
                                            Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div><!-- End .col-lg-9 -->

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
                                                            <li><a href="#">Phones</a></li>
                                                            <li><a href="#">Snacks</a></li>
                                                            <li><a href="#">Electronics</a></li>
                                                            <li><a href="#">Milk</a></li>
                                                            <li><a href="#">Fruits and Vegetables</a></li>
                                                            <li><a href="#">Housing and Real Estates</a></li>
                                                            <li><a href="#">Computer Accessories</a></li>
                                                        </ul>
                                                    </div><!-- End .collapse-wrap -->
                                                </div><!-- End .collapse -->
                                            </div><!-- End .acc-item -->

                                            
                                    </div><!-- End .widget-body -->
                                </div><!-- End .widget -->
                                <div class="widget widget-categories">
                                    <h3 class="widget-title">Tags</h3><!-- End .widget-title -->

                                    <div class="widget-body">
                                        <div class="accordion" id="widget-cat-acc">
                                            <div class="acc-item">
                                                <div id="collapse-1" class="show" data-parent="#widget-cat-acc">
                                                    <div class="collapse-wrap">
                                                        <ul>
                                                        <li><a href="#">New Arrivals</a></li>
                                                        <li><a href="#">Out of Stock</a></li>
                                                        <li><a href="#">For Rent</a></li>
                                                        <li><a href="#">For Men</a></li>
                                                        <li><a href="#">For Women</a></li>
                                                        <li><a href="#">For Children</a></li>
                                                            
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
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->

            <div class="cta cta-horizontal cta-horizontal-box bg-primary">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <h3 class="cta-title text-white">Join Our Newsletter</h3><!-- End .cta-title -->
                            <p class="cta-desc text-white">Subcribe to get information about products and coupons</p><!-- End .cta-desc -->
                        </div><!-- End .col-lg-5 -->
                        
                        <div class="col-lg-7">
                            <form action="#">
                                <div class="input-group">
                                    <input type="email" class="form-control form-control-white" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-white-2" type="submit"><span>Subscribe</span><i class="icon-long-arrow-right"></i></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                        </div><!-- End .col-lg-7 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .cta -->
        </main><!-- End .main -->

        <footer class="footer footer-2">
            <?php $this->load->view("display/load/footer");?>
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <?php $this->load->view("display/load/mobilenav");?>

    <!-- Sign in / Register Modal -->
    <?php $this->load->view("display/load/signin");?>

    <?php 
    $this->load->view("display/load/footerlinks");
    ?>
    </body>


<!-- molla/category-market.html  22 Nov 2019 10:03:00 GMT -->
</html>