<!DOCTYPE html>

<html lang="zxx">

<head>

	<!-- Meta Options -->
	<?php $this->load->view("display/load/header")?>
	

    <section class="banner position-relative">

		<div class="parallax" style="object-fit:cover; background-image: url(<?php echo base_url();?>images/<?php echo $header["photo"]?>);"></div>

			<div class="banner-data text-center">

			<h2 class="text-white font-bold"><?php echo $header["title"]?></h2>
			<ul class="flex-all">

<li><a href="<?php echo base_url()?>" style='text-shadow: 2px 2px 4px #000000' class="text-white">Home</a></li>

</ul>

			</div>

	</section>
    

	<section class="gap blog-detail">

		<div class="container">

			<div class="row">

				<div class="col-lg-8 col-md-12 col-sm-12">

					<div class="blog-meta">

						<!-- <img class="img-fluid w-100" style="height:300px;" src="<?php echo base_url();?>images/<?php echo $exhortation["photo"]?>" alt="Blog image"> -->

						<ul>

							<li class="date"><?php echo $exhortation["date"]?></li>
						</ul>

						<h2><?php echo $exhortation["title"]?></h2>

						<ul class="blog-author">


							<li>Author :<a href="JavaScript:void(0)"><?php echo " ".$exhortation["author"]?></a></li>

						</ul>

					</div>

					<div class="content"><?php echo $exhortation["info"]?></div>

					<div class="author green-bg">

						



					</div>

					
				</div>

				<div class="col-lg-4 col-md-12 col-sm-12">

					<aside>

						<div class="blog-sidebar">

							<div class="widget widget-recent-articles">

								<h3>Recent Exhortations</h3>

								<ul>

									
									

								<?php echo $recentexhortation?>

								</ul>

							</div>

							

							<div class="widget widget-popular-posts">

								<h3>Pages</h3>

								<ul><?php echo $randompages?>

								</ul>

							</div>

							

					</aside>

				</div>

			</div>

		</div>

	</section>
    

	<!-- Sermon Detail End -->


	<?php $this->load->view("display/load/footer")?>

</body>

</html>