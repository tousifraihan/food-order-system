<?php include('partials-front/menu.php'); ?>



	<!-- Image Carousel -->

        <div id="carousel" class="carousel slide" data-ride="carousel" data-interval="6500">

		


		<!-- Carousel Content -->
		    <div class="carousel-inner">
				<div class="carousel-item active">
					<img src="images/carousel/1.jpg" alt="" class="w-100">
					<div class="carousel-caption">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-10 bg-custom d-none d-md-block py-3 px-0">
									<h1>maisa's kitchen</h1>
									<div class="border-top border-primary w-50 mx-auto my-3"></div>
									<h3 class="pb-3">dine-in + take-out + online order</h3>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<img src="images/carousel/2.jpg" alt="" class="w-100">
					<div class="carousel-caption">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-10 bg-custom d-none d-md-block py-3 px-0">
									<h1>maisa's kitchen</h1>
									<div class="border-top border-primary w-50 mx-auto my-3"></div>
									<h3 class="pb-3">dine-in + take-out + online order</h3>
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="carousel-item">
					<img src="images/carousel/3.jpg" alt="" class="w-100">
					<div class="carousel-caption">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-10 bg-custom d-none d-md-block py-3 px-0">
									<h1>maisa's kitchen</h1>
									<div class="border-top border-primary w-50 mx-auto my-3"></div>
									<h3 class="pb-3">dine-in + take-out + online order</h3>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	
		<!-- End Carousel Content -->


		<!-- Previous & Next Buttons -->
		<a href="#carousel" class="carousel-control-prev" role="button" data-slide="prev">
			<span class="fas fa-chevron-left fa-2x"></span>
		</a>
		<a href="#carousel" class="carousel-control-next" role="button" data-slide="next">
			<span class="fas fa-chevron-right fa-2x"></span>
		</a>


		<!-- End Previous & Next Buttons -->

        </div>
	<!-- End Image Carousel -->


	<!-- Main Page Heading -->
    <div class="col-12 text-center mt-5">
		<h1 class="text-dark pt-3 text-big">featured food</h1>
		<div class="border-top border-primary w-25 mx-auto my-3"></div>
		<p class="lead">for all foodies</p>
	</div>

	<!-- Three Column Section -->
	
	<div class="container" id="cont">
		<div class="row my-5">
		    <?php 
	            $sql="SELECT * FROM tbl_category WHERE active='yes' AND featured='yes' LIMIT 3";
	            //execute the query
	            $res=mysqli_query($conn, $sql);
	            //count rows
	            $count=mysqli_num_rows($res);
	            if($count>0){
		            while($row=mysqli_fetch_assoc($res)){
			            //get the values
			            $id=$row['id'];
			            $name=$row['name'];
			            $image_name=$row['image_name'];
			            ?>
			            <div class="col-md-4 my-4">
						    <?php 
							    if($image_name==""){
									echo "<div class='error'>image not available</div>";
								}
								else{
									?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="" class="w-100">
									<?php
								}
							
							?>
				            <h4 class="my-4 text-big"><?php echo $name; ?></h4>
				
			            </div>

			            <?php
		            }
	            }
	            else{
		            echo "<div class='error'>category not added</div>";
	            }

	
	        ?>	
			
			
		</div>
	</div>
	

	<!-- End Three Column Section -->




	<!-- Start Fixed Background IMG -->
	<div class="fixed-background">
		<div class="row text-light py-5">
			<div class="col-12 text-center">
				<h1>drinks and snacks</h1>
				<h3 class="py-4">for slight hunger</h3>
			</div>
		</div>
		<div class="fixed-wrap">
			<div class="fixed"></div>
		</div>
	</div>

	<!-- End Fixed Background IMG -->


		
	<!-- Start Two Column Section -->
	<div class="col-12 text-center mt-5">
		<h1 class="text-dark pt-3 text-big">fast food</h1>
		<div class="border-top border-primary w-25 mx-auto my-3"></div>
		<p class="lead">for something different</p>
	</div>
	<section class="sect h-500 d-flex align-items-center">
	    <div class="paras">
	        <p class="sectionTag text-big">pizza</p>
		    <p class="sectionSubTag text-small">delicious pizza with genuine italian taste.taste it and decide yourself whether it is worth your money or not</p>

		</div>
	    <div class="thumbnail">
		    <img src="images/pizza.jpg" alt="pizza" class="imgFluid">
		</div>
	</section>
	<br><br>
	<section class="sect left h-500 d-flex align-items-center">
	    <div class="paras">
	        <p class="sectionTag text-big">pasta</p>
		    <p class="sectionSubTag text-small">delicious pizza with genuine italian taste.taste it and decide yourself whether it is worth your money or not</p>

		</div>
	    <div class="thumbnail">
		    <img src="images/pasta.jpg" alt="pasta" class="imgFluid">
		</div>
	</section>
	<br><br>
	<section class="sect sech-500 d-flex align-items-center">
	    <div class="paras">
	        <p class="sectionTag text-big">burger</p>
		    <p class="sectionSubTag text-small">delicious pizza with genuine italian taste.taste it and decide yourself whether it is worth your money or not</p>

		</div>
	    <div class="thumbnail">
		    <img src="images/burger.jpg" alt="burger" class="imgFluid">
		</div>
	</section>


	<!-- End Two Column Section -->


	<!-- Start Jumbotron -->
	<div class="jumbotron py-5 mb-0">
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-lg-8 col-xl-9 my-auto">
					<h4>contact us for any queries and online order</h4>
				</div>
				<div class="col-md-5 col-lg-4 col-xl-3 pt-4 pt-md-0">
					<a href="<?php echo SITEURL; ?>contact.php" class="btn btn-primary btn-lg">contact us</a>
				</div>
			</div>
		</div>
	</div>

	<!-- End Jumbotron -->


	<?php include('partials-front/footer.php'); ?>