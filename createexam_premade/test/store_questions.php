<?php
//===================================================================================
	$array = array();
    $lastname="";
	$connection = mysqli_connect("sql2.njit.edu","mmd38","oXsWKSx7","mmd38");      
	//$connection = mysqli_connect("localhost","root","password","mmd38");      
    $response = file_get_contents('php://input');
    $array  = json_decode($response,true);                       #Get the response

	
    //$array[] = array("username"=>"prof1", "examname" => "Final");
    #$array = array("questionid" => 1);
	
	
	$queue = "SELECT * FROM tempexam";
	$result = mysqli_query($connection,$queue);
	$data = mysqli_fetch_assoc($result);
	
	$identification = $data['destination'];


	$questionid = $array['questionid'];
	//Retrieve questions from premade table
	$queue = "SELECT * FROM premade WHERE ID='$questionid'";
	$result = mysqli_query($connection,$queue);
				
	$row = mysqli_fetch_assoc($result);
	$question   = $row['question'];
	$answer     = $row['answer'];
	$cases      = $row['cases'];
		
	$queue ="INSERT INTO $identification (ID, question, cases, answers) VALUES
	('$questionid','$question','$cases','$answer')";
				
	$result = mysqli_query($connection,$queue);
	
			
//================================================================================
//================================================================================
?>
