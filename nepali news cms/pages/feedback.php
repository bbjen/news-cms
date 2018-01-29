<script language="javascript">
<!--
function reset() {
	document.tellafriend.name.value="";
	document.tellafriend.email.value="";
	document.tellafriend.address.value="";
	document.tellafriend.fmail1.value="";
	document.tellafriend.fmail2.value="";
	document.tellafriend.fmail3.value="";
}

function validate() {	
	var emailID=document.tellafriend.email;
	if (document.tellafriend.name.value.length==0) {
		alert("Please enter your name");
		document.tellafriend.name.focus()
		return false;
	}
	if (document.tellafriend.email.value.length==0) {
		alert("Please enter your email address");
		document.tellafriend.email.focus()
		return false;
	}
	if (document.tellafriend.address.value.length==0) {
		alert("Please enter your address");
		document.tellafriend.address.focus()
		return false;
	}
	if (document.tellafriend.fmail1.value.length==0) {
		alert("Please enter your feedback");
		document.tellafriend.fmail1.focus()
		return false;
	}
	if (echeck(emailID.value)==false){
		emailID.value=""
		emailID.focus()
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
<div class="aj" style="height:5px;"></div>
<body onLoad="reset()" topmargin="0" leftmargin="0"> 
<p> 
<center>
</center>
<table width="95%" cellpadding="0" cellspacing="0" align="center" style="margin:10px 10px 10px 10px;">
	<tr valign="top">
	  <td valign="middle"><h2>सल्लाह सुझाब</h2></td>
  </tr>
	<tr valign="top">
		<td valign="middle" align="center">तपाईँको सल्लाह/सुझाव एवं प्रतिक्रिया यहाँ लेखेर पठाउनु होला ।<br>
		  <form name="tellafriend" action="feedbackAction.php" method="post" onSubmit="return checkfields()">
		  &nbsp;
		<div align="center">
		<center>
		<table border="0" cellpadding="3" cellspacing="0">
            <tr>
                <td>पूरा नाम:</td>
                <td><input size="30" name="name" maxlength="45">
                *</td>
            </tr>
            <tr>
                <td>ईमेल ठेगाना:</td>
                <td><input size="30" name="email" maxlength="45">
                *</td>
            </tr>
            <tr>
              <td height="29">ठेगाना:</td>
              <td><input size="30" name="address" maxlength="45">*</td>
            </tr>
            <tr>
                <td height="29">प्रतिकृया :</td>
                <td><label>
                  <textarea name="fmail1" id="fmail1" cols="45" rows="5"></textarea>
                </label>                
                  *
                </td>
            </tr>
			<tr>
				<td colspan="2"><em>कृपया ध्यान राख्न्नु होला,* चिन्ह भएको   विवरण अनिवार्य रूपमा भर्नुहोला ।</em></td>
			  </tr>
			<tr>
                <td colspan="2"><p align="center"> <br>
                    <input onClick="validate();" type="button" value="click once to send">                   
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