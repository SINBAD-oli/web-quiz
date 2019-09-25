<?php
#Get everything in premade table
	$array = array();
	$connection = mysqli_connect("sql2.njit.edu","mmd38","oXsWKSx7","mmd38");    
  //$response = file_get_contents('php://input');
  //$array  = json_decode($response,true);                       #Get the response

	$queue="SELECT * FROM premade";
	$result=mysqli_query($connection,$queue);
	$numofrows=mysqli_num_rows($result);
	
	while($row=mysqli_fetch_assoc($result)){
		$questionid = $row['ID'];
		$question = $row['question'];
		$answer = $row['answer'];
		$cases = $row['cases'];
		$difficulty = $row['difficulty'];
		$author= $row['createdby'];
		
		$array[]=array("questionid"=>$questionid,"question"=>$question,"answer"=>$answer,"cases"=>$cases,"difficulty"=>$difficulty,"createdby"=>$author);
		
	}
	   mysqli_close($connection);
	  echo json_encode($array);
	 
?>
