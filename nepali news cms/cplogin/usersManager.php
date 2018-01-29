<?php
	include_once "../includes/functions.php";

	if(isset($_GET['rAid']) && intval($_GET['rAid'])!=0)
		{
		$radmindao = new UsersDAO();
		$flag = $radmindao->remove($_GET['rAid']);
		mysql_query("DELETE FROM tbl_blogs WHERE user_id = ".$_GET['rAid']."");
		if($flag)
			$msg = "Selected user has been removed successfully.";
		else
			$msg = "Some error prevented this user from being removed.";
		}
		
	if(isset($_GET['msg']) && $_GET['msg']!= "")
		$msg = $_GET['msg'];
			
?>
<?php 
//print_r($_POST);
$userid=$_REQUEST['userid'];
$search_value=$_REQUEST['search_value'];
$activated_val=$_REQUEST['activated'];
$order_by=$_REQUEST['order_by'];
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="24%" class="ptitle"><strong>Manage  Users:</strong></td>
    <td class="medium"><font color="#cc0000"><?php echo $msg;?></font></td>
  </tr>
  <tr>
    <td colspan="2" class="ptitle"><table>
  <form name="searchform" action="" method="post">
    <tr> 
      <td><strong>Search Members By Name, Number or Email : </strong>&nbsp;&nbsp; </td>
      <td> <input type="text" name="search_value" value="<?=$search_value?>" size="30" maxlength="60"> 
	  <input type="hidden" name="activated" value="<?=$activated_val?>"/>
	  <input type="hidden" name="order_by" value="<?=$order_by?>"/>	  </td>
	   <td> <input type="Submit" name="search" value="Search" class="bttn">  </td>
    </tr>
  </form>
</table></td>
  </tr>
 <br /><br />
  <tr>
    <td colspan="2">
	
	
	<table width="100%" border="0" cellpadding="0" cellspacing="1" style="border:1px solid #ccc;">
		<tr style="background-color:#ccc;">
			<td width="7%" class="theader3"><strong>S.No.</strong></td>
			<td width="19%" class="theader3"><strong>User Name </strong></td>
		 	<td width="11%" class="theader3"><strong>Operations</strong></td>
		</tr>
		<?php
		$uDAO = new UsersDAO();
		$list = $uDAO->fetchAll();
			/////******for paging******/////////
		require_once "./inc/paginationConfig.php";//initializes totalpages, current page, serial number etc.
		if($dopagination)
			$list = $uDAO->fetchLimited($page, $perpage, "all");
		/////****end of paging*******//////////
		

		$sn =0;
		if(!empty($list))
			{
				foreach($list as $user)
				{
				?>
				<tr <?php if($_GET['id']==$user->id) echo 'bgcolor="#ffcccc"'; elseif($sn%2==0) echo 'bgcolor="#efefef"';?>>
					<td class="tcell_left"><?php echo ++$sn;?></td>
					<td class="tcell2"><?php echo $user->fname;?></td>
					<td class="tcell2">
					<a href="#" onClick="javascript:window.open('memberDetails.php?uId=<?php echo $user->id;?>','title','toolbar=yes,menubar=yes,scrollbars=yes,width=650,height=600')"><strong>View Details</strong></a> | 
					<a href="index.php?p=aegeneraluser&uId=<?php echo $user->id;?>"><img src="./images/edit.gif" border="0"></a> | 
				  	<a href="index.php?p=generaluser&rAid=<?php echo $user->id;?>" onClick="return confirm('Make sure before you delete this user type?');">
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
				<td class="tcell2" align="center"><font color="#cc0000">No Users type were found.</font></td>
				<td class="tcell2">&nbsp;</td>
			</tr>
			<?
			}
		?>
	</table>	</td>
  </tr>
    <?php
		if($dopagination)
			{
			?>
			<tr>
					<td align="center" colspan="2">
						<font color="#cc0000">
						<?php
						$url = $_SERVER['REQUEST_URI'];
		  				echo paginate($url, $perpage, $total, $page);//these variables are initialized in paginationConfig.php
						?>
						</font>					</td>
			</tr>
			<?php
			}
		?>
</table>
<br/>
<div align="right"><a href="index.php?p=aegeneraluser" class="theader3"><strong>ADD USER</strong></a></div>
