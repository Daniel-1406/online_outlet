<!DOCTYPE html>

<html lang="zxx">

<head>

	<!-- Meta Options -->
	<?php $this->load->view("display/load/header")?>
	

	<!-- Banner Start -->

	<section class="banner position-relative">

		<div class="parallax" style="background-image: url(<?php echo base_url();?>images/<?php ?>);"></div>

			<div class="banner-data text-center">

				<h2 class="text-white font-bold">Video Detail</h2>

				<ul class="flex-all">

					<li><a href="JavaScript:void(0)" class="text-white">Home</a></li>

					<li><a href="JavaScript:void(0)" class="text-white">Sermon Detail</a></li>

				</ul>
			</div>

	</section>

	<!-- Banner End -->

    

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