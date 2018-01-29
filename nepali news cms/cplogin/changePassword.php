<div class="ptitle">Change Password</div>
<?php
if(isset($_GET['msg']) && $_GET['msg']!="")
	{
	echo "<div class='medium' align='center'><font color='red'>".$_GET['msg']."</font></div>";
	}
?>
<form name="changePassword" id="changePassword" action="./changepasswordcodes.php" method="post">
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #ccc;">
	<tr>
		<td width="15%">&nbsp;</td>
		<td width="27%">&nbsp;</td>
		<td width="58%">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="medium">Existing Password: </td>
		<td>
		  <input type="password" name="previous_password" id="previous_password" class="field" size="40" valiclass="required" req="5" valimessage="Enter your previous password of at least 5 characters.">
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="medium">New Password: </td>
		<td><input type="password" name="newpassword" id="newpassword" class="field" size="40" valiclass="required" req="5" valimessage="Enter new password of at least 5 characters"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td class="medium">Confirm New Password: </td>
		<td><input type="password" name="cpassword" id="cpassword" class="field" size="40" valiclass="cpass" valimessage="Match your confirm password with new password."></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
		  <input type="hidden" name="save" id="save">
		  <input type="button" name="savebtn" id="savebtn" value="Save" class="theader3" onClick="this.form.save.value='true'; call_validate_ajax(this.form,0,this.form.length);">
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="15%">&nbsp;</td>
		<td width="27%">&nbsp;</td>
		<td width="58%">&nbsp;</td>
	</tr>
</table>
</form>