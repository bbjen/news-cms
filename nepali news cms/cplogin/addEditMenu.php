<?php
$mainmenu = new MainMenuVO();
	
	if(isset($_GET['eMid']) && intval($_GET['eMid'])!=0)
		{
		$mdao = new MainMenuDAO();
		$id = intval($_GET['eMid']);
		$mainmenu = $mdao->fetchDetail($id);
		}
?>
<fieldset>
	<legend class="ptitle">Add/Edit Menu</legend>
<form name="addeditmainmenu" id="addeditmainmenu" action="./menucodes.php" method="post">
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
				<td class="medium">Menu Title : </td>
				<td class="medium">
				  <input type="text" name="title" id="title" size="40" value="<?php echo $mainmenu->title ;?>" class="field" valiclass="required" req="1" valimessage="Menu title in english is missing.">
				</td>
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td class="medium">Menu Position: </td>
			    <td>
			      <input type="text" name="menu_order" id="menu_order" value="<?php echo $mainmenu->menu_order;?>" class="field" size="5" valiclass="number" valimessage="Please insert the position of menu to be displayed.">
			    </td>
		      </tr>
              <tr>
			    <td>&nbsp;</td>
			    <td class="medium">Position Content: </td>
			    <td>
			      <select name="location" class="field" id="location">
				  	<option value="Header" <?php if($mainmenu->has_content == "Header") echo "selected";?>>Header</option>
				  	<option>Top Menu</option>
                  </select>
			    </td>
		      </tr>
			  <tr>
			    <td>&nbsp;</td>
			    <td class="medium">Needs Content: </td>
			    <td>
			      <select name="has_content" class="field" id="has_content">
				  	<option value="yes" <?php if($mainmenu->has_content == "yes") echo "selected";?>>Yes</option>
					<option value="no" <?php if($mainmenu->has_content == "no") echo "selected";?>>No</option>
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
	<a href="index.php?p=menu" class="theader3">&nbsp;&nbsp;Back&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="hidden" name="save" id="save">
	<input type="hidden" name="id" id="id" value="<?php echo $mainmenu->id;?>">
	<input type="button" class="theader3" name="savebtn" id="savebtn" value="Save" onClick="this.form.save.value='true'; call_validate(this.form,0,this.form.length);">
</div>		
</form>	
</fieldset>
