 <?php

  require 'config/config.php';
 
  if(isset($_SESSION['username'])) {
    $userLoggedIn = $_SESSION['username'];
  }
 /* else {
    header("Location: register.php");
  }
*/

?> 


<html>
<head>
	<title>Welcome to Webster!</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
</head>
<body>

