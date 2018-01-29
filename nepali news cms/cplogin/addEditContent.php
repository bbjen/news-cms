<?php
	$mainmenuId = intval($_REQUEST['mainmenu']);
	$submenuId = intval($_REQUEST['submenu']);
	$submenu1Id = intval($_REQUEST['submenu1']);
	

	
		$submenu_id = $submenu1Id;		
		$menu_id = $submenuId;		
		$parent_menu_id = $mainmenuId;
			
	$contentDAO = new ContentDAO();
	$vo = $contentDAO->fetchByMenuIds($submenu_id,$menu_id, $parent_menu_id);
?>
		<form name="contentForm" id="contentForm" action="contentcodes.php" method="post">
			<table width="100%" cellpadding="3" cellspacing="1" border="0"  style="border:1px solid #ccc;">
				<tr bgcolor="#efefef">
				  <td width="14%" class="medium">Page Title: </td>
				  <td>
					<input type="text" name="page_title" size="40" class="field" value="<?php echo $vo->page_title;?>" valiclass="required" req="1" valimessage="Page title is missing"/>				  </td>
				  <td width="15%" align="right" nowrap="nowrap" class="medium">Page Keywords:</td>
				  <td width="44%"><textarea name="page_keywords" cols="40" rows="3" class="field" valiclass="required" req="1" valimessage="Please provide page keywords"><?php echo $vo->page_keywords;?></textarea></td>
				  </tr>
				<tr bgcolor="#efefef">
				  <td class="medium">Page Description: </td>
				  <td width="27%"><textarea name="page_description" cols="40" rows="3" class="field" valiclass="required" req="1" valimessage="Please provide page Descriptions"><?php echo $vo->page_description;?></textarea></td>
				  <td align="right" nowrap="nowrap" class="medium">Page Metatag:</td>
				  <td> <textarea name="page_metatag" cols="40" rows="" class="field" valiclass="required" req="1" valimessage="Please provide page Metatags"><?php echo $vo->page_metatag;?></textarea></td>
				</tr>
				<tr>
				  <td> </td>
				  <td colspan="3"></td>
				  </tr>
				
				<tr>
					<td></td>
					<td colspan="3"></td>
				</tr>
				<tr>
				  <td colspan="4" align="left" class="medium">Description :&nbsp;&nbsp;&nbsp;<strong>Image Size:300*300</strong></td>
				</tr>
				<tr>
					<td colspan="4">
					<?php
						include "fckeditor2/fckeditor.php";
						$oFCKeditor = new FCKeditor('content') ;
						$oFCKeditor->Height = '450' ;
						$oFCKeditor->BasePath = 'fckeditor2/' ;
						$oFCKeditor->Value	=  $vo->content;
						$oFCKeditor->Create() ;
					?>	
					</td>
				</tr>
				<tr>
					<td colspan="4">
                    <input type="hidden" name="submenu_id" id="submenu_id" value="<?php echo $submenu_id;?>">
					<input type="hidden" name="menu_id" id="menu_id" value="<?php echo $menu_id;?>">
					<input type="hidden" name="parent_menu_id" id="parent_menu_id" value="<?php echo $parent_menu_id;?>">
					<input type="hidden" name="id" id="id" value="<?php echo $vo->id;?>">
					<input type="hidden" name="saveContent" id="saveContent" />
					<input type="button" name="saveContentButton" id="saveContentButton" value="Save" class="field" onclick="this.form.saveContent.value='true'; call_validate(this.form,0,this.form.length);" />			</td>
				</tr>
			</table>
			</form>
