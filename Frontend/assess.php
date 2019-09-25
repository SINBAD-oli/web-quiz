<?php include "mid.php"?>
<?php include "insHead.php";?>
<script src="assessIns.js"></script>

<style>
	textarea{
  width:500px;
		border:none;
	        }
</style>

<center><h3>Evaluate</h3></center>

<div align="right">
	<input type="button" value="Release Exam" class="btn btn-info" onclick="release();"/>
	<input type="button" value="End Exam" class="btn btn-danger" onclick="endexam();"/>	
</div>

<div id="ajaxDiv"></div>

<?php include "footer.php";?>