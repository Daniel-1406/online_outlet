<!DOCTYPE html>

<html lang="zxx">

<head>

	<!-- Meta Options -->
	<?php $this->load->view("display/load/header")?>
	

	<!-- Banner Start -->

	<section class="banner position-relative">

	<div class="parallax" style="background-image: url(<?php echo base_url();?>images/<?php echo $banner["photo"]?>);"></div>

			<div class="banner-data text-center">

				<h2 class="text-white font-bold" style='text-shadow: 2px 2px 4px #000000'><?php echo $banner["title"]?></h2>

				<ul class="flex-all">

					<li><a href="<?php echo base_url()?>" style='text-shadow: 2px 2px 4px #000000' class="text-white">Home</a></li>


				</ul>
			</div>

	</section>

	<!-- Banner End -->
<!-- Church Memories Start -->
<section class="gap church-memories">
		<div class="container">
			
			<div class="row">
				<?php echo $memories?>
			</div>
			<div class="d-flex justify-content-center loadmore">
				<a href="JavaScript:void(0)" class="theme-btn">Load More</a>
			</div>
		</div>
	</section>
	<!-- Church Memories End -->

    

	<!-- Sermon Detail End -->


	<?php $this->load->view("display/load/footer")?>

</body>

</html>