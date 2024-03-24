<!DOCTYPE html>

<html lang="zxx">

<head>

	<!-- Meta Options -->
	<?php $this->load->view("display/load/header")?>
	

	<!-- Banner Start -->

	<section class="banner position-relative">

		<div class="parallax" style="background-image: url(<?php echo base_url();?>images/<?php echo $header["photo"]?>);"></div>

			<div class="banner-data text-center">

			<h2 class="text-white font-bold" style='text-shadow: 2px 2px 4px #000000'><?php echo $header["title"]?></h2>

				<ul class="flex-all">

					<li><a href="<?php echo base_url()?>" style='text-shadow: 2px 2px 4px #000000' class="text-white">Home</a></li>

				</ul>
			</div>

	</section>

	<!-- Banner End -->

	<!-- Contact Us Start -->

	<div class="gap our-blog">

		<div class="container">

			<div class="row">

				<?php echo $exhortations?>

				

				
				

				
				

			</div>
		</div>

	</div>

	<!-- Contact Us End -->


    
	<!-- Sermon Detail End -->


	<?php $this->load->view("display/load/footer")?>

</body>

</html>