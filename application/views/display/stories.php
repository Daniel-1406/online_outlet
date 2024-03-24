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
</style>
	<!-- Meta Options -->
	<?php $this->load->view("display/load/header")?>
	

	<!-- Banner Start -->

	<section class="banner position-relative">

		<div class="parallax" style="background-image: url(<?php echo base_url();?>images/<?php echo $page["banner"]?>);"></div>

		<div class="banner-data text-center">

<h2 class="text-white font-bold"><?php echo $page["name"]?></h2>
</div>


	</section>

	<!-- Banner End -->


	<!-- Cause Detail Start -->

	<section class="gap">

<div class="container">

    <div class="row">


     <?php echo $page["content"]?>


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