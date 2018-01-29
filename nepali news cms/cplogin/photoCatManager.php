<?php
	include_once "../includes/functions.php";
		
	$delId=$_GET['nId'];
	$page=$_GET['page'];
	$nvo = new PhotogalleryVO();
	$ndao = new PhotogalleryDAO();		

	if(isset($_GET['nId']) && intval($_GET['nId'])!=0){
		$rnewsletter = new PhotogalleryDAO();
		$flag = $rnewsletter->removeCat($_GET['nId']);
		if($flag)
			$msg = "Selected Image Category has been removed successfully.";
		else
			$msg = "Some error prevented Image Categoryfrom being removed";
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
    <td width="28%" class="ptitle"><strong>Manage Image Category:</strong></td>
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
			<td width="35%" class="theader3"><strong> Category Name</strong></td>
			<td width="53%" class="theader3"><strong>Short Discriptions</strong></td>
		  <td width="8%" class="theader3"><strong>Operations</strong></td>
		</tr>
        
		<?php	
				$bizDAO = new PhotogalleryDAO();		
		
				$total=$bizDAO->countCategor();
				
				$limit = 25; 
				$link = "p=pcmanager&id=$id";
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
					<td class="tcell_left"><?php echo $newsletter->subject; ?></td>
				  <td class="tcell_left"><?php  echo $newsletter->shortdescription; ?></td>
					<td class="tcell_left">
					<a href="index.php?p=addEditPhotogallery&amp;nId=<?php echo $newsletter->id;?>&catId=<?php echo $newsletter->id; ?>"><img src="./images/edit.gif" border="0"></a> | 
				  	<a href="index.php?p=pcmanager&amp;nId=<?php echo $newsletter->id;?>" onclick="return confirm('Make sure before you delete this Image Category?');"><img src="./images/delete.gif" border="0" /></a></td>
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
<a href="index.php?p=addEditPhotogallery&function=add" class="theader3"><strong>ADD IMAGE</strong></a></div>
</div>