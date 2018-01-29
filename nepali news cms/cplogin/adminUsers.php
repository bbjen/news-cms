<?php
	include_once "../includes/functions.php";

	if(isset($_GET['rAid']) && intval($_GET['rAid'])!=0)
		{
		$radmindao = new AdminsDAO();
		$flag = $radmindao->remove($_GET['rAid']);
		if($flag)
			$msg = "Selected admin user has been removed successfully.";
		else
			$msg = "Some error prevented this admin user from being removed.";
		}
	elseif(isset($_GET['id']) && intval($_GET['id'])!=0 && isset($_GET['s']) && $_GET['s']!="")
		{
		$admindao = new AdminsDAO();
		$id = intval($_GET['id']);
		if($_GET['s']=='a')
			$publish = "active";
		else
			$publish = "passive";
		
		$flag = $admindao->ActivateNdactivate($id, $publish);
		if($flag)
			$msg = "Status of selected admin user has been changed.";
		else
			$msg = "Status of selected admin user could not be changed.";
		}	
		
	if(isset($_GET['msg']) && $_GET['msg']!= "")
		$msg = $_GET['msg'];
			
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="24%" class="ptitle"><strong>Manage Admin Users:</strong></td>
    <td class="medium"><font color="#cc0000"><?php echo $msg;?></font></td>
  </tr>
  <tr>
    <td colspan="2">
	
	
	<table width="100%" border="0" cellpadding="0" cellspacing="1" style="border:1px solid #ccc;">
		<tr style="background-color:#ccc;">
			<td width="7%" class="theader3"><strong>S.No.</strong></td>
			<td width="19%" class="theader3"><strong>Username</strong></td>
		 	<td width="32%" class="theader3"><strong>Email</strong></td>
		 	<td width="15%" class="theader3"><strong>Created On </strong></td>
		 	<td width="16%" class="theader3"><strong>Status</strong></td>
		 	<td width="11%" class="theader3"><strong>Operations</strong></td>
		</tr>
		<?php
		$adminDAO = new AdminsDAO();
		$list = $adminDAO->fetchAll();

		$sn =0;
		if(!empty($list))
			{
				foreach($list as $admin)
				{
				?>
				<tr <?php if($_GET['id']==$admin->id) echo 'bgcolor="#ffcccc"'; elseif($sn%2==0) echo 'bgcolor="#efefef"';?>>
					<td class="tcell_left"><?php echo ++$sn;?></td>
					<td class="tcell2"><?php echo $admin->login;?></td>
					<td class="tcell2"><?php echo $admin->email;?></td>
					<td class="tcell2"><?php echo $admin->created_date;?></td>
					<td class="tcell2">
					<?php 
					if($admin->status=='active')
						echo "<a href='index.php?p=adminuser&id=".$admin->id."&s=p'>Block User</a>";
					else
						echo "<a href='index.php?p=adminuser&id=".$admin->id."&s=a'>Unblock User</a>";
					?>
					</td>
					<td class="tcell2">
					<a href="index.php?p=aeadminuser&eAid=<?php echo $admin->id;?>"><img src="./images/edit.gif" border="0"></a> | 
				  	<a href="index.php?p=adminuser&rAid=<?php echo $admin->id;?>" onClick="return confirm('Make sure before you delete this user?');">
				  	<img src="./images/delete.gif" border="0">				  	</a>				  	</td>
				</tr>
				<?php
				}
			}
		else
			{
			?>
			<tr bgcolor="#efefef">
				<td class="tcell_left">&nbsp;</td>
				<td class="tcell2" colspan="4" align="center"><font color="#cc0000">No Admin Users were found.</font></td>
				<td class="tcell2">&nbsp;</td>
			</tr>
			<?
			}
		?>
	</table>
	
	
	</td>
  </tr>
 
</table><br/>
<div align="right"><a href="index.php?p=aeadminuser" class="theader3"><strong>Add User </strong></a></div>
