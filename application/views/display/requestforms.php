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
  transition: max-height 0.7s ease-out;
  background-color: #f1f1f1;
}
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.formcontainer {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
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

	<!-- Church Memories Start -->
	<section class="gap church-memories">
		<div class="container">
			
			<div class="row">
        <?php echo $requestforms?>
			</div>
			
		</div>
	</section>
	
	</div>


	<!-- Church Memories End -->




	<?php $this->load->view("display/load/footer")?>
<script>
    <?php if(isset($feedback)) echo $feedback?>

</script>
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