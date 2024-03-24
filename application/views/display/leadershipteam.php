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

.flip-card {
  background-color: transparent;
  width: 300px;
  height: 300px;
  perspective: 1000px;
}

.flip-card-inner {
  position: relative;
  width: 100%;
  height: 100%;
  text-align: center;
  transition: transform 0.6s;
  transform-style: preserve-3d;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
}

.flip-card:hover .flip-card-inner {
  transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
}

.flip-card-front {
  background-color: #bbb;
  color: black;
}

.flip-card-back {
  background-color: <?php echo $info["min_color"]?>;
  color: white;
  transform: rotateY(180deg);
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

					<li><a href="<?php echo base_url()?>" style='text-shadow: 2px 2px 4px #000000' class="text-white">Home</a></li>

				</ul>
</div>


	</section>

	<!-- Banner End -->


	<!-- Our Ministries Start -->

	<section class="gap our-ministries">

		<div class="heading">

				<h2 class="m-auto">Leadership Team</h2>

			</div>

		<div class="container">

			<div class="row">

				<?php echo $leaders?>


			</div>

		</div>

	</section>

	<!-- Our Ministries End -->





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