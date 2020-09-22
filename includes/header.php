 <?php

  require 'config/config.php';

//check if in session and then get user data for the defiened user name

  if(isset($_SESSION['username'])) {                    
    $userLoggedIn = $_SESSION['username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
    $user = mysqli_fetch_array($user_details_query);
 
  }

  else {
    header("Location: register.php");
  }


?> 


<html>
<head>

	<title>Welcome to Webster!</title>

	<!-- Javascript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	
	<!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>

	<div class="top_bar">
		<div class="logo">
			<a href="index.php">Webster!</a>
		</div>

		<nav>
			<a href="#">
				<?php echo $user['first_name']; ?>
			</a>
			<a href="#">
				<i class="fa fa-home fa-lg"></i>
			</a>
			<a href="#">
				<i class="fa fa-envelope fa-lg"></i>
			</a>
			<a href="#">
				<i class="fa fa-bell fa-lg"></i>
			</a>
			<a href="#">
				<i class="fa fa-user fa-lg"></i>
			</a>	
			<a href="#">
				<i class="fa fa-cog fa-lg"></i>
			</a>			
		</nav>


	</div>


