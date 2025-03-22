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
                        <li class="breadcrumb-item"><a href="<?php echo "#" ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            

            <div class="page-content">
            	<div class="cart">
	                <div class="container">
	                	<div class="row">
	                		<div class="col-lg-9">
	                			<table class="table table-cart table-mobile">
									<thead>
										<tr>
											<th>Product</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Total</th>
											<th></th>
										</tr>
									</thead>

									<tbody>
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

											$qty = (int) $cartProduct->qty;
                                            $price = str_replace(',', '', $singleProduct->pr_sell_price);
                                            $price = str_replace(' ', '', $price);
                                            $price = (int) $price;
                                            $totalCost = ($qty * $price);

                                                    $cartDropdown.="
                                            
                                            <tr>
											<td class='product-col'>
												<div class='product'>
													<figure class='product-media'>
														<a href='#'>
															<img src='".base_url()."images/$singleProduct->photo' alt='Product image'>
														</a>
													</figure>

													<h3 class='product-title'>
														<a href='".base_url()."index.php/home/product/$singleProduct->id'>$singleProduct->pr_name</a>
													</h3><!-- End .product-title -->
												</div><!-- End .product -->
											</td>
											<td class='price-col'><span style='text-decoration:line-through double'> N</span> $singleProduct->pr_sell_price</td>
											<td class='quantity-col'>
                                                <div class='cart-product-quantity'>
                                                    <input type='number' class='form-control' value='$cartProduct->qty' min='1' max='10' step='1' data-decimals='0' required>
                                                </div><!-- End .cart-product-quantity -->
                                            </td>
											<td class='total-col'>
											<span style='text-decoration:line-through double'> N</span> $totalCost

											</td>
											<td class='remove-col'><a href='".base_url()."index.php/home/deletethiscartproduct/$cartProduct->id' class='btn-remove'><i class='icon-close'></i></a></td>
										</tr>
                                            ";
                                                }
                                               
                                            }
                                        }
                                         
                                                echo $cartDropdown;

                                    }
                                    ?>
										
									</tbody>
								</table><!-- End .table table-wishlist -->

	                			<div class="cart-bottom">
			            			
			            			<a href="<?php print base_url() ?>index.php/home/cart" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
		            			</div><!-- End .cart-bottom -->
	                		</div><!-- End .col-lg-9 -->
	                		<aside class="col-lg-3">
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

	                				<table class="table table-summary">
	                					<tbody>
	                						<tr class="summary-subtotal">
	                							<td>Subtotal:</td>
	                							<td>$160.00</td>
	                						</tr><!-- End .summary-subtotal -->
	                						<tr class="summary-shipping">
	                							<td>Shipping:</td>
	                							<td>&nbsp;</td>
	                						</tr>

	                						<tr class="summary-shipping-row">
	                							<td>
													<div class="custom-control custom-radio">
														<input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
														<label class="custom-control-label" for="free-shipping">Free Shipping</label>
													</div><!-- End .custom-control -->
	                							</td>
	                							<td>$0.00</td>
	                						</tr><!-- End .summary-shipping-row -->

	                						<tr class="summary-shipping-row">
	                							<td>
	                								<div class="custom-control custom-radio">
														<input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
														<label class="custom-control-label" for="standart-shipping">Standart:</label>
													</div><!-- End .custom-control -->
	                							</td>
	                							<td>$10.00</td>
	                						</tr><!-- End .summary-shipping-row -->

	                						<tr class="summary-shipping-row">
	                							<td>
	                								<div class="custom-control custom-radio">
														<input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
														<label class="custom-control-label" for="express-shipping">Express:</label>
													</div><!-- End .custom-control -->
	                							</td>
	                							<td>$20.00</td>
	                						</tr><!-- End .summary-shipping-row -->

	                						<tr class="summary-shipping-estimate">
	                							<td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
	                							<td>&nbsp;</td>
	                						</tr><!-- End .summary-shipping-estimate -->

	                						<tr class="summary-total">
	                							<td>Total:</td>
	                							<td>$160.00</td>
	                						</tr><!-- End .summary-total -->
	                					</tbody>
	                				</table><!-- End .table table-summary -->

	                				<a href="checkout.html" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
	                			</div><!-- End .summary -->

		            			<a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
	                		</aside><!-- End .col-lg-3 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .cart -->
            </div>

            <!-- End .page-content -->

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