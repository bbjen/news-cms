<?php
include_once "../includes/functions.php";
	
$delId=$_GET['nId'];
$page=$_GET['page'];
$nvo = new CartoonVO();
$ndao = new CartoonDAO();

$count = 1;

	if(isset($_GET['nId']) && intval($_GET['nId'])!=0)
		{
		$rnewsletter = new CartoonDAO();
		$flag = $rnewsletter->remove($_GET['nId']);
		if($flag)
			$msg = "Selected Cartoon has been removed successfully.";
		else
			$msg = "Some error prevented Cartoon from being removed";
		}
	elseif(isset($_GET['id']) && intval($_GET['id'])!=0 && isset($_GET['s']) && $_GET['s']!="")
		{
		$newsletterdao = new CartoonDAO();
		$id = intval($_GET['id']);
		
	}	
	
	if(isset($_GET['msg']) && $_GET['msg']!= "")
		$msg = $_GET['msg'];
			
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="28%" class="ptitle"><h1><strong>Manage Cartoon:</strong></h1></td>
    <td width="72%" class="medium"><font color="#cc0000"><?php echo $msg;?></font></td>
  </tr>
  <tr>
    <td colspan="2">
	
	
	<table width="100%" border="0" cellpadding="0" cellspacing="1" style="border:1px solid #ccc;">
		<tr style="background-color:#ccc;">
			<td width="4%" class="theader3"><strong>S.No.</strong></td>
			<td colspan="2" class="theader3"><strong>Artiest</strong></td>
		  <td width="18%" class="theader3"><strong>Image</strong></td>
		 	<td width="36%" class="theader3"><strong>Description</strong></td>
	 	  <td width="8%" class="theader3"><strong>Operations</strong></td>
		</tr>
		<?php
		$newsletterdao = new CartoonDAO();
		$total=$newsletterdao->countCartoon();
		$limit = 10; 
		$link = "p=cartoon";
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
					<td colspan="2" class="tcell_left"><?php echo $newsletter->name; ?></td>
				  <td class="tcell2"><img src="vignette.php?f=../images/uploaded/<?php echo $newsletter->files; ?>&w=50&h=50" alt="<?php echo ucwords($newsletter->files);?>" border="0">;</td>
					<td class="tcell2"><?php echo $newsletter->description;?></td>
					<td class="tcell2">
					<a href="index.php?p=addeditcartoon&amp;nId=<?php echo $newsletter->id;?>"><img src="./images/edit.gif" border="0"></a> | 
				  	<a href="index.php?p=cartoon&amp;nId=<?php echo $newsletter->id;?>" onclick="return confirm('Make sure before you delete this Cartoon?');"><img src="./images/delete.gif" border="0" /></a></td>
		</tr>
		<?php
				}
			}
		else
			{
			?>
			<tr bgcolor="#efefef">
				<td colspan="2" class="tcell_left">&nbsp;</td>
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
	<div class="rtfoot">
    	<a href="index.php?p=addeditcartoon&function=add" class="theader3"><strong>ADD CARTOON</strong></a>
    </div>
</div>