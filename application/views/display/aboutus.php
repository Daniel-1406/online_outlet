<!DOCTYPE html>

<html lang="zxx">

<head>

	<!-- Meta Options -->
	<?php $this->load->view("display/load/header")?>
	

	<!-- Banner Start -->

	<section class="banner position-relative">

		<div class="parallax" style="background-image: url(<?php echo base_url();?>images/<?php echo $header["photo"]?>);"></div>

			<div class="banner-data text-center">

				<h2 class="text-white font-bold"><?php echo $header["title"]?></h2>

				<ul class="flex-all">

					<li><a href="<?php echo base_url()?>" class="text-white">Home</a></li>

					<li><a href="JavaScript:void(0)" class="text-white">Sermon Detail</a></li>

				</ul>
			</div>

	</section>

	<!-- Banner End -->


	<!-- About Us Start -->

	<section class="gap  about-us">

		<div class="container">

			<div class="row">

				<div class="col-lg-6 col-md-12 col-sm-12">

					<div class="content">

						<h2>Welcome to The First Church of The Plains</h2>

						<p class="w-85">Lorem ipsum dolor sit amet, consectetur adipisicing elit ipsa quae ab illo invene ipsa quae ab ille ab illo inventor sed  totam rem ape eaque ipsa quae ab illo invene ipsa ae ab ille ab illo inventore.</p>

						<div class="sidetwo">

						<div class="contacts">

							<span>

							<img src="<?php echo base_url();?>images/schedule.svg" alt="arrow">

							</span>

							<ul>

								<li><p>Join Us Every Sundays and Wednesdays</p></li>


							</ul>

						</div>
						<div class="contacts">

							<span>

							<img src="<?php echo base_url();?>images/call.svg" alt="arrow">

							</span>

							<ul>

								<li><p><?php echo $info["telephone"]?></p></li>

								<!-- <li><p class="theme-clr">Every Sunday @ 11:30am via Zoom.</p></li> -->

							</ul>

						</div>

						<div class="contacts">

							<span>

							<img src="<?php echo base_url();?>images/locate.svg" alt="arrow">

							</span>

							<ul>

								<li><p><?php echo $info["address"]?></p></li>

							</ul>

						</div>
					</div>

					</div>

				</div>
				
				<div class="col-lg-6 col-md-12 col-sm-12">

					<div class="content services-online">

						<!-- <h2>Objectives and Goals</h2> -->

						<div class="sidetwo">

						<div class="contacts">

							<span class="icon">

							<img src="<?php echo base_url();?>images/arrow.svg" alt="arrow">

							</span>

							<ul>

								<li><h3>Vision</h3></li>

								<li><p>il odio amet nibh vulpuate cursus laccumsan ipsuy vel ibh vulpuatet nibh.</p></li>

							</ul>

						</div>

						<div class="contacts">

							<span class="icon">

							<img src="<?php echo base_url();?>images/arrow.svg" alt="arrow">

							</span>

							<ul>

								<li><h3>Mission</h3></li>

								<li><p>il odio amet nibh vulpuate cursus laccumsan ipsuy vel ibh vulpuatet nibh.</p></li>



							</ul>

						</div>

						<div class="contacts">

							<span class="icon">

							<img src="<?php echo base_url();?>images/arrow.svg" alt="arrow">

							</span>

							<ul>

								<li><h3>Grow and Become</h3></li>

								<li><p>il odio amet nibh vulpuate cursus laccumsan ipsuy vel ibh vulpuatet nibh.</p></li>



							</ul>
							

						</div>
						<div class="contacts">

							<span class="icon">
							<img src="<?php echo base_url();?>images/arrow.svg" alt="arrow">

							</span>

							<ul>

								<li><h3>Beliefs</h3></li>

								<li><p>il odio amet nibh vulpuate cursus laccumsan ipsuy vel ibh vulpuatet nibh.</p></li>



							</ul>
							

						</div>
						<div class="contacts">

							<span class="icon">

							<img src="<?php echo base_url();?>images/arrow.svg" alt="arrow">

							</span>

							<ul>

								<li><h3>Beliefs</h3></li>

								<li><p>il odio amet nibh vulpuate cursus laccumsan ipsuy vel ibh vulpuatet nibh.</p></li>



							</ul>
							

						</div>

					</div>

					</div>

				</div>

			

			</div>

		</div>

	</section>
	


	<!-- Subscribe Two Start -->
	<section class="gap subscribe-two">
		<div class="container">
			<div class="row">
				<div class="data">
					<h2>Love to Pray For You!</h2>
					<p class="m-auto font-bold">Send us your prayer request or praise report below or email us at <span><?php echo $info["email"]?></span></p>
					<form>
						<div class="shape">
							<input type="text" name="Text" placeholder="Please Enter Your Prayer...">
						</div>
						<button type="submit" class="theme-btn">Send Prayer</button>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Subscribe Two End -->



    

	<section class="subscribe">

		<div class="container">

			<div class="row align-items-center">

				<div class="col-lg-5 col-md-12 col-sm-12">

					<h3 class="text-white">Let’s Keep in Touch!</h3>

					<p class="text-white"><?php echo $info["keep_in_touch"]?></p>

				</div>

				<div class="col-lg-7 col-md-12 col-sm-12">

					<form>

						<input type="text" name="Text" placeholder="Enter Your Email Address...">

						<button>Subscribe</button>

					</form>

				</div>

			</div>

		</div>

	</section>


	<!-- Sermon Detail End -->


	<?php $this->load->view("display/load/footer")?>

</body>

</html>