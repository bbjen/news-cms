<?php
	include_once "../includes/functions.php";
		
	$delId=$_GET['nId'];
	$page=$_GET['page'];
	$view=$_GET['view'];
	
	$sId=$_GET['id'];

	$_SESSION['$sId']=$sId;
		
	$nvo = new PhotogalleryVO();
	$bizDAO = new PhotogalleryDAO();
		
		if($_REQUEST['id']){
			$id = intval($_REQUEST['id']);	
		}
		else{			
			$id="";	
		}
		$total=$bizDAO->countPhotos($id);
		
		$limit = 15; 
		$link = "p=photogallery&id=$id";
		$pager  = Pager::getPagerData($total, $limit, $page);  
		$offset = $pager->offset;  
		$limit  = $pager->limit;  
		$page   = $pager->page;  
		$no_of_page=$pager->numPages;
			
			if($offset <0):
				$offset=0;
			endif;
		$list = $bizDAO->fetchDis($id, $offset, $limit); 
		
		if(!empty($list))
			$showform = true;			
		else
			$showform = false;
	
	
	
	
	

	if(isset($_GET['nId']) && intval($_GET['nId'])!=0){
		$rnewsletter = new PhotogalleryDAO();
		$flag = $rnewsletter->deleteit($_GET['nId']);
		if($flag)
			$msg = "Selected Photo has been removed successfully.";
		else
			$msg = "Some error prevented Photo from being removed";
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
    <td class="ptitle"><strong>Manage Photos:</strong></td>
    <td colspan="3" class="medium"><font color="#cc0000"><?php echo $msg;?></font></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td class="medium">&nbsp;</td>
    <td class="medium">&nbsp;</td>
    <td class="medium"><a href="index.php?p=pcmanager">Manage Category</a></td>
  </tr>
  <tr>
    <td width="28%" align="right">Category: </td>
    <td width="18%" class="medium">
   
		<select name="mainmenu" id="mainmenu" class="field" onChange=window.location.href="index.php?p=photogallery&id="+this.value>
        	<option value="">Select</option>
            <?php
				$bDAO = new PhotogalleryDAO();						
				$cat = $bDAO->fetchSub();
				if(!empty($cat)){
					foreach($cat as $lst)	{
			?>
			<option value="<?=$lst->id?>" <?php if($_GET['id']==$lst->id) echo "selected"; ?>>  <?php echo $lst->subject;?> </option>
            <?php		}
			
				}
			?>			
         </select></td>
    <td width="18%" class="medium">&nbsp;</td>
    <td width="36%" class="medium">&nbsp;</td>
  </tr>
  <tr>
  	<td colspan="4" height="10"></td>
  </tr>
  <tr>
    <td colspan="4">	

	<table width="100%" border="0" cellpadding="0" cellspacing="1" style="border:1px solid #ccc;">
		<tr style="background-color:#ccc;">
			<td width="4%" class="theader3"><strong>S.No.</strong></td>
			<td width="18%" class="theader3"><strong> Title</strong></td>
		  <td width="14%" class="theader3"><strong>Photo By</strong></td>
		  <td class="theader3"><strong>Short Description</strong></td>
		  <td width="7%" class="theader3"><strong>Image</strong></td>
	 	  <td width="8%" class="theader3"><strong>Operations</strong></td>
		</tr>
        
		<?php	if($showform){	
				foreach($list as $newsletter){
				?>
				<tr <?php if($_GET['id']==$newsletter->id) echo 'bgcolor="#ffcccc"'; elseif($sn%2==0) echo 'bgcolor="#efefef"';?>>
					<td class="tcell_left"><?php echo ++$offset;?></td>
					<td class="tcell_left"><?php echo $newsletter->subject; ?></td>
					<td class="tcell_left"><?php echo $newsletter->pby;?></td>
					<td class="tcell_left"><?php echo $newsletter->shortdescription;?></td>
					<td class="tcell_left"><img src="vignette.php?f=../images/uploaded/<?php echo $newsletter->files; ?>&w=50&h=50" alt="<?php echo ucwords($newsletter->files);?>" border="0"></td>
					<td class="tcell_left">
					<a href="index.php?p=addEditPhotogallery&amp;nId=<?php echo $newsletter->id;?>"><img src="./images/edit.gif" border="0"></a> | 
				  	<a href="index.php?p=photogallery&amp;nId=<?php echo $newsletter->id;?>" onclick="return confirm('Make sure before you delete this photo?');"><img src="./images/delete.gif" border="0" /></a></td>
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
<a href="index.php?p=addEditPhotogallery&function=add" class="theader3"><strong>ADD PHOTO </strong></a>
    </div>
</div>