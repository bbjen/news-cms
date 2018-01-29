<?php
include_once "../includes/functions.php";
	
$delId=$_GET['nId'];
$page=$_GET['page'];
$nvo = new BusinessVO();
$ndao = new BusinessDAO();

$count = 1;

	if(isset($_GET['nId']) && intval($_GET['nId'])!=0)
		{
		$rnewsletter = new BusinessDAO();
		$flag = $rnewsletter->remove($_GET['nId']);
		if($flag)
			$msg = "Selected Business Directory has been removed successfully.";
		else
			$msg = "Some error prevented Business Directory from being removed";
		}
	elseif(isset($_GET['id']) && intval($_GET['id'])!=0 && isset($_GET['s']) && $_GET['s']!="")
		{
		$newsletterdao = new BusinessDAO();
		$id = intval($_GET['id']);
		
	}	
	
	if(isset($_GET['msg']) && $_GET['msg']!= "")
		$msg = $_GET['msg'];
			
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="28%" class="ptitle"><h1><strong>Manage Business Directory:</strong></h1></td>
    <td width="72%" class="medium"><font color="#cc0000"><?php echo $msg;?></font></td>
  </tr>
  <tr>
    <td colspan="2">
	
	
	<table width="100%" border="0" cellpadding="0" cellspacing="1" style="border:1px solid #ccc;">
		<tr style="background-color:#ccc;">
			<td width="5%" class="theader3"><strong>S.No.</strong></td>
			<td width="17%" class="theader3"><strong> Company Name</strong></td>
			<td width="6%" class="theader3"><strong>Category</strong></td>
		  <td width="22%" class="theader3"><strong>Address</strong></td>
	 	  <td width="14%" class="theader3"><strong>Email</strong></td>
	 	  <td width="21%" class="theader3"><strong>URL</strong></td>
	 	  <td width="7%" class="theader3"><strong>Image</strong></td>
	 	  <td width="8%" class="theader3"><strong>Operations</strong></td>
		</tr>
		<?php
		$newsletterdao = new BusinessDAO();
		$total=$newsletterdao->countBusiness();
		$limit = 15; 
		$link = "p=business";
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
					<td class="tcell_left"><?php if($newsletter->cat=='0') echo "<font color='red'>".$newsletter->name."</font>"; else echo $newsletter->name; ?></td>
					<td class="tcell_left"><?php echo $newsletter->cat; ?></td>
					<td class="tcell_left"><?php echo $newsletter->address ;?></td>
					<td class="tcell_left"><?php echo $newsletter->email;?></td>
					<td class="tcell_left"><?php echo $newsletter->url;?></td>
					<td class="tcell_left"><img src="vignette.php?f=../images/uploaded/<?php echo $newsletter->files; ?>&w=50&h=50" alt="<?php echo ucwords($newsletter->files);?>" border="0"></td>
					<td class="tcell_left">
					<a href="index.php?p=addEditBusinessDir&amp;nId=<?php echo $newsletter->id;?>"><img src="./images/edit.gif" border="0"></a> | 
				  	<a href="index.php?p=business&amp;nId=<?php echo $newsletter->id;?>" onclick="return confirm('Make sure before you delete this business directory?');"><img src="./images/delete.gif" border="0" /></a></td>
		</tr>
		<?php
				}
			}
		else
			{
			?>
			<tr bgcolor="#efefef">
				<td colspan="3" class="tcell_left">&nbsp;</td>
				<td colspan="4" align="center" class="tcell2"><font color="#cc0000">No records were found.</font></td>
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
	<div class="rtfoot">
<a href="index.php?p=addEditBusinessDir&function=add" class="theader3"><strong>ADD BUSINESS DIRECTORY</strong></a>
    </div>
</div>