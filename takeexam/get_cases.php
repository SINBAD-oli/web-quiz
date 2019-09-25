<?php
/*Get cases
===================================================================================

*/
#==============================================================================
	$array = array();
	$sendarray = array();
	
	//$connection = mysqli_connect("localhost","root","password","mmd38");        
	$connection = mysqli_connect("sql2.njit.edu","mmd38","oXsWKSx7","mmd38");    
	$response = file_get_contents('php://input');
    $array  = json_decode($response,true);                       #Get the response
#==============================================================================
	$array = array("username"=>"prof1", "examid" => "1", "examname" => "Final", "professor" => "ryan");
	
 
	$lastname = $array['professor'];	
	$username=$array['username'];
	$examname=$array['examname'];
	$examid =	$array['examid'];
	
	$transarray=array("username"=>$username);
	extract($transarray);
	require 'getteacherlastname.php';
	
	
	$identification = "e{$examid}_{$examname}_{$lastname}";
	
	$queue="SELECT * FROM $identification";
	
	$result=mysqli_query($connection,$queue);
	
	while($row=mysqli_fetch_assoc($result)){
		$questionid = $row['ID'];
		$case			= $row['cases'];
		$solution		= $row['answers'];		
		
		$sendarray[] = array("questionid" => $questionid, "cases" => $case, "answers" => $solution);
	}
	
	echo json_encode($sendarray);
	
	
	mysqli_close($connection);
	
	    
?>
