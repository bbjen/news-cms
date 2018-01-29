<html>
<head>
<title>Recommendation form</title>
<script language="javascript">
<!--
function reset() {
	document.tellafriend.name.value="";
	document.tellafriend.email.value="";
	document.tellafriend.fmail1.value="";
	document.tellafriend.fmail2.value="";
	document.tellafriend.fmail3.value="";
}

function validate() {	
	var emailID=document.tellafriend.email;
	var emailID1=document.tellafriend.fmail1;
	if (document.tellafriend.name.value.length==0) {
		alert("Oops! you forgot to enter your name");
		document.tellafriend.name.focus()
		return false;
	}
	if (document.tellafriend.email.value.length==0) {
		alert("Oops! you forget to enter your email address");
		document.tellafriend.email.focus()
		return false;
	}
	if (document.tellafriend.fmail1.value.length==0) {
		alert("Oops! you'll need to enter a friend's email address");
		document.tellafriend.fmail1.focus()
		return false;
	}
	if (echeck(emailID.value)==false){
		emailID.value=""
		emailID.focus()
		return false
	}
	if (echeck(emailID1.value)==false){
		emailI1.value=""
		emailID1.focus()
		return false
	}
	
		
	document.tellafriend.submit()
	return true;
}
function echeck(str) {

		var at="@"
		var dot="."
		var lat=str.indexOf(at)
		var lstr=str.length
		var ldot=str.indexOf(dot)
		if (str.indexOf(at)==-1){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
		   alert("Invalid E-mail ID")
		   return false
		}

		if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		    alert("Invalid E-mail ID")
		    return false
		}

		 if (str.indexOf(at,(lat+1))!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		    alert("Invalid E-mail ID")
		    return false
		 }

		 if (str.indexOf(dot,(lat+2))==-1){
		    alert("Invalid E-mail ID")
		    return false
		 }
		
		 if (str.indexOf(" ")!=-1){
		    alert("Invalid E-mail ID")
		    return false
		 }

 		 return true					
	}



//-->
</script>

<style type="text/css">
td{
	font-family:Verdana, Geneva, sans-serif;
	font-size:12px;
}

	
</style>
</head>
<body onLoad="reset()" topmargin="0" leftmargin="0"> 
<p> 
<center>
</center>
<table width="450" cellpadding="0" cellspacing="0" align="center" style="border:1px solid #09C; margin:10px 10px 10px 10px;">
	<tr valign="top">
		<td valign="middle" align="center">&nbsp;Complete the details below to send a link to the page:<br>
			<? $refurl = $_SERVER['HTTP_REFERER']; ?>
			<? print $refurl;?>
		<form name="tellafriend" action="tellafriend.php" method="post" onSubmit="return checkfields()">&nbsp;
		<div align="center">
		<center>
		<table border="0" cellpadding="3" cellspacing="0">
            <tr>
                <td> Your Name:</td>
                <td><input size="30" name="name" maxlength="45">
                *</td>
            </tr>
            <tr>
                <td>Your Email:</td>
                <td><input size="30" name="email" maxlength="45">
                *</td>
            </tr>
            <tr>
                <td colspan="2"><p align="center">Enter your friend's email addresses:</td>
            </tr>
            <tr>
                <td>Email 1:</td>
                <td><input size="30" name="fmail1" maxlength="50">
                *
                </td>
            </tr>
            <tr>
                <td>Email 2:</td>
                <td><input size="30" name="fmail2" maxlength="50"></td>
			</tr>
			<tr>
				<td>Email 3:</td>
				<td><input size="30" name="fmail3" maxlength="50"></td>
			</tr>
			<tr>
                <td colspan="2"><p align="center"> <br>
                    <input onClick="validate();" type="button" value="click once to send">
                    <input type=hidden name=refurl value="<? print $refurl;?>">         
                </td>
			</tr>
		</table>
		</center>
	</div>
	</form>
	</td>
</tr>
<tr valign="top">
	<td valign="middle" align="center">&nbsp;</td>
</tr>
</table>
</body>
</html>