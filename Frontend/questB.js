var ajaxRequest;  //ajax
try{ajaxRequest = new XMLHttpRequest();} 
catch (e){try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} 
catch (e){try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} 
catch (e){alert("BROWSER ERROR!");}}}

ajaxRequest.onreadystatechange = function(){
	var question_list=document.getElementById("question_list");
	if(ajaxRequest.readyState == 4){
		var ajaxDisplay = document.getElementById('ajaxDiv');
		var res=ajaxRequest.responseText;
	//	alert(res);
		var data=JSON.parse(res);
		var len=data.length;
		for(var i=0;i<len;i++){
			var option=new Option(data[i]['name'],data[i]['id']);
			question_list.add(option,i+1);}}}
      
ajaxRequest.open("POST", MID_PATH+"#", true);
//file get contents, decode, function, CURLS
ajaxRequest.send(null); 
function viewQuestion(){
var ajaxRequest;  
//ajax req
try{ajaxRequest = new XMLHttpRequest();} 
catch (e){try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} 
catch (e){try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} 
catch (e){alert("BROWSER ERROR!");
			}
		}
	}
ajaxRequest.onreadystatechange = function(){
var question_list=document.getElementById("question_list");
if(ajaxRequest.readyState == 4){
  var ajaxDisplay = document.getElementById('ajaxDiv');
  var res=ajaxRequest.responseText;
  var data=JSON.parse(res);
			document.getElementById("qID").value=data[0]['id'];
			document.getElementById("qDescript").value=data[0]['description'];


			document.getElementById("qName").value=data[0]['name'];
			document.getElementById("qCategory").value=data[0]['category'];
			document.getElementById("qLevel").value=data[0]['level'];
		}
	}
	var id=document.getElementById("question_list").value;
	var myJSON={"id":id};
	ajaxRequest.open("POST", MID_PATH+"#", true);
 //file get contents, decode, function, CURLS
	ajaxRequest.send(JSON.stringify(myJSON));
}
function newQuestion(){
	document.getElementById("qID").value='';
	document.getElementById("qDescript").value='';


	document.getElementById("qName").value='';
	document.getElementById("qCategory").value='';
	document.getElementById("qLevel").value='';
}
function addQuestion(){
var ajaxRequest; 
try{ajaxRequest = new XMLHttpRequest();} 
catch (e){try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} 
catch (e){try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} 
catch (e){alert("BROWSER ERROR!");
			}
		}
	}
	ajaxRequest.onreadystatechange = function(){
		var question_list=document.getElementById("question_list");
		if(ajaxRequest.readyState == 4){
			var ajaxDisplay = document.getElementById('ajaxDiv');
			var res=ajaxRequest.responseText;
	//		alert(res);
		}
	}
	var id=document.getElementById("qID").value;
	var description=document.getElementById("qDescript").value;
	var name=document.getElementById("qName").value;
	var level=document.getElementById("qLevel").value;
	var category=document.getElementById("qCategory").value;

	if(name=='' || level==''){
	//	alert("qName and dLevels");
	}
	else{
		var myJSONObject={"id":id,"name":name,"description":description,"level":level,"category":category};
		ajaxRequest.open("POST", MID_PATH+"#", true);
   //file get contents, decode, function, CURLS
		ajaxRequest.send(JSON.stringify(myJSONObject));
	}
}
