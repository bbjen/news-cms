<?php
	if(isset($_GET['rMid']) && intval($_GET['rMid'])!=0)
		{
		$rmainmenuDAO = new MainMenuDAO();
		$flag = $rmainmenuDAO->remove($_GET['rMid']);
		if($flag)
			$msg = "Selected menu has been removed successfully.";
		else
			$msg = "Some error prevented menu from being removed.";
		}
		
		
	if(isset($_GET['msg']) && $_GET['msg']!= "")
		$msg = $_GET['msg'];
			
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="24%" class="ptitle"><strong>Manage Menus:</strong></td>
    <td class="medium"><font color="#cc0000"><?php echo $msg;?></font></td>
  </tr>
  <tr>
    <td colspan="2">
	
	
	<table width="100%" border="0" cellpadding="0" cellspacing="1" style="border:1px solid #ccc;">
		<tr style="background-color:#ccc;">
			<td width="10%" class="theader3"><strong>S.No.</strong></td>
			<td width="23%" class="theader3"><strong>Main Menu Title </strong></td>
		 	<td width="13%" class="theader3"><strong>Display Order </strong></td>
		 	<td width="13%" class="theader3"><strong>Content Required</strong></td>
		 	<td width="20%" class="theader3"><strong>Operations</strong></td>
		 	<td width="21%" class="theader3"><strong>Options</strong></td>
		</tr>
		<?php
		$mainMenuDAO = new MainMenuDAO();
		$menulist = $mainMenuDAO->fetchAll();
		$sn =0;
		if(!empty($menulist))
			{
				foreach($menulist as $mainmenu)
				{
				?>
				<tr <?php if($sn%2==0) echo 'bgcolor="#efefef"';?>>
					<td class="tcell_left"><?php echo ++$sn;?></td>
					<td class="tcell2"><?php echo $mainmenu->title;?></td>
					<td class="tcell2"><?php echo $mainmenu->menu_order;?></td>
					<td class="tcell2"><?php echo $mainmenu->has_content;?></td>
					<td class="tcell2"><?php if($mainmenu->id!=17 && $mainmenu->id!=18){ ?>
					
				  <a href="index.php?p=submenu&m=<?php echo $mainmenu->id;?>"><strong>Sub Menus</strong></a> | <a href="index.php?p=aesubmenu&m=<?php echo $mainmenu->id;?>"><strong>Add Sub Menus</strong></a> <?php } ?></td>
					<td class="tcell2">
                    <a href="index.php?p=aemenu&eMid=<?php echo $mainmenu->id;?>"><img src="./images/edit.gif" border="0" /></a>  
                    <?php if($mainmenu->id!=17 && $mainmenu->id!=18){ ?>
					<a href="index.php?p=menu&rMid=<?php echo $mainmenu->id;?>" onclick="return confirm('Make sure before you delete this menu?');"><img src="./images/delete.gif" border="0" /><?php } ?></a> 
                    
                    
                    </td>
				</tr>
				<?php
				}
			}
		else
			{
			?>
			<tr bgcolor="#efefef">
				<td class="tcell_left">&nbsp;</td>
				<td class="tcell2" colspan="3" align="center"><font color="#cc0000">No Menu has been inserted yet.</font></td>
				<td colspan="2" class="tcell2">&nbsp;</td>
			</tr>
			<?
			}
		?>
	</table>
	
	
	</td>
  </tr>
</table><br/>
<!--<div align="right"><a href="index.php?p=aemenu" class="theader3"><strong>New Menu</strong></a></div>-->