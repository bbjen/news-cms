<?php
	include_once "../includes/functions.php";
		
	$delId=$_GET['nId'];
	$page=$_GET['page'];
	$view=$_GET['view'];
	$nvo = new BusinessVO();
	$ndao = new BusinessDAO();
	

		
		$bizDAO = new BusinessDAO();
		
		if($_REQUEST['id']){
		$id = intval($_REQUEST['id']);	
		}else{
			
		$id="";	
		}
		$total=$bizDAO->countBusiness($id);
		
		$limit = 15; 
		$link = "p=business&id=$id";
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
    <td class="ptitle"><strong>Manage Business Directory:</strong></td>
    <td colspan="3" class="medium"><font color="#cc0000"><?php echo $msg;?></font></td>
  </tr>
  <tr>
    <td colspan="3" align="right">
    <form action="index.php?p=search" method="post">
  <strong>Sort By: </strong><span class="medium">
  <select name="cat" id="cat" class="field">
    <option value="0">Select</option>
    <?php
				$bDAO = new BusinessDAO();						
				$cat = $bDAO->fetchCategory();
				if(!empty($cat)){
					foreach($cat as $lst)	{
			?>
    <option value="<?=$lst->id?>" > <?php echo $lst->name;?></option>
    <?php		}
			
				}
			?>
  </select>
  </span>&nbsp;<strong>Keywords:</strong><input type="text" name="keywords" value="" />
<input type="submit" name="search" value="Search" /></form>
    
    </td>
    <td class="medium" align="right"><a href="index.php?p=bcmanager">Manage Category</a></td>
  </tr>
  <tr>
    <td align="right">&nbsp;</td>
    <td class="medium">&nbsp;</td>
    <td class="medium">&nbsp;</td>
    <td class="medium">&nbsp;</td>
  </tr>
  <tr>
    <td width="28%" align="right">Category: </td>
    <td width="18%" class="medium">
   
		<select name="mainmenu" id="mainmenu" class="field" onChange=window.location.href="index.php?p=business&id="+this.value>
        	<option value="">Select</option>
            <?php
				$bDAO = new BusinessDAO();						
				$cat = $bDAO->fetchCategory();
				if(!empty($cat)){
					foreach($cat as $lst)	{
			?>
			<option value="<?=$lst->id?>" <?php if($_GET['id']==$lst->id) echo "selected"; ?>>  <?php echo $lst->name;?> </option>
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
			<td width="24%" class="theader3"><strong> Company Name</strong></td>
		  <td width="11%" class="theader3"><strong>Address</strong></td>
		  <td width="10%" class="theader3"><strong>Location</strong></td>
		  <td width="11%" class="theader3"><strong>Phone No</strong></td>
	 	  <td width="15%" class="theader3"><strong>Email</strong></td>
	 	  <td width="10%" class="theader3"><strong>URL</strong></td>
	 	  <td width="7%" class="theader3"><strong>Image</strong></td>
	 	  <td width="8%" class="theader3"><strong>Operations</strong></td>
		</tr>
        
		<?php	if($showform){	
				foreach($list as $newsletter){
				?>
				<tr <?php if($_GET['id']==$newsletter->id) echo 'bgcolor="#ffcccc"'; elseif($sn%2==0) echo 'bgcolor="#efefef"';?>>
					<td class="tcell_left"><?php echo ++$offset;?></td>
					<td class="tcell_left"><?php echo $newsletter->name; ?></td>
					<td class="tcell_left"><?php echo $newsletter->address ;?></td>
					<td class="tcell_left"><?php echo $newsletter->location ;?></td>
					<td class="tcell_left"><?php echo $newsletter->phone ;?></td>
					<td class="tcell_left"><?php echo $newsletter->email;?></td>
					<td class="tcell_left"><?php echo $newsletter->url;?></td>
					<td class="tcell_left"><img src="vignette.php?f=../images/uploaded/<?php echo $newsletter->files; ?>&w=50&h=50" alt="<?php echo ucwords($newsletter->files);?>" border="0"></td>
					<td class="tcell_left">
					<a href="index.php?p=addEditBusinessDir&amp;nId=<?php echo $newsletter->id;?>&catId=<?php echo $_GET['id']; ?>"><img src="./images/edit.gif" border="0"></a> | 
				  	<a href="index.php?p=business&amp;nId=<?php echo $newsletter->id;?>" onclick="return confirm('Make sure before you delete this business directory?');"><img src="./images/delete.gif" border="0" /></a></td>
		</tr>
		<?php
				}
		}			
		else
			{
			?>
			<tr bgcolor="#efefef">
				<td colspan="2" class="tcell_left">&nbsp;</td>
				<td colspan="6" align="center" class="tcell2"><font color="#cc0000">No records were found.</font></td>
				<td class="tcell2">&nbsp;</td>
			</tr>		
            <?php
		}		
	?>
	</table>
	  
	
	</td>
  </tr>
 <br/>

</table>
<div id="foot">
	<div class="lftfoot">
   		 <?php if ($no_of_page>1):?><?=paging("index.php", $page, $no_of_page, $link, $id)?><?php endif; ?>
    </div>
  
	<div class="rtfoot">
<a href="index.php?p=addEditBusinessDir&function=add" class="theader3"><strong>ADD BUSINESS DIRECTORY</strong></a>
    </div>
</div>
