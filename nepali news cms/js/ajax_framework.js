/* ---------------------------- */
/* XMLHTTPRequest Enable */
/* ---------------------------- */
function createObject() {
var request_type;
var browser = navigator.appName;
if(browser == "Microsoft Internet Explorer"){
request_type = new ActiveXObject("Microsoft.XMLHTTP");
}else{
request_type = new XMLHttpRequest();
}
return request_type;
}

var http = createObject();

function insert(){
	document.getElementById('insert_response').innerHTML = "Just a second..."
	var article_id=document.getElementById('id').value;
	var type=document.getElementById('page').value;
	var name=document.getElementById('name').value;
	var email=document.getElementById('email').value;
	var address=document.getElementById('address').value;
	var tcomment=document.getElementById('tcomment').value;	

	if(name==""){
		document.getElementById('insert_response').innerHTML='Name: This field is required field';
		document.getElementById('name').style.backgroundColor='red';
	}
	else if(email==""){
		document.getElementById('insert_response').innerHTML='Email: This field is required field';	
		document.getElementById("email").style.backgroundColor='red';
	}
	else if(address==""){
		document.getElementById('insert_response').innerHTML='Address: This field is required field';	
		document.getElementById("address").style.backgroundColor='red';
	}
	else if(tcomment==""){
		document.getElementById('insert_response').innerHTML='Comment: This field is required field';	
		document.getElementById("tcomment").style.backgroundColor='red';
	}	
	else{	
	
	var url = "commentcode.php?article_id="+article_id+"&type="+type+"&name="+name+"&email="+email+"&address="+address+"&tcomment="+tcomment;
	var params = "article_id="+article_id+"&type="+type+"&name="+name+"&email="+email+"&address="+address+"&tcomment="+tcomment;
	
				http.open("POST", url, true);
				http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				http.setRequestHeader("Content-length", params.length);
				http.setRequestHeader("Connection", "close");
				http.send(params);
				http.onreadystatechange=function()
				{
					 if (http.readyState==4 && http.status == 200)
							{ 	
								var response = http.responseText;
								//document.getElementById('insert_response').innerHTML = 'user Added:'+response;
								document.getElementById('insert_response').innerHTML = response;
							}
				};
	}
}