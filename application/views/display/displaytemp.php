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
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  min-height:270px;
}

.price {
  color: grey;
  font-size: 22px;
}

.card a {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card a:hover {
  opacity: 0.7;
}

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

		<div class="parallax" style="background-image: url(<?php echo base_url();?>images/<?php echo $page["banner"]?>);"></div>

		<div class="banner-data text-center">

<h2 class="text-white font-bold" style='text-shadow: 2px 2px 4px #000000'><?php echo $page["name"]?></h2>
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


     <?php echo $page["content"]?>


    </div>

</div>

</section>

<?php if(isset($requestforms))
        echo '<section class="gap church-memories">
        <div class="container">
        <h2 class="text-white font-bold" style="text-align:center; text-shadow: 4px 4px 4px #000000;">Request Forms</h2><br><br>

          <div class="row">
            '.$requestforms.'
          </div>
          
        </div>
      </section>';?>


<?php echo $faqs?>
		
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