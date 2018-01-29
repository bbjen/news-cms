<?php
	include_once "../includes/functions.php";	
		
	$nvo = new CommentVO();
	$ndao = new CommentDAO();
	$page=$_GET['page'];
	
	if(isset($_GET['nId']) && intval($_GET['nId'])!=0){
		$rnewsletter = new CommentDAO();
		$flag = $rnewsletter->remove($_GET['nId']);
		if($flag)
			$msg = "Selected comment has been removed successfully.";
		else
			$msg = "Some error prevented comment from being removed";
	}
	elseif(isset($_GET['id']) && intval($_GET['id'])!=0 && isset($_GET['s']) && $_GET['s']!="")	{
		$newsletterdao = new CommentDAO();
		$id = intval($_GET['id']);
		
	}
	if(isset($_GET['Id']) && intval($_GET['Id'])!=0){
		$rnewsletter = new CommentDAO();
		$flag = $rnewsletter->setArchieve($_GET['Id']);
		if($flag)
			$msg = "Selected action has been performed ";
		else
			$msg = "Some error prevented being updating";
	}
	elseif(isset($_GET['id']) && intval($_GET['id'])!=0 && isset($_GET['s']) && $_GET['s']!="")	{
		$newsletterdao = new CommentDAO();
		$id = intval($_GET['id']);
		
	}
	
	
	if(isset($_GET['msg']) && $_GET['msg']!= "")
		$msg = $_GET['msg'];
			
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="28%" class="ptitle"><h1><strong>Manage Comment:</strong></h1></td>
    <td width="72%" class="medium"><font color="#cc0000"><?php echo $msg;?></font></td>
  </tr>
  <tr>
    <td colspan="2">
	
	
	<table width="100%" border="0" cellpadding="0" cellspacing="1" style="border:1px solid #ccc;">
		<tr style="background-color:#ccc;">
			<td width="5%" class="theader3"><strong>S.No.</strong></td>
			<td width="17%" class="theader3"><strong> Name</strong></td>
			<td width="6%" class="theader3"><strong>Email</strong></td>
		  <td width="22%" class="theader3"><strong>Section</strong></td>
	 	  <td width="14%" class="theader3"><strong>Comment on</strong></td>
	 	  <td width="22%" class="theader3"><strong>Comment</strong></td>
	 	  <td width="14%" class="theader3"><strong>Operations</strong></td>
		</tr>
		<?php
		$total=$ndao->countTotal();
		$limit = 15; 
		$link = "p=comment";
		$pager  = Pager::getPagerData($total, $limit, $page);  
		$offset = $pager->offset;  
		$limit  = $pager->limit;  
		$page   = $pager->page;  
		$no_of_page=$pager->numPages;
			
			if($offset <0):
				$offset=0;
			endif;
		$list = $ndao->fetchTotal($offset, $limit); 

		$sn =0;
		if(!empty($list))	{
				foreach($list as $newsletter){
				?>
				<tr <?php if($_GET['id']==$newsletter->id) echo 'bgcolor="#ffcccc"'; elseif($sn%2==0) echo 'bgcolor="#efefef"';?>>
					<td class="tcell_left"><?php echo ++$offset;?></td>
					<td class="tcell_left"><?php echo $newsletter->name; ?></td>
					<td class="tcell_left"><?php echo $newsletter->email; ?></td>
					<td class="tcell_left"><?php echo $newsletter->type ;?></td>
					<td class="tcell_left"></td>
					<td class="tcell_left"><?php echo $newsletter->comment;?></td>
					<td class="tcell_left">
<a href="index.php?p=comment&amp;Id=<?php echo $newsletter->id;?>"><?php if($newsletter->is_archieve=='0') echo"Approve"; else echo "Disapprove"; ?></a>
| <a href="index.php?p=comment&amp;nId=<?php echo $newsletter->id;?>" onclick="return confirm('Make sure before you delete this comment?');"><img src="./images/delete.gif" border="0" /></a></td>
		</tr>
		<?php
				}
			}
		else
			{
			?>
			<tr bgcolor="#efefef">
				<td colspan="3" class="tcell_left">&nbsp;</td>
				<td colspan="3" align="center" class="tcell2"><font color="#cc0000">No records were found.</font></td>
				<td class="tcell2">&nbsp;</td>
			</tr>
			<?php
			}
			?>
	</table>
	
	
	</td>
  </tr>
 
</table><br/>
<div id="foot">
	<div class="lftfoot">
   		 <?php if ($no_of_page>1):?><?=paging("index.php", $page, $no_of_page, $link, $id)?><?php endif; ?>
    </div>
	
</div>