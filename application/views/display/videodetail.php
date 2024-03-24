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

					<li><a href="<?php echo base_url()?>" class="text-white" style='text-shadow: 2px 2px 4px #000000'>Home</a></li>
				</ul>
			</div>

	</section>

	<!-- Banner End -->


	<!-- Sermon Detail Start -->

	<section class="gap sermon-detail">

		<div class="container">

			<div class="row">

				<div class="sermon-meta w-85 m-auto">

					<ul class="meta justify-content-start">

						<li><?php echo $video["speaker"]?></li>

						<li><?php echo $video["date"]?></li>

					</ul>

					<div class="sermon-box d-flex justify-content-between align-items-center">

						<h2 class="w-60"><?php echo $video["topic"]?></h2>

						<ul class="sermon-icons d-flex">
							<li><a class="flex-all green-bg rounded-circle s_video2" href="JavaScript:void(0)"><svg id="playgdfg-btn" enable-background="new 0 0 494.942 494.942"  viewBox="0 0 494.942 494.942" xmlns="http://www.w3.org/2000/svg"><path d="m35.353 0 424.236 247.471-424.236 247.471z"/></svg></a></li>

						</ul>

					</div>

				</div>
				<div class="sermon-img">
				<div class="sermon-featured-img sermon-media">

					<img class="img-fluid w-100" src="<?php echo base_url(); ?>images/<?php echo $video["pic"]?>" alt="Sermon">
					<div class="">
                    <?php echo $video["link"]?>
                    </div>
				</div>
				</div>
				<div class="content w-85 m-auto">

					<p><?php echo $video["summary"]?></p>
					


				</div>

				<div class="pagination">

						<ul>
							<?php echo $prev?>
							<?php echo $next?>

						</ul>

					</div>

			</div>

		</div>

	</section>

	
	<?php $this->load->view("display/load/footer")?>

</body>

</html>