<!DOCTYPE html>

<html lang="zxx">

<head>
	<style>
		.btn {
  background-color: <?php echo $info["min_color"]?>;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
}
.btn:hover {
  background-color: RoyalBlue;
}
.description{
  position: absolute;
  bottom: 50px;
  left: 69px;
}
.description a:hover{
  background-color: white;
  font-weight: bold;
  text-shadow: 2px 2x 4px #fff;
  color:black;
}


	</style>
	<!-- Meta Options -->
	<?php $this->load->view("display/load/header")?>
	

	<!-- Banner Start -->

	<section class="banner position-relative">

		<div class="parallax" style=" background-image: url(<?php echo base_url();?>images/<?php echo $banner["photo"]?>);"></div>

		<div class="banner-data text-center">

<h2 class="text-white font-bold" style='text-shadow: 2px 2px 4px #000000'><?php echo $banner["title"]?></h2>
<ul class="flex-all">

					<li><a href="<?php echo base_url()?>" style='text-shadow: 2px 2px 4px #000000' class="text-white">Home</a></li>

				</ul>
</div>


	</section>

	<!-- Banner End -->


	<!-- Cause Detail Start -->

	<section class="gap">

<div class="container">

    <div class="row">

    <div class="widget widget-categories">

	<h2 class="text-white" style="text-align:center;text-shadow: 4px 4px 4px #000000;">Prayer Resources</h2>
	<br><br>

								<ul><?php echo $prayerresources?>
								</ul>

							</div>


    </div>

</div>

</section>
<section class="gap church-memories" id="career">
		<div class="container">
		<h2 class="text-white font-bold" style="text-align:center; text-shadow: 4px 4px 4px #000000;">Career Opportunities</h2>
		<br>
		<br>
		<div class="row">
		<?php echo $careers?>
</div>
</div>
	</section>
  <section class="gap church-memories" id="audio">
		<div class="container">
		<h2 class="text-white font-bold" style="text-align:center; text-shadow: 4px 4px 4px #000000;">Audio</h2>
		<br>
		<br>
              <div class="row">
                <?php echo $audio?>
              </div>
</div>
	</section>


<?php echo $faqs?>
		
	<!-- Church Memories Start -->
	<section class="gap church-memories">
		<div class="container">
			
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="row">
						<?php echo $randompage?>
					</div>
					
				</div>
				
			</div>
			
		</div>
	</section>
	
	
	</div>


	<!-- Church Memories End -->




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