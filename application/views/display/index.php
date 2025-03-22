<!DOCTYPE html>
<html lang="en">


<!-- molla/category-market.html  22 Nov 2019 10:02:55 GMT -->
<head>
    <?php 
        $this->load->view("display/load/homeheaderlinks");
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
                                    <?php 
                                    if(!$mainCategoriesDisplay){
                                        echo "";
                                    }else{
                                        foreach($mainCategoriesDisplay->result() as $category){
                                            echo "
                                            <div class='col-6 col-md-4 col-lg-3'>
                                            <a href='".base_url()."index.php/home/searchlist/$category->id' class='cat-block'>
                                                <h3 class='cat-block-title'>$category->cat_name</h3><!-- End .cat-block-title -->
                                            </a>
                                        </div><!-- End .col-6 col-md-4 col-lg-3 -->
    
                                            ";
                                        }
                                    }
                                   ?>
                                    
                                   
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
                                <?php 
                                if(!$featuredProducts){
                                    echo "";
                                }else{
                                    foreach($featuredProducts->result() as $featuredProduct){
                                         //category logic
                                         $category = "";
                                         $modelProductCat = $this->usermodel->fetchThisProductCatg($featuredProduct->main_category);
                                         if(!$modelProductCat){
                                             $category = "";
 
                                         }else{
                                             $category = $modelProductCat;
                                         }

                                         //tag logic
                                        $labels="";
                                        $tags_string = $featuredProduct->tag_category;
                                        $tags_string = trim($tags_string, '[]');
                                        $tags_string = str_replace('"', '', $tags_string);
                                        $tags_array = explode(',', $tags_string);
                                        $tags_array = array_map('trim', $tags_array);
                                        $arraycount = count($tags_array); 


                                        if(!$allTags){

                                        }else{                                           
                                                foreach ($allTags->result() as $r) {
                                                    
                                                    for($i=0; $i < $arraycount ; $i++){
                                                        if($tags_array[$i] == $r->id && $r->id%2 == 0){
                                                            $labels.="<span class='product-label label-new'>$r->cat_name</span>";
                                                        }elseif($tags_array[$i] == $r->id){
                                                            $labels.="<span class='product-label label-top'>$r->cat_name</span>";
                                                        }
                                                        
                                
                                                    }
                                
                                                   
                                                }
                                        }
                                        

                                         
                                        echo "

                                        
                                        <div class='product'>
                                    <figure class='product-media'>
                                        $labels
                                    <a href='".base_url()."index.php/home/product/$featuredProduct->id'>
                                            <img src='".base_url()."images/$featuredProduct->photo' alt='$featuredProduct->pr_name' class='product-image' style='height:220px; width:218px;'>
                                        </a>

                                        <div class='product-action-vertical'>
                                            <a href='".base_url()."index.php/home/addtowishlist/$featuredProduct->main_category' class='btn-product-icon btn-wishlist btn-expandable'><span>add to wishlist</span></a>
                                            <a href='popup/quickView.html' class='btn-product-icon btn-quickview' title='Quick view'><span>Quick view</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class='product-action'>
                                            <a href='".base_url()."index.php/home/addtocart/$featuredProduct->id' class='btn-product btn-cart' title='Add to cart'><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class='product-body'>
                                        <div class='product-cat'>
                                            <a href='".base_url()."index.php/home/searchlist/$featuredProduct->main_category'>$category</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class='product-title'><a href='".base_url()."index.php/home/product/$featuredProduct->id'>$featuredProduct->pr_name</a></h3><!-- End .product-title -->
                                        <div class='product-price'>
                                            <span style='text-decoration:line-through double'>N</span> $featuredProduct->pr_sell_price
                                        </div><!-- End .product-price -->
                                        
                                    </div><!-- End .product-body -->
                                </div>
                                        
                                        ";
                                    }
                                }
                                ?>
                                <!-- End .product -->

                                
                            </div><!-- End .owl-carousel -->

                            <div class="mb-4"></div><!-- End .mb-4 -->

                                
                            <h2 class="title title-border">New Stocks</h2><!-- End .title -->


                            <div class="products mb-3">
                                <div class="row">
                                <?php  
                                if(!$newStockProducts){
                                    echo "";
                                }else{
                                    foreach($newStockProducts->result() as $product){ 

                                        //category logic
                                        $category = "";
                                        $modelProductCat = $this->usermodel->fetchThisProductCatg($product->main_category);
                                        if(!$modelProductCat){
                                            $category = "";

                                        }else{
                                            $category = $modelProductCat;
                                        }
                                        //tag logic
                                        $labels="";
                                        $tags_string = $product->tag_category;
                                        $tags_string = trim($tags_string, '[]');
                                        $tags_string = str_replace('"', '', $tags_string);
                                        $tags_array = explode(',', $tags_string);
                                        $tags_array = array_map('trim', $tags_array);
                                        $arraycount = count($tags_array); 


                                        if(!$allTags){

                                        }else{                                           
                                                foreach ($allTags->result() as $r) {
                                                    
                                                    for($i=0; $i < $arraycount ; $i++){
                                                        if($tags_array[$i] == $r->id && $r->id%2 == 0){
                                                            $labels.="<span class='product-label label-new'>$r->cat_name</span>";
                                                        }elseif($tags_array[$i] == $r->id){
                                                            $labels.="<span class='product-label label-top'>$r->cat_name</span>";
                                                        }
                                                        
                                
                                                    }
                                
                                                   
                                                }
                                        }
                                        

                                        
                                        echo "
                                        <div class='col-6 col-md-4 col-xl-3'>
                                    <div class='product'>
                                    <figure class='product-media'>
                                        $labels
                                    <a href='".base_url()."index.php/home/product/$product->id'>
                                            <img src='".base_url()."images/$product->photo' alt='$product->pr_name' class='product-image' style='height:220px; width:218px;'>
                                        </a>

                                        <div class='product-action-vertical'>
                                            <a href='".base_url()."index.php/home/addtowishlist/$product->id' class='btn-product-icon btn-wishlist btn-expandable'><span>add to wishlist</span></a>
                                            <a href='popup/quickView.html' class='btn-product-icon btn-quickview' title='Quick view'><span>Quick view</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class='product-action'>
                                            <a href='".base_url()."index.php/home/addtocart/$product->id' class='btn-product btn-cart' title='Add to cart'><span>add to cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class='product-body'>
                                        <div class='product-cat'>
                                            <a href='#'>$category</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class='product-title'><a href='".base_url()."index.php/home/product/$product->id'>$product->pr_name</a></h3><!-- End .product-title -->
                                        <div class='product-price'>
                                            <span style='text-decoration:line-through double'>N</span> $product->pr_sell_price
                                        </div><!-- End .product-price -->
                                        
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->

                                    </div><!-- End .col-sm-6 col-md-4 col-xl-3 -->
                                
                                        ";
                                    }
                                }
                                    ?>
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
                        <?php $this->load->view("display/load/aside");?>
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