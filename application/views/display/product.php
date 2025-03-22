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
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Product</a></li>
                    </ol>

                    <nav class="product-pager ml-auto" aria-label="Product">
                        <a class="product-pager-link product-pager-prev" href="#" aria-label="Previous" tabindex="-1">
                            <i class="icon-angle-left"></i>
                            <span>Prev</span>
                        </a>

                        <a class="product-pager-link product-pager-next" href="#" aria-label="Next" tabindex="-1">
                            <span>Next</span>
                            <i class="icon-angle-right"></i>
                        </a>
                    </nav><!-- End .pager-nav -->
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="row">
                       
                        <div class="col-lg-9 col-xl-4-5col">
                        <div class="product-details-top">
                        
                        <?php 
                            if(!$singleProduct){
                                echo "";
                            }else{
                                foreach($singleProduct->result() as $product){

                                    echO "
                                    
                                    
                                    <div class='row'>
                            <div class='col-md-6'>
                                <div class='product-gallery product-gallery-vertical'>
                                    <div class='row'>
                                        <figure class='product-main-image'>
                                            <img id='product-zoom' src='".base_url()."images/$product->photo' data-zoom-image='".base_url()."images/$product->photo' alt='product image'>

                                            <a href='#' id='btn-product-gallery' class='btn-product-gallery'>
                                                <i class='icon-arrows'></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id='product-zoom-gallery' class='product-image-gallery'>
                                            <a class='product-gallery-item active' href='#' data-image='".base_url()."images/$product->photo' data-zoom-image='".base_url()."images/$product->photo'>
                                                <img src='".base_url()."images/$product->photo' alt='product side'>
                                            </a>
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class='col-md-6'>
                                <div class='product-details'>
                                    <h1 class='product-title'>$product->pr_name</h1><!-- End .product-title -->

                                    <div class='product-price'>
                                        <span style='text-decoration:line-through double'>N</span> $product->pr_sell_price
                                    </div><!-- End .product-price -->
                                    <div class='product-price' style='color:#aaa;'>
                                        <span style='text-decoration:line-through double'>N  </span>  <del>  $product->pr_slash_price
                                    </del></div><!-- End .product-price -->

                                    <div class='product-content'>
                                        <p>$product->pr_info</p>
                                    </div><!-- End .product-content -->
                                <form action='" . base_url() . "index.php/home/addtocart/$product->id' method='post'>
                                    <div class='details-filter-row details-row-size'>
                                        <label for='qty'>Qty:</label>
                                        <div class='product-details-quantity'>
                                            <input type='number' id='qty' name='qty' class='form-control' value='1' min='1' max='10' step='1' data-decimals='0' required>
                                        </div>
                                    </div>

                                    <div class='product-details-action'>
                                        <button type='submit' class='btn-product btn-cart'><span>add to cart</span></button>

                                        <div class='details-action-wrapper'>
                                            <a href='" . base_url() . "index.php/home/addtowishlist/$product->id' class='btn-product btn-wishlist' title='Wishlist'><span>Add to Wishlist</span></a>
                                        </div>
                                    </div>
                                </form>

                                    <div class='product-details-footer'>
                                        <div class='product-cat'>
                                            <span>Category:</span>
                                            <a href='#'>Women</a>,
                                            <a href='#'>Dresses</a>,
                                            <a href='#'>Yellow</a>
                                        </div><!-- End .product-cat -->

                                        <div class='social-icons social-icons-sm'>
                                            <span class='social-label'>Share:</span>
                                            <a href='#' class='social-icon' title='Facebook' target='_blank'><i class='icon-facebook-f'></i></a>
                                            <a href='#' class='social-icon' title='Twitter' target='_blank'><i class='icon-twitter'></i></a>
                                            <a href='#' class='social-icon' title='Instagram' target='_blank'><i class='icon-instagram'></i></a>
                                            <a href='#' class='social-icon' title='Pinterest' target='_blank'><i class='icon-pinterest'></i></a>
                                        </div>
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class='product-details-tab'>
                        <ul class='nav nav-pills justify-content-center' role='tablist'>
                            <li class='nav-item'>
                                <a class='nav-link active' id='product-desc-link' data-toggle='tab' href='#product-desc-tab' role='tab' aria-controls='product-desc-tab' aria-selected='true'>Description</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' id='product-info-link' data-toggle='tab' href='#product-info-tab' role='tab' aria-controls='product-info-tab' aria-selected='false'>Additional information</a>
                            </li>
                           
                        </ul>
                        <div class='tab-content'>
                            <div class='tab-pane fade show active' id='product-desc-tab' role='tabpanel' aria-labelledby='product-desc-link'>
                                <div class='product-desc-content'>
                                    <h3>Product Description</h3>
                                    $product->pr_desc
                                    </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class='tab-pane fade' id='product-info-tab' role='tabpanel' aria-labelledby='product-info-link'>
                                <div class='product-desc-content'>
                                    <h3>Information</h3>
                                    $product->pr_info
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                           
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->
                                    
                                    ";

                                }
                            }
                        ?>
                    <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                            <span class="product-label label-new">New</span>
                            <span class="product-label label-out">Out of Stock</span>
                            <a href="product.html">
                                    <img src="<?php echo base_url(); ?>f_assets/images/products/product-4.jpg" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">Women</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">Brown paperbag waist <br>pencil skirt</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    N60.00
                                </div><!-- End .product-price -->
                                

                                
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .owl-carousel -->
                        

                			





                            
                        </div><!-- End .col-lg-9 -->
                        <?php $this->load->view("display/load/aside");?>
                        <!-- End .col-lg-3 -->
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