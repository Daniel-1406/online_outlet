<div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        
                        <a href="index.html" class="logo">
                            <img src="<?php print base_url()?>images/<?php echo $logo ?>" alt="<?php echo $name?>" width="110" height="25">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->

                        <?php
                        //
                            $cartCount="";
                            //$cart = 0;
                            if(!$cart){
                                $cartCount="";
                            }else{
                                $x = 0;
                                foreach($cart->result() as $cartProduct){
                                    $x++;

                                }
                                $cartCount = "<span class='cart-count'>$x</span>";
                            }
                            ?>
                        <a href="wishlist.html" class="wishlist-link">
                            <i class="icon-heart-o"></i>
                        </a>
                           
                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <i class="icon-shopping-cart"></i>
                                <?php echo $cartCount?>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products">
                                    <?php
                                    if(!$cart){
                                        echo "";

                                    }else{
                                        $cartTotal = 0;
                                        $cartDropdown = "";
                                        foreach($cart->result() as $cartProduct){
                                            $singleProducts = $this->usermodel->fetchSingleProduct($cartProduct->product_id);
                                            if(!$singleProducts){
                                                echo "";
                                            }else{
                                                foreach($singleProducts->result() as $singleProduct){

                                                    $cartDropdown.="
                                            
                                            <div class='product'>
                                                <div class='product-cart-details'>
                                                <h4 class='product-title'>
                                                    <a href='product.html'>$singleProduct->pr_name</a>
                                                </h4>

                                                <span class='cart-product-info'>
                                                    <span class='cart-product-qty'>$cartProduct->qty</span>
                                                    x <span style='text-decoration:line-through double'> N</span> $singleProduct->pr_sell_price

                                                </span>
                                                </div><!-- End .product-cart-details -->

                                                <figure class='product-image-container'>
                                                    <a href='product.html' class='product-image'>
                                                        <img src='".base_url()."images/$singleProduct->photo' alt='product'>
                                                    </a>
                                                </figure>
                                                <a href='#' class='btn-remove' title='Remove Product'><i class='icon-close'></i></a>
                                            </div><!-- End .product -->
                                            ";
                                            $qty = (int) $cartProduct->qty;
                                            $price = str_replace(',', '', $singleProduct->pr_sell_price);
                                            $price = str_replace(' ', '', $price);
                                            $price = (int) $price;
                                            $cartTotal = $cartTotal + ($qty * $price);
                                                }
                                               
                                            }
                                        }
                                         $cartDropdown.="
                                                <div class='dropdown-cart-total'>
                                                    <span>Total</span>

                                                    <span class='cart-total-price'><span style='text-decoration:line-through double'> N</span> $cartTotal</span>
                                                </div><!-- End .dropdown-cart-total -->

                                                <div class='dropdown-cart-action'>
                                                    <a href='".base_url()."index.php/home/cart' class='btn btn-primary'>View Cart</a>
                                                    <a href='checkout.html' class='btn btn-outline-primary-2'><span>Checkout</span><i class='icon-long-arrow-right'></i></a>
                                                </div><!-- End .dropdown-cart-total -->";
                                                echo $cartDropdown;

                                    }
                                    ?>
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div>