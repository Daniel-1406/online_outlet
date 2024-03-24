<footer id="footer" class="gap footer-one no-bottom green-overlay">
		<div class="parallax" style="background-image: url(<?php echo base_url();?>images/<?php echo $favicon?>);"></div>
		<div class="container">
			<div class="row ">
			<div class="row ">
				<h2 class="text-white" style="text-align:center;">Other Virginia Province 4 Parishes</h2>
					<br><br><?php echo $parishes?>
				
			</div>
			</div>
			<div class="copy-right">
				<div class="social">
					<ul class="social-medias">
						<li><a href="<?php echo $info["facebook"]?>"><img src="<?php echo base_url();?>assets/images/facebook.svg" alt="facebook"></a></li>
						<li><a href="<?php echo $info["twitter"]?>"><img src="<?php echo base_url();?>assets/images/twitter.svg" alt="twitter"></a></li>
						<li><a href="<?php echo $info["instagram"]?>"><img src="<?php echo base_url();?>assets/images/instagram.svg" alt="instagram"></a></li>
					</ul>
				</div>
				<div class="footer-rights">
					<p class="text-white">© Copyright <span>2024 <?php echo $info["churchname"]?></span>. All Rights Reserved.</p>
				</div>
				
			</div>
		</div>
	</footer>
	<!-- Footer One End -->


<!-- Scroll to top -->

<button id="scrollTop" class="scrollTopStick"><svg viewBox="0 0 490.523 490.523" fill="#fff" height="15"> <path style="fill:#FFC107;" d="M487.411,355.047L252.744,120.38c-4.165-4.164-10.917-4.164-15.083,0L2.994,355.047 c-4.093,4.237-3.976,10.99,0.262,15.083c4.134,3.993,10.687,3.993,14.821,0l227.115-227.115l227.115,227.136 c4.237,4.093,10.99,3.976,15.083-0.261c3.993-4.134,3.993-10.688,0-14.821L487.411,355.047z"></path> <path d="M479.859,373.266c-2.831,0.005-5.548-1.115-7.552-3.115L245.192,143.015L18.077,370.151 c-4.237,4.093-10.99,3.976-15.083-0.262c-3.993-4.134-3.993-10.687,0-14.821l234.667-234.667c4.165-4.164,10.917-4.164,15.083,0 l234.667,234.667c4.159,4.172,4.148,10.926-0.024,15.085C485.388,372.146,482.681,373.265,479.859,373.266z"></path> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg></button>

<!-- Donation Modal -->
<div class="modal fade donation-model" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
  <div class="modal-header">
	<h5 class="modal-title" id="staticBackdropLabel">Donate Now</h5>
	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
	<div class="donation-data">

		<h2>Stand Up the Church Climate Crisis</h2>

		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed totam rem ape eaque.</p>

		<div class="donation-form">

			<div class="custom-donation-amount" ><span class="text-white">$</span> <input class="donated_amount" type="number" placeholder="Custom Amount">

			</div>

			<ul class="list-unstyled aos-init aos-animate">

				<li><a class="donating" href="JavaScript:void(0)">$<span class="donation_amount">5</span></a>

				</li>

				<li><a class="donating" href="JavaScript:void(0)">$<span class="donation_amount">10</span></a>

				</li>

				<li><a class="donating" href="JavaScript:void(0)">$<span class="donation_amount">20</span></a>

				</li>

				<li><a class="donating" href="JavaScript:void(0)">$<span class="donation_amount">30</span></a>

				</li>

			</ul>

			<a class="theme-btn" href="JavaScript:void(0)">Donate Now</a>

		</div>
	</div>
  </div>
</div>
</div>
</div>

<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $live["date"]?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "D " + hours + "H "
  + minutes + "M " + seconds + "S ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "";
  }
}, 1000);
</script>


<script>
                    // Get the modal
                    var modal = document.getElementById("feedback");

                    // Get the button that opens the modal
                    var btn = document.getElementById("body");

                    // Get the <span> element that closes the modal
                    var span = document.getElementsByClassName("close")[0];

                    // When the user clicks the button, open the modal 
                    btn.onload = function() {
                    modal.style.display = "block";
                    }

                    // When the user clicks on <span> (x), close the modal
                    span.onclick = function() {
                    modal.style.display = "none";
                    }

                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                    }
                    </script>
<!-- Jquery -->

<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>

<!-- Waypoint -->

<script src="<?php echo base_url();?>assets/js/jquery.waypoints.min.js"></script>



<!-- Counter -->

<script src="<?php echo base_url();?>assets/js/jquery.counterup.min.js"></script>



<!-- Slick Slider Js -->

<script src="<?php echo base_url();?>assets/js/slick.min.js"></script>



<!-- Animate on scroll Js -->

<script src="<?php echo base_url();?>assets/js/aos.js"></script>



<!-- Swiper Js -->

<script src="<?php echo base_url();?>assets/js/swiper.min.js"></script>



<!-- Slider Js -->

<script src="<?php echo base_url();?>assets/js/slider.js"></script>



<!-- Tilt on hover -->

<script src="<?php echo base_url();?>assets/js/tilt.jquery.js"></script>



<!-- Fontawesome Js -->

<script src="<?php echo base_url();?>assets/js/fontawesome.js"></script>



<!-- Fancybox Js -->

<script src="<?php echo base_url();?>assets/js/jquery.fancybox.min.js"></script>


<!-- Bootstrap Js -->

<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>


<!-- Custom Js -->

<script src="<?php echo base_url();?>assets/js/custom.js"></script>

