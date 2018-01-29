<?php
include_once "../includes/functions.php";
	
$delId=$_GET['nId'];
$page=$_GET['page'];
$nvo = new lftContentVO();
$ndao = new lftContentDAO();

$count = 1;

	if(isset($_GET['nId']) && intval($_GET['nId'])!=0)
		{
		$rnewsletter = new lftContentDAO();
		$flag = $rnewsletter->remove($_GET['nId']);
		if($flag)
			$msg = "Selected menu has been removed successfully.";
		else
			$msg = "Some error prevented menu from being removed";
		}
	elseif(isset($_GET['id']) && intval($_GET['id'])!=0 && isset($_GET['s']) && $_GET['s']!="")
		{
		$newsletterdao = new lftContentDAO();
		$id = intval($_GET['id']);
		
	}	
	
	if(isset($_GET['msg']) && $_GET['msg']!= "")
		$msg = $_GET['msg'];
	
	
			
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="28%" class="ptitle"><h1><strong>Manage Left Menu:</strong></h1></td>
    <td width="72%" class="medium"><font color="#cc0000"><?php echo $msg;?></font></td>
  </tr>
  <tr>
    <td colspan="2">
	
	
	<table width="100%" border="0" cellpadding="0" cellspacing="1" style="border:1px solid #ccc;">
		<tr style="background-color:#ccc;">
			<td width="4%" class="theader3"><strong>S.No.</strong></td>
			<td width="9%" class="theader3"><strong>Left Menu</strong></td>
			<td width="15%" class="theader3"><strong> Auther</strong></td>
			<td width="14%" class="theader3"><strong>Title</strong></td>
			<td width="24%" class="theader3"><strong>Short Description</strong></td>
			<td width="5%" class="theader3"><strong>Image</strong></td>
			<td width="11%" class="theader3"><strong>Published Date</strong></td>
			<td width="11%" class="theader3"><strong>Update Date</strong></td>
	 	  <td width="7%" class="theader3"><strong>Operations</strong></td>
		</tr>
		<?php
		$newsletterdao = new lftContentDAO();
		$total=$newsletterdao->countMenu();
		
		$limit = 10; 
		$link = "p=leftcontent";
		$pager  = Pager::getPagerData($total, $limit, $page);  
		$offset = $pager->offset;  
		$limit  = $pager->limit;  
		$page   = $pager->page;  
		$no_of_page=$pager->numPages;
			
			if($offset <0):
				$offset=0;
			endif;
		
		
		$list = $newsletterdao->fetchAll($offset, $limit); 

		$sn =0;
		if(!empty($list))
			{
				foreach($list as $newsletter)
				{
				?>
				<tr <?php if($_GET['id']==$newsletter->id) echo 'bgcolor="#ffcccc"'; elseif($sn%2==0) echo 'bgcolor="#efefef"';?>>
					<td class="tcell_left"><?php echo ++$offset;?></td>
					<td class="tcell_left"><?php echo $newsletter->lftmenu; ?></td>
					<td class="tcell_left"><?php echo $newsletter->name; ?></td>
					<td class="tcell_left"><?php echo $newsletter->title; ?></td>
					<td class="tcell_left"><?php echo substr(stripslashes($newsletter->short_descs),0,350); ?></td>
					<td class="tcell_left"><span class="tcell2"><img src="vignette.php?f=../images/uploaded/<?php echo $newsletter->files; ?>&amp;w=35&amp;h=35" alt="<?php echo ucwords($newsletter->files);?>" border="0" /></span></td>
				  <td class="tcell_left"><?php echo $newsletter->published_date;?></td>
					<td class="tcell2"><?php echo $newsletter->update_date;?></td>
					<td class="tcell2">
					<a href="index.php?p=addeditleftmenu&amp;nId=<?php echo $newsletter->id;?>"><img src="./images/edit.gif" border="0"></a> | 
				  	<a href="index.php?p=leftcontent&amp;nId=<?php echo $newsletter->id;?>" onclick="return confirm('Make sure before you delete this menu?');"><img src="./images/delete.gif" border="0" /></a></td>
		</tr>
		<?php
				}
			}
		else
			{
			?>
			<tr bgcolor="#efefef">
				<td colspan="6" class="tcell_left"><font color="#cc0000">No records were found.</font></td>
				<td colspan="2" align="center" class="tcell2">&nbsp;</td>
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
    <a href="index.php?p=addeditleftmenu&amp;function=add" class="theader3"><strong>ADD CONTENTS</strong></a></div>
	<div class="rtfoot">
    	<a href="index.php?p=addeditleftmenu&function=add" class="theader3"></a>
    </div>
</div>
