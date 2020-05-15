<?php 

	session_start();

	$con = mysqli_connect("localhost", "root", "", "webster"); // DB connection variable

	if (mysqli_connect_errno()) 
	{
		echo "Failed to connect: " . mysqli_connect_errno();
	}

	//Declaring variables for regised info
	$fname = ""; // First Name
	$lname = ""; // Last Name
	$em = ""; // Email
	$em2 = ""; // Confirm Email
	$password = ""; // Password
	$password2 = ""; // Password 2
	$date = ""; // Sign up date
	$error_arrray = ""; // Holds error messages

	if (isset($_POST['register_button'])) {
		
		// Registration Form Values Fix before updating to DB

		//First Name
		$fname = strip_tags($_POST['reg_fname']); // Remove html tags
		$fname = str_replace(' ', '', $fname); // Remove Spaces
		$fname = ucfirst(strtolower($fname)); // Uppercase first letter
		$_SESSION['reg_fname'] = $fname;

		//Last Name
		$lname = strip_tags($_POST['reg_lname']); 
		$lname = str_replace(' ', '', $lname); 
		$lname = ucfirst(strtolower($lname));
		$_SESSION['reg_lname'] = $lname;

		//Email
		$em = strip_tags($_POST['reg_email']);
		$em = str_replace(' ', '', $em);
		$em = ucfirst(strtolower($em));
		$_SESSION['reg_email'] = $em;

		//Email 2 
		$em2 = strip_tags($_POST['reg_email2']);
		$em2 = str_replace(' ', '', $em2);
		$em2 = ucfirst(strtolower($em2));
		$_SESSION['reg_email2'] = $em2;

		//Password
		$password = strip_tags($_POST['reg_password']);
		$password2 = strip_tags($_POST['reg_password2']);

		//Date -- get the current date
		$date = date("Y-m-d");

		if ($em == $em2) {                                               // Check if emial are same
			
			if (filter_var($em, FILTER_VALIDATE_EMAIL)) {                //Check if email is in valid form

				$em = filter_var($em, FILTER_VALIDATE_EMAIL);

				$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");   // Checking if email already exists
				$num_rows = mysqli_num_rows($e_check);
				if ($num_rows == True) {
					echo "Email already in use";
				}
		    }
			else {
				echo "Invalid format";
			}
		}
		else {
			echo "Emails don't match";
		}
	

//---------------------------------------------------------------------------------


		if(strlen($fname) > 25 || strlen($fname) < 2) {
			echo "Your First Name must be between 2 and 25 characters";
		}

		if(strlen($lname) > 25 || strlen($lname) < 2) {
			echo "Your Last Name must be between 2 and 25 characters";
		}		


//----------------------------------------------------------------------------------

		if($password != $password2) {
			echo "Your passwords do not match";
		}

		else {
			if(preg_match('/[^A-Za-z0-9]/', $password)) {
				echo "Your password can only contain english characters or numbers";
			}
		}

		if (strlen($password > 30) || strlen($password) < 5) {
			echo "Your password must be between 5 and 30 characters";
		}

	}




?>


<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Webster!</title>
</head>
<body>

	<form action="register.php" method="POST">                              <!-- basic form for  registeration -->
		<input type="text" name="reg_fname" placeholder="First Name" value="<?php 
			if(isset($_SESSION['reg_fname'])) {
				echo $_SESSION['reg_fname'];
			}

		?>" required>
		
		<br>

		<input type="text" name="reg_lname" placeholder="Last Name" value="<?php 
			if(isset($_SESSION['reg_lname'])) {
				echo $_SESSION['reg_lname'];
			}

		?>" required>
		
		<br>

		<input type="email" name="reg_email" placeholder="Email" value="<?php 
			if(isset($_SESSION['reg_email'])) {
				echo $_SESSION['reg_email'];
			}

		?>" required>
		
		<br>

		<input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php 
			if(isset($_SESSION['reg_email2'])) {
				echo $_SESSION['reg_email2'];
			}

		?>" required>
		
		<br>
		
		<input type="password" name="reg_password" placeholder="Password" required>
		<br>
		<input type="password" name="reg_password2" placeholder="Confirm Password" required>
		<br>
		<input type="submit" name="register_button" value="Register">

	</form>

</body>
</html>