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
                        <div class="toolbox">
                				<div class="toolbox-left">
                					<div class="toolbox-info">
                						Showing <span>9 of 56</span> Products
                					</div><!-- End .toolbox-info -->
                				</div><!-- End .toolbox-left -->

                				<div class="toolbox-right">
                					<div class="toolbox-sort">
                						<label for="sortby">Sort by:</label>
                						<div class="select-custom">
											<select name="sortby" id="sortby" class="form-control">
												<option value="popularity" selected="selected">Most Popular</option>
												<option value="rating">Most Rated</option>
												<option value="date">Date</option>
											</select>
										</div>
                					</div><!-- End .toolbox-sort -->
                					
                				</div><!-- End .toolbox-right -->
                			</div><!-- End .toolbox -->
                            <div class="products mb-3">
                                
                                <div class="product product-list">
                                    <div class="row">
                                        <div class="col-6 col-lg-3">
                                            <figure class="product-media">
                                                <a href="product.html">
                                                    <img src="<?php echo base_url(); ?>f_assets/images/products/product-5.jpg" alt="Product image" class="product-image">
                                                </a>
                                            </figure><!-- End .product-media -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-6 col-lg-3 order-lg-last">
                                            <div class="product-list-action">
                                                <div class="product-price">
                                                    $84.00
                                                </div><!-- End .product-price -->
                                               
                                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                            </div><!-- End .product-list-action -->
                                        </div><!-- End .col-sm-6 col-lg-3 -->

                                        <div class="col-lg-6">
                                            <div class="product-body product-action-inner">
                                                <div class="product-cat">
                                                    <a href="#">Dresses</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">Dark yellow lace cut out swing dress</a></h3><!-- End .product-title -->

                                                <div class="product-content">
                                                    <p>Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. </p>
                                                </div><!-- End .product-content -->
                                                
                                            </div><!-- End .product-body -->
                                        </div><!-- End .col-lg-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .product -->

                                
                                
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
							        <li class="page-item"><a class="page-link" href="#">3</a></li>
							        <li class="page-item-total">of 6</li>
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