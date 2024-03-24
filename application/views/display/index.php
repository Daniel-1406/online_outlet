<!DOCTYPE html>

<html lang="zxx">

<head>
<style>
.collapsible {
  background-color: <?php echo $info["maj_color"]?>;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  text-align:center;
}

.active, .collapsible:hover {
  background-color: <?php echo $maj_color?>;
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
<style>
	.content {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: <?php echo $info["min_color"]?>;
}
</style>
	<!-- Meta Options -->
	<?php $this->load->view("display/load/header")?>
	<!-- Header One Start -->
	<script type="text/javascript">
           <?php echo "alert('$result')";?>
    </script>
	<!-- Hero One here -->

        <section class="hero-one">
			<?php echo $carousel?>
		</section>

        <!-- banner part end -->

	<!-- Hero One End -->

<br><br>

	
	<!-- About One Start -->

	<section class="gap no-top about-one">

		<div class="container">

			<div class="row align-items-end">

				<div class="col-lg-6 col-md-12 col-sm-12">

					<div class="about-data">

						<h2><b><?php echo $info["heading"]?></b></h2>

						<p><?php echo $info["information"]?></p>

						<a href="index.php/home/page/planavisit" class="theme-btn">Plan A Visit</a>

					</div>

					<div class="about-gallery gallery">
						<?php echo $randomphotos?>

					</div>

				</div>

				<div class="col-lg-6 col-md-12 col-sm-12">

					<div class="prayers-slider green-bg">
					<?php echo $mini_carousel?>
					</div>

				</div>

			</div>

		</div>

	</section>

	<!-- About Two Start -->
	<section class="gap about-two">
		<div class="container">
		<div class="heading">
			<img src="<?php echo base_url();?>images/programs.svg" alt="Heading Image">
				<h1><b>Our Programs</b></h2>
				<br>
			</div>
			<div class="row">
			</div>
			<div class="row">
				<?php echo $programs?>
			</div>
		</div>
	</section>
	<!-- About Two End -->

	
	<section class="gap event-three">

		<div class="container">

			<div class="heading">
			<img src="<?php echo base_url();?>images/event.svg" alt="Heading Image">
				<h1><b>Upcoming Events</b></h2>
				<br>
			</div>

			<div class="row">
				<?php echo $events?>

			</div>

		</div>

	</section>

	<!-- Event Three End -->

	<!-- Church Prayers Start -->
	<section id="ourstories" class="gap light-bg church-prayers">
		<div class="parallax pattren" style="background-image: url(<?php echo base_url();?>assets/images/pattren.jpg);"></div>
		<div class="container">
			<div class="heading">
			<img src="<?php echo base_url();?>images/testy.svg" alt="Heading Image">
				<h1 class="m-auto"><b>Our Stories</b></h1>				<br>
			</div>
			<?php echo $testimonies?>
		</div>
	</section>
	<!-- Church Prayers End -->


	<!-- Digital Ministry Start -->

	<section class="gap digital-ministry green-overlay">

		<div class="parallax" style="background-image: url(<?php echo base_url();?>assets/images/counter-bg.webp);"></div>

		<div class="container">

			<div class="heading">

				<h2 class="text-white mx-auto"> Jesus House Charlottesville, Virginia RCCG</h2>

			</div>

			<<?php echo $records?>
		</div>

		

	</section>

	<!-- Digital Ministry End -->



	<!-- Recent Sermons One Start -->

	<section class="gap light-bg recent-sermon-one">

		<div class="container">

			<div class="heading">
			<img src="<?php echo base_url();?>images/videos.svg" alt="Heading Image">

				<h1><b>Recent Videos</b></h1>
				<p>Scandoulous Things Jesus did in hi Ministry</p>
				<br>
			</div>

			<div class="row">
				<?php echo $videos?>
			</div>

			<div class="d-flex justify-content-center loadmore">

				<a href="<?php echo base_url()?>index.php/home/openvideos" class="theme-btn">Load More</a>

			</div>

		</div>

	</section>

	<!-- Recent Sermons One End -->


	<!-- Blog Start -->

	<section class="blog">

		<div class="container">

			<div class="heading">
			<img src="<?php echo base_url();?>images/articles.svg" alt="Heading Image">
				<h1><b>Exhortations And Articles</b></h1>
				<br>
			</div>

			<div class="row justify-content-center">
				<?php echo $exhortations?>
			</div>

			<div class="d-flex justify-content-center loadmore">

				<a href="index.php/home/openexhortations" class="theme-btn">View All Exhortations</a>

			</div>

		</div>

	</section>

	<!-- Blog End -->



	<!-- Sponsors Start -->

	<section class="support-us gap">
		<div class="container">
		<div class="parallax" style="object-fit:cover;background-image: url(<?php echo base_url();?>images/<?php echo $donate["photo"]?>);"></div>

		<div class="container">

			<div class="video-box w-80 m-auto text-center position-relative">

				<h3 class="text-white font-bold w-lg-50 m-auto"><?php echo $donate["heading"]?></h3>

				<p class="text-white"><?php echo $donate["information"]?></p>

				<a class="theme-btn" href="JavaScript:void(0)"><?php echo $donate["button"]?></a>

			</div>

		</div>
							</div>
	</section>

	<!-- Sponsors Start -->


	<!-- Church Memories Start -->
	<section class="gap church-memories">
		<div class="container">
			<div class="heading">
				<img src="<?php echo base_url();?>images/gallery.svg" alt="Heading Image">
				<h2><b>Memories</b></h2>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="row">
						<?php echo $memories?>
						
						
					</div>
					
				</div>
			</div>
			<div class="d-flex justify-content-center loadmore">
				<a href="<?php echo base_url()?>index.php/home/openmemories" class="theme-btn">Load More</a>
			</div>
		</div>
	</section>
	<!-- Church Memories End -->
	<!--Get Directions-->

</section>
<div class="map">
<div class="container" >
<div class="heading">
	<img src="<?php echo base_url();?>images/event.svg" alt="Heading Image">
		<h1><b>Get Directions</b></h2>
		<p>Locate Us Wherever you are</p>
		<br>
	</div>
	<div class="col-lg-12 col-md-12">
					<div class="row">
					<?php echo $info["googlemap"]?>
						
						
					</div>
					
				</div>
	</div>
</div>
<section class="gap" id="faq">
		<div class="container">
			
			<div class="row">
			<div class="heading">
			<img src="<?php echo base_url();?>images/faq.svg" alt="Heading Image">
				<h1><b>FAQs</b></h2>
				<br>
			</div>
			<?php echo $generalfaq?>
		</div>
</div>
	</section>



	

	<!-- Footer One Start -->
	<?php $this->load->view("display/load/footer")?>
	<script>
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
</body>

</html>