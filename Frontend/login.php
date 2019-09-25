<?php include "mid.php";?>

<head>
	<meta charset="utf-8">
 
	<link href="login.css" rel="stylesheet">
	<script src="loginFr.js" type="text/JavaScript"></script>
 
</head>
<body>
<div id="login_div">
	<form  method="post" id="login" name="login"  class="form-login" >
		<h1>Login</h1>
		<p>Login with your credentials.</p>
<div class="dialog">
<table>
<tbody>
  <tr class="field">
    <td><input type="hidden" id="login:userid" name="login:userid"></td>
    <td><input type="hidden" id="login:authority" name="login:authority"></td></tr>
    <tr class="field">
    <td class="name"><label for="login:username">Username:</label></td>
    <td class="value"><input id="login:username" type="text" name="login:username" class="form-login" size="30" placeholder="Username" required autofocus></td></tr>
    
  <tr class="field">
    <td class="name"><label for="login:password">Password:</label></td>
    <td class="value"><input id="login:password" type="password" name="login:password" class="form-login" size="30" placeholder="Password"></td></tr>
    
  <tr>
    <td></td>
    <td><div class="button" style="margin: 1em 1em">
    <input class="form-control" type="button" onclick="ajaxLoginFunction();" value="Login">
    </div></td></tr>
    
</tbody>
</table>
</div>
</form>
</div>

<div id="ajaxDiv"></div>