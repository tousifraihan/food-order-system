<?php
    include('config/constants.php');
    if(!isset($_SESSION['email'])){
	    echo "you are logged out";
	    header('location:login.php');
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>MAISA'S KITCHEN</title>
	
	<!-- Bootstrap 4.5 CSS -->
	<!-- Bootstrap 4.5 CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
	<!-- Style CSS -->
	<link rel="stylesheet" href="css/style.css">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
				<div class="collapse navbar-collapse" id="navbarResponsive" id="myLinks">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a href="<?php echo SITEURL; ?>home.php" class="nav-link">home</a></li>
						<li class="nav-item"><a href="<?php echo SITEURL; ?>categories.php" class="nav-link">food-category</a></li>
						<li class="nav-item"><a href="<?php echo SITEURL; ?>category-food.php" class="nav-link">food-menu</a></li>
						<li class="nav-item"><a href="<?php echo SITEURL; ?>cart.php" class="nav-link"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
						<li class="nav-item"><a href="<?php echo SITEURL; ?>settings.php" class="nav-link"> Settings</a></li>
						<li class="nav-item"><a href="<?php echo SITEURL; ?>contact.php" class="nav-link">contact us</a></li>
						<li class="nav-item"><a href="<?php echo SITEURL; ?>logout.php" class="nav-link">logout</a></li>
						

					</ul>
				</div>

			</div>
		</nav>

	<!-- End Navigation --