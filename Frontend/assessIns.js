var L;
var NAME=[];
try{ajaxRequest = new XMLHttpRequest();} 
catch (e){try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} 
catch (e){try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");} 
catch (e){alert("BROWSWER ERROR");}
	}
}
ajaxRequest.onreadystatechange = function(){
	if(ajaxRequest.readyState == 4){
		var ajaxDisplay = document.getElementById('ajaxDiv');
		var res=ajaxRequest.responseText;
		var data=JSON.parse(res);
		var html="<div class='row'>";
		html+="<div class='col-md-12'>";
		html+="<table class='table table-striped' style='margin:2px;'>";
		html+="<thead  style='background-color:#D3D3D3;'><tr><td>Student</td>";
		html+="<td>Problem</td>";
		html+="<td>Code</td>";
		html+="<td>Output</td>";
		html+="<td>Sample<br>Output</td>";
		html+="<td>Problem<br>Weight</td>";
		html+="<td>Assest</td>";
		html+="</thead></tr>";
		html+="<tbody>";
		var len=data.length;
		L=len;
		for(var i=0;i<len;i++){
			NAME.push(data[i]['id']);
			html+='<tr><td>'+data[i]['stdId']+'</td>';
			html+='<td>'+data[i]['quesId']+'</td>';
			html+='<td><textarea disabled>'+data[i]['code']+'</textarea></td>';
			html+='<td>'+data[i]['output']+'</td>';
			html+='<td>'+data[i]['sample']+'</td>';
			html+='<td>'+data[i]['point']+'</td>';
			html+='<td><input type="text" value="'+data[i]['assest']+'"'+'id="'+data[i]['id']+'" placeholder="score" style="border:none;">'+'</input></td>';
			html+='</tr>';
		}
		html+="</tbody></table>";
		html+='</div></div>';
		ajaxDisplay.innerHTML=html;
	}
}
ajaxRequest.open("POST", MID_PATH+"#", true); //asset instuc MID PAGE
//file get contents, decode, function, CURLS
ajaxRequest.send(null);

function release(){var ajaxRequest;  //BROWSWERS
try{ajaxRequest = new XMLHttpRequest();} 
catch (e){try{ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");} 
catch (e){try{ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");}
catch (e){
//ERROR
alert("BROWSER ERROR");
			}
		}
	}
ajaxRequest.onreadystatechange = function(){
if(ajaxRequest.readyState == 4){
  var ajaxDisplay = document.getElementById('ajaxDiv');
  var res=ajaxRequest.responseText;
			alert(res);
		}
	}
var assest=[];
	for(var i=0;i<L;i++){
		var id=NAME[i];
		var ass=document.getElementById(id).value;
		var a={'id':id,'assest':ass};
		assest.push(a);
	}
	ajaxRequest.open("POST", MID_PATH+"#", true); //php release from midddle
 //file get contents, decode, function, CURLS
	ajaxRequest.send(JSON.stringify(assest));
}