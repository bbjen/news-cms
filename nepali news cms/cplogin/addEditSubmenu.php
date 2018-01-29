<?php
	if(isset($_GET['m']) && intval($_GET['m'])!=0)
		{
		$mainmenuDAO = new MainMenuDAO();
		$parentId = intval($_GET['m']);
		$mvo = $mainmenuDAO->fetchDetail($parentId);
		//echo $mvo->id ; exit;
		
		if($mvo->id == 0)
			echo "<script>window.location='index.php?p=submenu&msg=Submenu not found for provided id.';</script>";
		}
	else
		echo "<script>window.location='index.php?p=submenu&msg=Submenu not found for provided id.';</script>";
	
	
	$submenu = new SubMenuVO();
	if(isset($_GET['eSid']) && intval($_GET['eSid'])!=0)
		{
		$sdao = new SubMenuDAO();
		$id = intval($_GET['eSid']);
		$submenu = $sdao->fetchDetail($id);
		}
		
		
?>
<fieldset>
<legend class="ptitle">Add/Edit Submenu </legend>
<form name="addeditmainmenu" id="addeditmainmenu" action="./submenucodes.php" method="post">
<table width="100%" cellpadding="0" cellspacing="0" border="0" style="border:1px solid #ccc;">
	<tr>
		<td>
		
			<table width="100%" border="0" cellspacing="2">
			  <tr>
				<td width="18%">&nbsp;</td>
				<td width="20%">&nbsp;</td>
				<td width="62%">&nbsp;</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td class="medium">Parent Menu: </td>
			    <td class="medium"><span class="headblue"><?php echo $mvo->title." / ".$mvo->title;?></span></td>
		      </tr>
			  <tr>
				<td>&nbsp;</td>
				<td class="medium">Menu Title : </td>
				<td class="medium">
				  <input type="text" name="title" id="title" size="40" value="<?php echo $submenu->title;?>" class="field" valiclass="required" req="1" valimessage="Submenu title in english is missing.">				</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td class="medium">Menu Position: </td>
			    <td>
			      <input type="text" name="menu_order" id="menu_order" value="<?php echo $submenu->menu_order;?>" class="field" size="5" valiclass="number" valimessage="Please insert the position of menu to be displayed in.">			    </td>
		      </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td class="medium">Needs Content: </td>
			    <td>
			      <select name="has_content" class="field" id="has_content">
				  	<option value="yes" <?php if($submenu->has_content == "yes") echo "selected";?>>Yes</option>
					<option value="no" <?php if($submenu->has_content == "no") echo "selected";?>>No</option>
		          </select>			    </td>
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
	<a href="index.php?p=submenu&m=<?php echo $parentId;?>" class="theader3">&nbsp;&nbsp;Back&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="hidden" name="save" id="save">
	<input type="hidden" name="id" id="id" value="<?php echo $submenu->id;?>">
	<input type="hidden" name="parent_menu_id" id="parent_menu_id" value="<?php echo $parentId;?>">
	<input type="button" class="theader3" name="savebtn" id="savebtn" value="Save" onClick="this.form.save.value='true'; call_validate(this.form,0,this.form.length);">
</div>		
</form>	
</fieldset>