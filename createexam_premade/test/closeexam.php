<?php
//===================================================================================
	$array = array();
    $lastname="";
	$connection = mysqli_connect("sql2.njit.edu","mmd38","oXsWKSx7","mmd38");      
	#$connection = mysqli_connect("localhost","root","password","mmd38");      
    $response = file_get_contents('php://input');
    $array  = json_decode($response,true);                       #Get the response

	
    //$array[] = array("username"=>"prof1", "examname" => "Final");
    #$array = array("questionid" => 1);
	
	
	$queue = "SELECT * FROM tempexam";
	$result = mysqli_query($connection,$queue);
	$data = mysqli_fetch_assoc($result);
	
	$identification = $data['destination'];

	$queue = "DELETE FROM tempexam WHERE destination='$identification'";
	$result = mysqli_query($connection,$queue);
	
			
//================================================================================
//================================================================================
	
	$response = array("response"=>"");
	echo json_encode($response);
	
	    
?>
