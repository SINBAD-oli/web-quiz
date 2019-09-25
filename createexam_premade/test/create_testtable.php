<?php
/*CREATE A EXAM 
===================================================================================

e1_final_ryan
+------+----------------------+------------------+-----------------+
| ID    | question              | cases              | answers        |
+------+----------------------+------------------+-----------------+
|    1   | Make a function   | cases|cases   | this answer   |
|    2   | Make a function2 | cases|cases2 | this answer2 |
+------+----------------------+------------------+-----------------+                  


t1_ryan      
+------+--------------+---------------+------------+
| ID    | examname | releasable  | students |
+------+--------------+---------------+------------+
|    1   | Final           | yes             | |1|2|       |
+------+---------------+--------------+------------+                          


premade
+----+------------+--------+------------+-------------+
| ID  | question | cases | difficulty  | createdby |
+----+------------+--------+------------+-------------+
|  1  | sample    | x+y    | easy        | ryan         |
+----+------------+--------+------------+-------------+
===================================================================================
INPUT NEED USERNAME IN ARRAY INDEX 0 0
SELECT EXAMS AFTER 0 0
ARRAY |  0  |  1  |  2  |

Script that receives the exam name and username
	
*/
//===================================================================================
	  $array = array();
    $lastname="";
	//$connection = mysqli_connect("sql2.njit.edu","mmd38","oXsWKSx7","mmd38");      
    $connection = mysqli_connect("localhost","root","password","mmd38");
	$response = file_get_contents('php://input');
    $array  = json_decode($response,true);                       #Get the response

	
    $array = array("username"=>"prof1", "examname" => "test");
    #$array[] = array("questionid" => 1);
//===================================================================================


	$stringdata=$array['username'];
	$examname=$array['examname'];
#==================================================================================	
#Get the teacher's last name based on his username

	$transarray=array("username"=>$stringdata);
	extract($transarray);
	require 'getteacherlastname.php';
 
#==================================================================================	
  #How many exams did the professor already make	 
  
	$result = mysqli_query($connection,"SELECT max(ID) FROM t{$id}_{$lastname}");
	$row= mysqli_fetch_assoc($result);
	$idmax=$row['max(ID)'];

#==================================================================================	
#Make a list of all students in the students username table 

	require 'getlistofstudents.php';
 
#==================================================================================				
 
 	if(!$idmax){ //No previous exams start with 1
 
//===========CREATE ENTRY IN TEACHER's TABLE======================================
#Make an entry in the teacher's table of the created exam

			$idmax=1;
			$identification1="t{$id}_{$lastname}";
			$queue = "INSERT INTO $identification1 (ID,examname,releasable,students) VALUES
			('1','$examname','yes','$string')";
			$result = mysqli_query($connection,$queue);

#==================================================================================
#Send the exam entry to the student's exam
			require 'sendexam.php';
			
//==============CREATE EXAM TABLE 1============================================
			$identification = "e1_{$examname}_{$lastname}";
			
			$queue = "CREATE TABLE $identification(
			ID INT(50),
			question VARCHAR(250),
			cases VARCHAR(600),
			answers VARCHAR(500)
			)";
			
			$result = mysqli_query($connection,$queue);
			
			$queue2="INSERT INTO tempexam (destination) VALUES('$identification')";
			$result2=mysqli_query($connection,$queue2);
			//$arraysize= count($array);
	}
//================INSERT QUESTIONS============================================
/*			for($i = 1; $i<$arraysize; $i++){ //For every question

				$questionid = $array[$i]['questionid'];
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
			
			}
		}*/
//================================================================================
//================================================================================
		else{#Professor already made an exam before

//===========CREATE ENTRY IN TEACHER's TABLE======================================

			$idmax=$idmax+1;
			$identification1="t{$id}_{$lastname}";
			$queue = "INSERT INTO $identification1 (ID,examname,releasable,students) VALUES
			('$idmax','$examname','yes','$string')";
      
			$result = mysqli_query($connection,$queue);
			
											#e1_final_ryan
			$identification = "e{$idmax}_{$examname}_{$lastname}";
//================================================================================
			require 'sendexam.php';
//==============CREATE EXAM TABLE 1===============================================

			$queue = "CREATE TABLE $identification(
			ID INT(50),
			question VARCHAR(250),
			cases VARCHAR(600),
			answers VARCHAR(500)
			)";
			
			$result = mysqli_query($connection,$queue);	
			
			$queue2="INSERT INTO tempexam (destination) VALUES('$identification')";
			$result2=mysqli_query($connection,$queue2);
			
//================INSERT QUESTIONS============================================
/*
      $arraysize= count($array);
			for($i = 1; $i<$arraysize; $i++){ //For every question
			  
				$questionid = $array[$i]['questionid'];
        
				//Retrieve questions from premade table
				$queue = "SELECT * FROM premade WHERE ID='$questionid'";
				$result = mysqli_query($connection,$queue);
				
				$row = mysqli_fetch_assoc($result);
				$question = $row['question'];
				$answer = $row['answer'];
				$cases = $row['cases'];
        
				$queue ="INSERT INTO $identification (ID, question, cases, answers) VALUES
				('$i','$question','$cases','$answer')";
				
				$result = mysqli_query($connection,$queue);
				
			}
		}

*/		
//	$response = array("response"=>"created");
//	echo json_encode($response);
	
	    }
?>
