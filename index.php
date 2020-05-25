<?php 
	$con = mysqli_connect("localhost", "root", "", "TEST_CASE");

	if (mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
	}

	$query = mysqli_query($con, "INSERT INTO test1 VALUES(NULL, 'GAUTAM')");
	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
Hello Reece !!!
</body>
</html>