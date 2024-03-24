<!DOCTYPE html>

<html lang="zxx">

<head>
<style>
.collapsible {
  background-color: #777;
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
  background-color: #555;
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

.content {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f1f1f1;
}
</style>

	<!-- Meta Options -->
	<?php $this->load->view("display/load/header")?>
	

	<!-- Banner Start -->

	<section class="banner position-relative">

		<div class="parallax" style="background-image: url(<?php echo base_url();?>images/<?php echo $banner["photo"]?>);"></div>

			<div class="banner-data text-center">

			<h2 class="text-white font-bold" style='text-shadow: 2px 2px 4px #000000'><?php echo $banner["title"]?></h2>

				<ul class="flex-all">

					<li><a href="<?php echo base_url()?>" style='text-shadow: 2px 2px 4px #000000'class="text-white">Home</a></li>

				</ul>
			</div>
			

	</section>

	<!-- Banner End -->

    

	<section class="support-us gap">
		<div class="container">
		<div class="parallax" style="object-fit:cover;background-image: url(<?php echo base_url();?>images/<?php echo $live["photo"]?>);"></div>

		<div class="container">

			<div class="video-box w-80 m-auto text-center position-relative">

				<h3 class="text-white font-bold w-lg-50 m-auto" style='text-shadow: 2px 2px 4px #000000'><?php echo $live["title"]?><br><h2 class="text-white w-80 m-auto"><span id="demo" style="border:2px solid yellow;background:black; border-radius:7px;">01</span</h2></h3>


				<a class="theme-btn" href="<?php echo $live["link"]?>" style='text-shadow: 2px 2px 4px #000000'>Livestream Now</a>

			</div>

		</div>
							</div>
	</section>


	<!-- Event Three Start -->

	<section class="gap event-three">

		<div class="container">

			<div class="heading">
			<img src="<?php echo base_url();?>images/event.svg" alt="Heading Image">
				<h1>Upcoming Events</h2>
				<p>Don't Miss Your Chance To Get Closer To God</p>
				<br>
			</div>

			<div class="row">
				<?php echo $events?>

			</div>

		</div>

	</section>

	<!-- Event Three End -->



	


	<!-- Sermon Detail End -->


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