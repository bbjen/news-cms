<?php
include_once "../includes/functions.php";
	
$delId=$_GET['nId'];
$page=$_GET['page'];
$nvo = new NewsletterVO();
$ndao = new NewsletterDAO();

$count = 1;

	if(isset($_GET['nId']) && intval($_GET['nId'])!=0)
		{
		$rnewsletter = new NewsletterDAO();
		$flag = $rnewsletter->remove($_GET['nId']);
		if($flag)
			$msg = "Selected news/article has been removed successfully.";
		else
			$msg = "Some error prevented news/article from being removed";
		}
	elseif(isset($_GET['id']) && intval($_GET['id'])!=0 && isset($_GET['s']) && $_GET['s']!="")
		{
		$newsletterdao = new NewsletterDAO();
		$id = intval($_GET['id']);
		
	}	
	
	if(isset($_GET['msg']) && $_GET['msg']!= "")
		$msg = $_GET['msg'];
	
	
			
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="28%" class="ptitle"><h1><strong>Manage News/Article:</strong></h1></td>
    <td width="72%" class="medium"><font color="#cc0000"><?php echo $msg;?></font></td>
  </tr>
  <tr>
    <td colspan="2">
	
	
	<table width="100%" border="0" cellpadding="0" cellspacing="1" style="border:1px solid #ccc;">
		<tr style="background-color:#ccc;">
			<td width="3%" class="theader3"><strong>S.No.</strong></td>
			<td width="9%" class="theader3"><strong>Name</strong></td>
			<td width="9%" class="theader3"><strong>Breaking News</strong></td>
			<td width="8%" class="theader3"><strong>Special News</strong></td>
			<td width="4%" class="theader3"><strong>Normal News</strong></td>
			<td width="4%" class="theader3"><strong>Flash News</strong></td>
			<td width="7%" class="theader3"><strong>Type</strong></td>
			<td width="17%" class="theader3"><strong>Title</strong></td>
		 	<td width="32%" class="theader3"><strong>Description</strong></td>
	 	  <td width="7%" class="theader3"><strong>Operations</strong></td>
		</tr>
		<?php
		$newsletterdao = new NewsletterDAO();
		$total=$newsletterdao->countNewsletter();
		
		$limit = 10; 
		$link = "p=newsletter";
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
					<td class="tcell_left"><?php echo $newsletter->name; ?></td>
					<td class="tcell_left"><?php if($newsletter->breaking==1)echo 'Yes'; else echo 'No'; ?></td>
					<td class="tcell_left"><?php if($newsletter->special==1)echo 'Yes';else echo 'No';  ?></td>
					<td class="tcell_left"><?php if($newsletter->normal==1)echo 'Yes';else echo 'No';  ?></td>
					<td class="tcell_left"><?php if($newsletter->flash==1)echo 'Yes';else echo 'No';  ?></td>
					<td class="tcell_left"><?php echo $newsletter->type; ?></td>
					<td class="tcell2"><?php echo $newsletter->subject;?></td>
					<td class="tcell2"><?php echo substr($newsletter->shortdescription,0,560);?></td>
					<td class="tcell2">
					<a href="index.php?p=addeditnewsletter&amp;nId=<?php echo $newsletter->id;?>"><img src="./images/edit.gif" border="0"></a> | 
				  	<a href="index.php?p=newsletter&amp;nId=<?php echo $newsletter->id;?>" onclick="return confirm('Make sure before you delete this news/article?');"><img src="./images/delete.gif" border="0" /></a></td>
		</tr>
		<?php
				}
			}
		else
			{
			?>
			<tr bgcolor="#efefef">
				<td colspan="7" class="tcell_left">&nbsp;</td>
				<td colspan="2" align="center" class="tcell2"><font color="#cc0000">No records were found.</font></td>
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
    	<a href="index.php?p=addeditnewsletter&function=add" class="theader3"><strong>ADD NEWS/ARTICLE </strong></a>
    </div>
</div>
