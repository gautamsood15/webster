<?php

//Declaring variables for regised info
	$fname = ""; // First Name
	$lname = ""; // Last Name
	$em = ""; // Email
	$em2 = ""; // Confirm Email
	$password = ""; // Password
	$password2 = ""; // Password 2
	$date = ""; // Sign up date
	$error_array = array(); // Holds error messages

//--------------------------Getting data from register Form ---------------------------------------------


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


//------------------Checking for email errors ---------------------------------------------------------		

		if ($em == $em2) {                                               // Check if emial are same
			
			if (filter_var($em, FILTER_VALIDATE_EMAIL)) {                //Check if email is in valid form

				$em = filter_var($em, FILTER_VALIDATE_EMAIL);

				$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");   // Checking if email already exists
				$num_rows = mysqli_num_rows($e_check);
				if ($num_rows == True) {
					array_push($error_array, "Email already in use<br>");
				}
		    }
			else {
			
				array_push($error_array, "Invalid email format<br>");
			}
		}
		else {
		
			array_push($error_array, "Emails don't match<br>");
		}
	

//--------------------------------Check for first  and last name errors---------------------------------


		if(strlen($fname) > 25 || strlen($fname) < 2) {
	
			array_push($error_array, "Your First Name must be between 2 and 25 characters<br>");
		}

		if(strlen($lname) > 25 || strlen($lname) < 2) {
		
			array_push($error_array, "Your Last Name must be between 2 and 25 characters<br>");
		}		


//--------------------------------Checks for password errors-------------------------------------------

		if($password != $password2) {
			array_push($error_array, "Your passwords do not match<br>");
		}

		else {

			if(preg_match('/[^A-Za-z0-9]/', $password)) {
			
				array_push($error_array, "Your password can only contain english characters or numbers<br>");
			}
		}

		if (strlen($password > 30) || strlen($password) < 5) {
		
			array_push($error_array, "Your password must be between 5 and 30 characters<br>");
		}

//-----------------------------setting password and username adjustments----------------------------------

		if (empty($error_array)) {
			$password = md5($password);      // Encrypt password before sending to DB
			$username = strtolower($fname . "_" . $lname);  // Generate username 
			$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");

			$i = 0;
			while (mysqli_num_rows($check_username_query) != 0) {    //if username exist then add number to username
				$i++;
				$username = $username . "_" . $i;
				$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
				
			}


//-----------------------------------------Profile Picture Assignment-------------------------------------


			$rand = rand(1, 2);  // select between 1 and 2 randomly

			if ($rand == 1) 
				$profile_pic = "/assets/images/profile_pic/defaults/profile_pic_1.png";  
			else if($rand == 2)
				$profile_pic = "/assets/images/profile_pic/defaults/profile_pic_2.png";



//-------------------------------Insert Data to DB  -------------------------------------------------

			$query = mysqli_query($con, "INSERT INTO users VALUES (NULL, '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");

			array_push($error_array, "<span style='color: #14C800;'>You're all set! Go ahead and Login</span>");

//---------------------------Clear Session variables ---------------------------------------------------

			$_SESSION['reg_fname'] = "";
			$_SESSION['reg_lname'] = "";
			$_SESSION['reg_email'] = "";
			$_SESSION['reg_email2'] = "";

		}
	}

?>