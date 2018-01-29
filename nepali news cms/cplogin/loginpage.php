<?php
session_start();
require_once "../includes/db_connection.php";


if(isset($_POST['login']) && $_POST['login']=="true")
{
	$vo = new AdminsVO();
	$dao = new AdminsDAO();
	$vo->login = $_POST['user'];
	$vo->password = md5($_POST['password']);
	if($id = $dao->authenticate($vo))
	 {
		$_SESSION['admin'] = $_POST['user'];
		$_SESSION['auth'] = "true";
		$_SESSION['admin_id']=$id;
		$_SESSION['logintime']=date("Y-m-d H:i:s");
		
		$lastlogin = $dao->getLastLogin($id);
		$_SESSION['lastlogin'] = $lastlogin;
		header("location:index.php");
	 }
	else
		$err_msg="'Login/Password pair did not match. Try again!'";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>admin login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="style/global-style.css" rel="stylesheet" type="text/css" />
<link href="style/styles.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="../includes/functions.js"></script>
</head>
<body style="background:#f9f9f9; margin:125px 60px;">
<table width="318" border="0" cellpadding="3" cellspacing="1" align="center" class="dataListing" bgcolor="#ffffff">
	<tr>
		<td width="308">
		<form action="" method="post" name="loginFrm" id="loginFrm">
		  <table width="129%" height="186" cellpadding="3" cellspacing="0" >
<tr bgcolor="#999999" >
            	<td><img src="images/safety_lock.jpg" alt="logo" width="152" height="120"></td>
		    <td colspan="2" align="center" ><h3 ><font color="#f9f9f9">okaytimes.com  Administrator Login</font></h3></td>
              
		    </tr>
			
			<tr class="whiteTd">
			  <td width="31%" class="medium">Login:</td>
			  <td width="69%"><input name="user" type="text" class="field" id="user" size="25" valiclass="required" req="5" valimessage="Login name is empty!" value="<?php echo $_POST['user'];?>"></td>
			</tr>
			<tr class="whiteTd">
			  <td class="medium">Password:</td>
			  <td><input name="password" type="password" class="field" id="password" size="25" valiclass="required" req="5" valimessage="Password should not be empty and should be of atleast 5 chars!" ></td>
			</tr>
			<tr class="whiteTd">
			  <td>&nbsp;</td>
			  <td>
			  <input type="hidden" name="login" id="login">
			  <input name="login_but" type="button" class="theader3" id="login_but" value="Login" onClick="this.form.login.value='true'; call_validate(this.form,0,this.form.length);">			  </td>
			</tr>
		  </table>
		</form>
	  </td>
	</tr>
</table> 
<div align="center"><br/><b><?php echo "<font color='#cc0000'>".$err_msg."</font>";?></b></div>
</body>
</html>
