<?php
	include_once "../includes/functions.php";
		
	$delId=$_GET['nId'];
	$page=$_GET['page'];
	$nvo = new BusinessVO();
	$ndao = new BusinessDAO();		

	if(isset($_GET['nId']) && intval($_GET['nId'])!=0){
		$rnewsletter = new BusinessDAO();
		$flag = $rnewsletter->removeCat($_GET['nId']);
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
    <td width="28%" class="ptitle"><strong>Manage Business Directory Category:</strong></td>
    <td width="72%" class="medium"><font color="#cc0000"><?php echo $msg;?></font></td>
  </tr>
  <tr>
  	<td colspan="2" height="10"></td>
  </tr>
  <tr>
    <td colspan="2">	

	<table width="100%" border="0" cellpadding="0" cellspacing="1" style="border:1px solid #ccc;">
		<tr style="background-color:#ccc;">
			<td width="4%" class="theader3"><strong>S.No.</strong></td>
			<td width="54%" class="theader3"><strong> Category Name</strong></td>
			<td width="34%" class="theader3"><strong>Display in Front Page</strong></td>
		  <td width="8%" class="theader3"><strong>Operations</strong></td>
		</tr>
        
		<?php	
				$bizDAO = new BusinessDAO();		
		
				$total=$bizDAO->countCategory();
				
				$limit = 25; 
				$link = "p=bcmanager&id=$id";
				$pager  = Pager::getPagerData($total, $limit, $page);  
				$offset = $pager->offset;  
				$limit  = $pager->limit;  
				$page   = $pager->page;  
				$no_of_page=$pager->numPages;
					
					if($offset <0):
						$offset=0;
					endif;
				$list = $bizDAO->fetchCat($offset, $limit); 
	
				if(!empty($list)){			
					foreach($list as $newsletter){
				?>
				<tr <?php if($_GET['id']==$newsletter->id) echo 'bgcolor="#ffcccc"'; elseif($sn%2==0) echo 'bgcolor="#efefef"';?>>
					<td class="tcell_left"><?php echo ++$offset;?></td>
					<td class="tcell_left"><?php echo $newsletter->name; ?></td>
				  <td class="tcell_left"><?php  if($newsletter->features!=1) echo "No"; else echo "Yes"; ?></td>
					<td class="tcell_left">
					<a href="index.php?p=aebc&amp;nId=<?php echo $newsletter->id;?>&catId=<?php echo $_GET['id']; ?>"><img src="./images/edit.gif" border="0"></a> | 
				  	<a href="index.php?p=bcmanager&amp;nId=<?php echo $newsletter->id;?>" onclick="return confirm('Make sure before you delete this business directory Category?');"><img src="./images/delete.gif" border="0" /></a></td>
		</tr>
		<?php
				}
		}			
		else
			{
			?>
			<tr bgcolor="#efefef">
				<td colspan="2" class="tcell_left" align="right"><font color="#cc0000">No records were found.</font></td>
				<td align="center" class="tcell2">&nbsp;</td>
				<td class="tcell2">&nbsp;</td>
			</tr>		
	</table>
	  <?php
		}		
	?>
	
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