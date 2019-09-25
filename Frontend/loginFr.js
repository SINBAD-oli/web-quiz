function ajaxLoginFunction(){
var ajaxRequest;  // The variable that makes Ajax possible!
try{ajaxRequest = new XMLHttpRequest();} 
catch (e){try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} 
catch (e){try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} 
catch (e){alert("BROWSER ERROR!");
return false;
			}
		}
	}
// Create a function that will receive data sent from the server
ajaxRequest.onreadystatechange = function(){
if(ajaxRequest.readyState == 4){
  var ajaxDisplay = document.getElementById('ajaxDiv');
  var res=ajaxRequest.responseText; 
  var stu_page="stuFront.php";
  var inst_page="insFront.php";  
  var data=JSON.parse(res);
  
document.getElementById.("name").innerHTML = name;

  
document.getElementById('login:userid').value=data['userid'];
//pages placement for student and instructor
  if (data['authority']=="student") window.location.replace(stu_page);
    else if(data['authority']=="instructor") window.location.replace(inst_page);
    else ajaxDisplay.innerHTML = "<h3><center>Login Failed</center></h3>";
    
		}
	}
	var name = document.getElementById('login:username').value;
	var pass = document.getElementById('login:password').value;
	var myJSONObject = {"name": name,"pass":pass};
 
	ajaxRequest.open("POST", MID_PATH+"loginteacher.php", true); //midpathlogin.php 
	ajaxRequest.send(JSON.stringify(myJSONObject));
}