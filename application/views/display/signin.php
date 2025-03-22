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
                        <li class="breadcrumb-item active" aria-current="page">Sign In</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            
            <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('<?php echo base_url(); ?>f_assets/images/backgrounds/login-bg.jpg')">
            	<div class="container">
            		<div class="form-box">
            			<div class="form-tab">
	            			<ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
							        <a class="nav-link " id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">Register</a>
							    </li>
							    <li class="nav-item">
							        <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Sign In</a>
							    </li>
							   
							</ul>
							<div class="tab-content">
							    <div class="tab-pane fade show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                                        <?php 
                                        echo print form_open("home/loginuser");
                                        ?>
                                        <?php 
                                         if (isset($loginfeedback))
                                        echo '<p style="text-align:center;"><b>' . $loginfeedback . '</b></p>';
?>
                                    <div class="form-group">
							    			<label for="login-usernmae">Username *</label>
                                            <?php print form_input("login-username", set_value("login-username", ""), 'type="email" class="form-control" id="login-username" required"') ?>
							    		</div><!-- End .form-group -->
                                           
							    		<div class="form-group">
							    			<label for="login-pasword">Password *</label>
                                            <?php print form_password("login-password", set_value("login-password", ""), 'type="password" class="form-control" id="login-password" required"') ?>
							    		</div><!-- End .form-group -->
                                        
                                        <div class="form-footer">
							    			<button type="submit" class="btn btn-outline-primary-2">
			                					<span>LOG IN</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>
											<a href="#" class="forgot-link">Forgot Your Password?</a>
							    		</div><!-- End .form-footer -->
							    	<?php echo form_close();?>
							    	
							    </div><!-- .End .tab-pane -->
							    <div class="tab-pane fade " id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                                    <?php print form_open("home/registeruser");
                                          echo '<div style="text-align:center; color:red;"><b>' . validation_errors() . '</b></div>';

                                          if (isset($feedback))
                                        echo '<div style="text-align:center;"><b><i class="icon fas fa-ban">ERROR</i>' . $feedback . '</b></div>';

                                                                        ?>
							    		<div class="form-group">
							    			<label for="register-fullname">Your Full Name *</label>
                                            <?php print form_input("register-fullname", set_value("register-fullname", ""), 'class="form-control" id="register-fullname" required"') ?>
							    		</div><!-- End .form-group -->
                                        <div class="form-group">
							    			<label for="register-username">Your Username *</label>
                                            <?php print form_input("register-username", set_value("register-username", ""), 'class="form-control" id="register-username" required"') ?>
							    		</div><!-- End .form-group -->
                                        <div class="form-group">
							    			<label for="register-email">Your Email *</label>
                                            <?php print form_input("register-email", set_value("register-email", ""), 'type="email" class="form-control" id="register-email" required"') ?>
							    		</div><!-- End .form-group -->
                                           
                                        <div class="form-group">
							    			<label for="register-pasword">Password *</label>
                                            <?php print form_password("register-password", set_value("register-password", ""), 'type="password" class="form-control" id="register-password" required"') ?>
							    		</div><!-- End .form-group -->
                                       
							    		<div class="form-footer">
							    			<button type="submit" class="btn btn-outline-primary-2">
			                					<span>SIGN UP</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>

							    		</div><!-- End .form-footer -->
                                        <?php print form_close(); ?>
                                        </div><!-- .End .tab-pane -->
							</div><!-- End .tab-content -->
						</div><!-- End .form-tab -->
            		</div><!-- End .form-box -->
            	</div><!-- End .container -->
            </div><!-- End .login-page section-bg -->

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