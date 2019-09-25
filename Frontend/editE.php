<?php include "mid.php";?>
<?php include "insHead.php";?>

<script src="editE.js" type="text/Javascript"></script>
<div name="editExamTable" id="editExamTable">
	<h3><center>Create an Exam</center></h3>
	<center><label>Enter title of exam</label>
	<input type="text" name="eName" id="eName"></center><br>
	<div id="questions" style="margin:2px;">
	</div>
	<center>
		<input type="button" class="btn btn-lg btn-primary" value="Cancel" onclick="cancel();">
		<input type="button" value="Done" class="btn btn-lg btn-success" onclick="examAdd();">
	</center> 
</div>
<?php include "footer.php";?>