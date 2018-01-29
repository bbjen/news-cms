<?php
	$adminvo = new AdminsVO();
	if(isset($_GET['eAid']) && intval($_GET['eAid'])!=0)
		{
		$admindao = new AdminsDAO();
		$id = intval($_GET['eAid']);
		$adminvo = $admindao->fetchDetails($id);
		}
?>

<div class="ptitle">Add/Edit AdminUsers: </div>
<form name="addEditAdminusers" id="addEditAdminusers" action="./admincodes.php" method="post">
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #ccc;">
	<tr>
		<td>
		
			<table width="100%" border="0" cellspacing="2">
			  
			  <tr>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
		      </tr>
			  <tr>
				<td width="11%">&nbsp;</td>
				<td width="25%" class="medium">Login Name  : </td>
				<td width="64%">
				  <input type="text" name="login" id="login" value="<?php echo $adminvo->login;?>" valiclass="required" req="5"  valimessage="Enter login name of at least 5 characters." class="field" size="40">						</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td class="medium">Password: </td>
			    <td><input type="text" name="password" id="password" <?php if($adminvo->id==0) echo ' valiclass="required" req="5"  valimessage="Enter password of at least 5 characters."';?> class="field" size="40"></td>
		      </tr>
			   <tr>
			     <td>&nbsp;</td>
			     <td class="medium">Email Address: </td>
			     <td><input type="text" name="email" id="email" value="<?php echo $adminvo->email;?>" valiclass="email"  valimessage="Enter valid email address." class="field" size="40"></td>
		      </tr>
			   <tr>
			     <td>&nbsp;</td>
			     <td class="medium">Status:</td>
			     <td>
				 <select name="status" class="field" id="status">
                   <option value="active" <?php if($adminvo->status=='active') echo "selected";?>>Active</option>
                   <option value="passive"  <?php if($adminvo->status=='passive') echo "selected";?>>Passive</option>
                 </select>
				 </td>
		      </tr>
			   <tr>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
			    <td>&nbsp;</td>
		      </tr>
			</table>

		</td>
	</tr>
</table><br/>
<div align="left">
	<a href="index.php?p=adminuser" class="theader3">&nbsp;&nbsp;Back&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="hidden" name="save" id="save">
	<input type="hidden" name="oldPassword" id="oldPassword" value="<?php echo $adminvo->password;?>">
	<input type="hidden" name="id" id="id" value="<?php echo $adminvo->id;?>">
	<input type="button" class="theader3" name="savebtn" id="savebtn" value="Save" onClick="this.form.save.value='true'; call_validate(this.form,0,this.form.length);">
</div>		
</form>