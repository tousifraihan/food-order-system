<?php include('config/constants.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>MAISA'S KITCHEN</title>
	
	<!-- Bootstrap 4.5 CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
</head>
<body>

	<!-- Top Bar -->
    
	<!-- End Top Bar -->


	<!-- Navigation -->
    <nav class="navbar bg-light navbar-light navbar-expand-lg">

		<div class="container">
           <a href="index.html" class="navbar-brand"><img src="images/logo.png" alt="logo" title="logo"></a>
		   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			   <span class="navbar-toggler-icon"></span>
		   </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="<?php echo SITEURL; ?>login.php" class="nav-link active">home</a></li>
					<li class="nav-item"><a href="login.php" class="nav-link">food menu</a></li>
					<li class="nav-item"><a href="login.php" class="nav-link">order</a></li>
					<li class="nav-item"><a href="login.php" class="nav-link">contact us</a></li>
					<li class="nav-item"><a href="login.php" class="nav-link">login</a>

					
					
					</li>
				</ul>
			</div>

		</div>
	</nav>
	<!-- End Navigation -->



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
									<a href="registration.php" class="btn btn-danger btn-lg mr-2">register or google login</a>
									<!-- <a href="login.php" class="btn btn-primary btn-lg ml-2">login</a> -->
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
									<a href="registration.php" class="btn btn-danger btn-lg mr-2">register or google login</a>
									<!-- <a href="login.php" class="btn btn-primary btn-lg ml-2">login</a> -->
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
									<a href="registration.php" class="btn btn-danger btn-lg mr-2">register or google login</a>
									<!-- <a href="login.php" class="btn btn-primary btn-lg ml-2">login</a> -->
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
		<h1 class="text-dark pt-3 text-big">daily routine</h1>
		<div class="border-top border-primary w-25 mx-auto my-3"></div>
		<p class="lead">for all foodies</p>
	</div>

	<!-- Three Column Section -->
	<div class="container" id="cont">
		<div class="row my-5">
			<div class="col-md-4 my-4">
				<img src="images/1.jpg" alt="" class="w-100">
				<h4 class="my-4 text-big">breakfast</h4>
				<p class="text-small">we serve sumptuous breakfast for our dear customers from 6am till 10am</p>
				<a href="<?php echo SITEURL; ?>login.php" class="btn btn-primary btn-md">order</a>
			</div>
			<div class="col-md-4 my-4">
				<img src="images/2.jpg" alt="" class="w-100">
				<h4 class="my-4 text-big">lunch</h4>
				<p class="text-small">we serve sumptuous lunch for our dear customers from 12pm till 3pm</p>
				<a href="<?php echo SITEURL; ?>login.php" class="btn btn-primary btn-md">order</a>
			</div>
			<div class="col-md-4 my-4">
				<img src="images/3.jpg" alt="" class="w-100">
				<h4 class="my-4 text-big">dinner</h4>
				<p class="text-small">we serve sumptuous dinner for our dear customers from 7pm till 10pm</p>
				<a href="<?php echo SITEURL; ?>login.php" class="btn btn-primary btn-md">order</a>
			</div>
		</div>
	</div>
	

	<!-- End Three Column Section -->




	<!-- Start Fixed Background IMG -->
	<div class="fixed-background">
		<div class="row text-light py-5">
			<div class="col-12 text-center">
				<h1>drinks and snacks</h1>
				<h3 class="py-4">for slight hunger</h3>
				<a href="<?php echo SITEURL; ?>login.php" class="btn btn-primary btn-lg ml-2">order</a>
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
			<a href="<?php echo SITEURL; ?>login.php" class="btn btn-primary btn-md">order</a>
		</div>
	    <div class="thumbnail">
		    <img src="images/pizza.jpg" alt="pizza" class="imgFluid">
		</div>
	</section>
	<br><br>
	
	<br><br>
	<section class="sect left sech-500 d-flex align-items-center">
	    <div class="paras">
	        <p class="sectionTag text-big">burger</p>
		    <p class="sectionSubTag text-small">delicious pizza with genuine italian taste.taste it and decide yourself whether it is worth your money or not</p>
			<a href="<?php echo SITEURL; ?>login.php" class="btn btn-primary btn-md">order</a>
		</div>
	    <div class="thumbnail">
		    <img src="images/burger.jpg" alt="pizza" class="imgFluid">
		</div>
	</section>


	<!-- End Two Column Section -->


	<!-- Start Jumbotron -->
	<div class="jumbotron py-5 mb-0">
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-lg-8 col-xl-9 my-auto">
					<h4>contact us for reservation and online order</h4>
				</div>
				<div class="col-md-5 col-lg-4 col-xl-3 pt-4 pt-md-0">
					<a href="<?php echo SITEURL; ?>login.php" class="btn btn-primary btn-lg">contact us</a>
				</div>
			</div>
		</div>
	</div>

	<!-- End Jumbotron -->


	<?php include('partials-front/footer.php'); ?>