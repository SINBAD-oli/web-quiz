<?php



		$con = mysqli_connect("sql2.njit.edu","mmd38","oXsWKSx7","mmd38");    
	//$con = mysqli_connect("sql2.njit.edu","mmd38","oXsWKSx7","usernames");

	
	$result = mysqli_query($con,"SELECT * FROM students WHERE id like '$id'");
	$row = mysqli_fetch_assoc($result);
	
	$studentlastname = $row['lastname'];
	$studentlastname = strtolower($studentlastname);
	
	mysqli_close($con);
	
?>