
<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />



<!-- Title -->

<title><?php echo $info["churchname"]?></title>

<!-- Bootstrap -->
<style>
body {font-family: Arial, Helvetica, sans-serif;}


@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #5cb85c;
  color: white;
}
</style>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  min-height:300px;
}

.price {
  color: grey;
  font-size: 22px;
}

.card a {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card a:hover {
  opacity: 0.7;
}

.collapsible {
  background-color:<?php echo $info["maj_color"]?>;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
}

.active, .collapsible:hover {
  background-color: <?php echo $info["maj_color"]?>;
}

.collapsible:after {
  content: '\002B';
  color: white;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

</style>



<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">

<!-- Favicon -->

<link rel="icon" type="image/x-icon" href="<?php echo base_url();?>images/<?php echo $favicon?>">

<!-- Slick Slider -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/slick.css">

<!-- Animate -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/animate.min.css">


<!-- Animate on scroll -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/aos.css">


<!-- Fancy Box -->

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery.fancybox.min.css">


<!-- Stylesheet -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">



<!-- Colors -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/color.css">



<!-- Responsive -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">
<?php include 'stylecolor.php';?>
</head>

<body>

<!-- Loader Start -->
<div class="preloader" id="preloader">
  <svg viewBox="0 0 1920 1080" preserveAspectRatio="none" version="1.1">
    <path d="M0,0 C305.333333,0 625.333333,0 960,0 C1294.66667,0 1614.66667,0 1920,0 L1920,1080 C1614.66667,1080 1294.66667,1080 960,1080 C625.333333,1080 305.333333,1080 0,1080 L0,0 Z"></path>
  </svg>
  <div class="inner">
  <figure><h4><b>..LOADING..</b></h4></figure>
    <canvas class="progress-bar" id="progress-bar" width="200" height="200"></canvas>
    <small><?php echo $info["churchname"]?></small> </div>
  <!-- end inner --> 
</div>

<!-- Loader End -->



<!-- Header One Start -->

<header class="header-one" >

    <div class="top-bar" style="background:<?php echo $info["min_color"];?>">

        <div class="container">

            <div class="row">

                <div class="col-lg-9">

                    <ul class="login">

                        <li><a href="JavaScript:void(0)"><img src="<?php echo base_url();?>images/mail.svg" alt="Email"><?php echo " ".$info["email"]?></a></li>

                        <li><a href="JavaScript:void(0)"><img src="<?php echo base_url();?>images/location.svg" alt="Sddress"><?php echo $info["address"]?></a></li>

                    </ul>

                </div>

                <div class="col-lg-2 offset-1">

                    <ul class="social-medias">

                        <li><a href="<?php echo $info["facebook"]?>"><img src="<?php echo base_url();?>assets/images/facebook.svg" alt="facebook"></a></li>

                        <li><a href="<?php echo $info["twitter"]?>"><img src="<?php echo base_url();?>assets/images/twitter.svg" alt="twitter"></a></li>

                        <li><a href="<?php echo $info["instagram"]?>"><img src="<?php echo base_url();?>assets/images/instagram.svg" alt="instagram"></a></li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <div class="desktop-nav"  id="stickyHeader">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <nav>

                        <div class="logo" style="max-height:72; max-width:186;">

                            <a href="#">

                                <img src="<?php echo base_url();?>images/<?php echo $favicon?>" alt="Logo" style="max-width:186; max-height:72;">

                            </a>

                        </div>

                        <div class="nav-bar" style="margin:10px;">

                            <ul>
                                <?php echo $menu?>
                            </ul>

                        </div>

                        <div class="donation">
                            <!-- <span style="margin:4px;">
                            <a href="JavaScript:void(0)" style="background:#aaa;" class="theme-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Watch Live<img src="<?php echo base_url();?>images/live.svg" alt="Heading Image"></a>
                            </span> -->
                            <!-- <a href="JavaScript:void(0)" class="theme-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><?php //echo $donate["button"]?></a> -->



                        </div>

                        <div id="nav-icon4">

                          <span></span>

                          <span></span>

                          <span></span>

                        </div>

                    </nav>

                </div>

            </div>

        </div>

    </div>

    <div class="mobile-nav" id="mobile-nav">

        <div class="res-log">

            <a href="index.html">

                <img src="<?php echo base_url();?>images/<?php echo $favicon?>" alt="Responsive Logo">

            </a>

        </div>

        <ul><?php echo $menu?></ul>

        <a href="JavaScript:void(0)" id="res-cross"></a>

    </div>

</header>