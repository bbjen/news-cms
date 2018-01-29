<?php
	include_once "../includes/functions.php";
	
	$cat	=	$_REQUEST['cat'];
	$keywords=	$_REQUEST['keywords'];
	$page=$_REQUEST['page'];
	$where_clause="";
	if($cat!=0){ $where_clause="AND cat=$cat";}
	
		$q_count="SELECT * FROM tbl_business WHERE name LIKE '%".$keywords."%' $where_clause ORDER BY published_date";
		$r_count=mysql_query($q_count);
		$total=mysql_num_rows($r_count);
	
	
		
				$limit = 15;  
				$link = "p=search&cat=$cat&keywords=$keywords";
				$pager  = Pager::getPagerData($total, $limit, $page);  
				$offset = $pager->offset;  
				$limit  = $pager->limit;  
				$page   = $pager->page;  
				$no_of_page=$pager->numPages;
			
			if($offset <0):
				$offset=0;
			endif;
	$q_lists ="SELECT * FROM tbl_business WHERE name LIKE '%".$keywords."%' $where_clause LIMIT $offset, $limit";
	//print $q_lists;
	$q_data=mysql_query($q_lists);
	
?>
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
		<?php	if($total!=0){
				while($raw=mysql_fetch_array($q_data)){
				?>
				<tr <?php if($_GET['id']==$newsletter->id) echo 'bgcolor="#ffcccc"'; elseif($sn%2==0) echo 'bgcolor="#efefef"';?>>
					<td class="tcell_left"><?php echo ++$offset;?></td>
					<td class="tcell_left"><?php echo $raw['name']; ?></td>
					<td class="tcell_left"><?php echo $raw['address'];?></td>
					<td class="tcell_left"><?php echo $raw['location'];?></td>
					<td class="tcell_left"><?php echo $raw['phone'];?></td>
					<td class="tcell_left"><?php echo $raw['email'];?></td>
					<td class="tcell_left"><?php echo $raw['url'];?></td>
					<td class="tcell_left"><img src="vignette.php?f=../images/uploaded/<?php echo $raw['files']; ?>&w=50&h=50" alt="<?php echo ucwords($newsletter->files);?>" border="0"></td>
					<td class="tcell_left">
					<a href="index.php?p=addEditBusinessDir&amp;nId=<?php echo $raw['id'];?>&catId=<?php echo $_GET['cat']; ?>"><img src="./images/edit.gif" border="0"></a> | 
				  	<a href="index.php?p=business&amp;nId=<?php echo $raw['id'];?>" onclick="return confirm('Make sure before you delete this business directory?');"><img src="./images/delete.gif" border="0" /></a></td>
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
	 
<div id="foot">
	<div class="lftfoot">
   		 <?php if ($no_of_page>1):?><?=paging("index.php", $page, $no_of_page, $link, $id)?><?php endif; ?>
    </div> 
</div>