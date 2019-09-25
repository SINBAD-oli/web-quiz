<?php
#Receive selected exam and display grade
	$array = array();
	
	//$connection = mysqli_connect("localhost","root","password","mmd38");
	$connection = mysqli_connect("sql2.njit.edu","mmd38","oXsWKSx7","mmd38");   
	$response = file_get_contents('php://input');
   	$array  = json_decode($response,true);        
	
	#$array=array("username" =>"mmd38", "examid" => 1, "examname" => "Midterm", "professor" => "ryan");
	
	$username 	= $array['username'];
	$examid 		= $array['examid'];
	$examname = $array['examname'];
	$professor	=	$array['professor'];
	
	$transarray=array("username"=>$username);
	extract($transarray);
	require 'getstudentlastname.php';
	
	$identification = "s{$studentid}_{$studentlastname}";
	$queue = "SELECT * FROM $identification WHERE ID='$examid'";
	
	$result = mysqli_query($connection,$queue);
	$row	= mysqli_fetch_assoc($result);
	
	$grade = $row['grade'];
	
	$sendarray = array ("grade" => $grade);
	
	echo json_encode($sendarray);
	
	
	mysqli_close($connection);
	
?>