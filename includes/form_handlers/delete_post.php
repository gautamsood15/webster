<?php 
require '../../config/config.php';
	
	
	if (isset($_SESSION['username'])) {
	
	$userLoggedIn = $_SESSION['username'];
	$num_posts = $_SESSION['num_posts'];

	}

	if(isset($_GET['post_id']))
		$post_id = $_GET['post_id'];

	if(isset($_POST['result'])) {
		if($_POST['result'] == 'true')
			$query = mysqli_query($con, "UPDATE posts SET deleted='yes' WHERE id='$post_id'");
			$user_details_query = mysqli_query($con, "UPDATE users SET num_posts=num_posts - 1 WHERE username='$userLoggedIn'");
	}

?>