<!DOCTYPE html>

<html lang="zxx">

<head>

	<!-- Meta Options -->
	<?php $this->load->view("display/load/header")?>
	

    <section class="banner position-relative">

		<div class="parallax" style="background-image: url(<?php echo base_url();?>assets/images/banner.webp);"></div>

			<div class="banner-data text-center">

				<h2 class="text-white font-bold" style='text-shadow: 2px 2px 4px #000000'><?php echo $page["name"]?></h2>


			</div>

	</section>
    

	<!-- Cause Detail Start -->

	<section class="gap cause-detail">

<div class="container">

    <div class="row">

        <div class="cause-meta w-85 m-auto">

            <span><?php echo $page["date"]?></span>

            <h2 class="w-65"><?php echo $page["name"]?></h2>

            

        </div>


        <div class="content w-85 m-auto">

            <?php echo $page["content"]?>


           
            
        </div>

    </div>

</div>

</section>

<!-- Cause Detail End -->

	<?php $this->load->view("display/load/footer")?>

</body>

</html>