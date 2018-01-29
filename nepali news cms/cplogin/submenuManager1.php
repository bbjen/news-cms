<?php
	$maintitle=$_SESSION['mailtitle'];
	if(isset($_GET['m']) && intval($_GET['m'])!=0){
		$mainmenuDAO = new SubMenuDAO();
		$parentId = intval($_GET['m']);
		$mvo = $mainmenuDAO->fetchDetail($parentId);
		
		if($mvo->id == 0)
			echo "<script>window.location='index.php?p=submenu&msg=Sub menu was not found';</script>";
		}
	else
		echo "<script>window.location='index.php?p=submenu&msg=Sub menu was not found';</script>";
	
	if(isset($_GET['rSid']) && intval($_GET['rSid'])!=0)
		{
		$rsubmenuDAO = new SubMenu1DAO();
		$flag = $rsubmenuDAO->remove($_GET['rSid']);
		if($flag)
			$msg = "Selected submenu has been removed successfully.";
		else
			$msg = "Some error prevented submenu from being removed.";
		}
		
		
	if(isset($_GET['msg']) && $_GET['msg']!= "")
		$msg = $_GET['msg'];
			
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="24%" class="ptitle"><strong>Manage Submenus:</strong></td>
    <td width="76%" class="medium"><font color="#cc0000"><?php echo $msg;?></font></td>
  </tr>
  <tr>
    <td width="24%" class="medium" colspan="2" align="left"><strong><?php echo $maintitle ." / ".$mvo->title ;?></strong></td>
  </tr>
  <tr>
    <td colspan="2">
	
	
	<table width="100%" border="0" cellpadding="0" cellspacing="1" style="border:1px solid #ccc;">
		<tr style="background-color:#ccc;">
			<td width="4%" class="theader3"><strong>S.No.</strong></td>
			<td width="21%" class="theader3"><strong>Submenu Title (English) </strong></td>
		 	<td width="11%" class="theader3"><strong>Display Order </strong></td>
		 	<td class="theader3"><strong>Content Required</strong></td>
		 	<td width="17%" class="theader3"><strong>Operations</strong></td>
		</tr>
		<?php
		$subMenuDAO = new SubMenu1DAO();
		$menulist = $subMenuDAO->fetchAll($parentId);
		$sn =0;
		if(!empty($menulist))
			{
				foreach($menulist as $submenu)
				{
				?>
				<tr <?php if($sn%2==0) echo 'bgcolor="#efefef"';?>>
					<td class="tcell_left"><?php echo ++$sn;?></td>
					<td class="tcell2"><?php echo $submenu->title ;?></td>
					<td class="tcell2"><?php echo $submenu->menu_order;?></td>
					<td class="tcell2"><?php echo $submenu->has_content;?></td>
					<td class="tcell2">
					<a href="index.php?p=aesubmenu1&m=<?php echo $submenu->submenu_id;?>&eSid=<?php echo $submenu->id;?>"><img src="./images/edit.gif" border="0" /></a> 
					<a href="index.php?p=submenu1&m=<?php echo $submenu->submenu_id;?>&rSid=<?php echo $submenu->id;?>" onClick="return confirm('Make sure before you delete this menu?');"><img src="./images/delete.gif" border="0" /></a>					</td>
				</tr>
				<?php
				}
			}
		else
			{
			?>
			<tr bgcolor="#efefef">
				<td class="tcell_left">&nbsp;</td>
				<td class="tcell2" colspan="3" align="center"><font color="#cc0000">No Submenu has been inserted for this menu yet.</font></td>
				<td class="tcell2">&nbsp;</td>
			</tr>
			<?
			}
		?>
	</table>
	
	
	</td>
  </tr>
</table><br/>
<div align="right">
	<a href="index.php?p=submenu" class="theader3">&nbsp;&nbsp;<strong>Back</strong>&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;
	<!--<a href="index.php?p=aesubmenu&mid=<?php //echo $parentId;?>" class="theader3"><strong>New Menu</strong></a>-->
</div>