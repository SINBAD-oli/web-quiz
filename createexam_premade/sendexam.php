<?php
	$array = array();
	//$connection = mysqli_connect("sql2.njit.edu","mmd38","oXsWKSx7","mmd38");    
		$connection = mysqli_connect("localhost","root","password","mmd38");      
  //$response = file_get_contents('php://input');
  //$array  = json_decode($response,true);                       #Get the response

	$queue="SELECT * FROM students";
	$result=mysqli_query($connection,$queue);
	$numofrows=mysqli_num_rows($result);
	
	while($row=mysqli_fetch_assoc($result)){
		
		$studentid = $row['id'];
		$studentlastname=$row['lastname'];
		$studentlastname=strtolower($studentlastname);
		$identification2 = "s{$studentid}_{$studentlastname}";
		//echo $studentlastname;
		$queue3="INSERT INTO $identification2 (ID,examname,professor,grade,submitted,available) VALUES ('$idmax','$examname','$lastname','0','no','no')";
	  //echo $queue3;	
   
		$result3 = mysqli_query($connection,$queue3);
		
	}    
?>