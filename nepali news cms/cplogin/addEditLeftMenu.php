<?php
$t_id = $_REQUEST['nId'];
$function = $_GET['function'];

$vo = new lftContentVO();
if(isset($_GET['nId']) && intval($_GET['nId'])!=0)
		{
		$newsletterDAO = new lftContentDAO();
		$id = intval($_GET['nId']);
		$vo = $newsletterDAO->fetchDetails($id);
		}

$ndao = new lftContentDAO();
//to check the permission of the particular person
?>
<table width="100%" border="0">
<tr>
<td>

<fieldset><legend>
<?php
if($function == 'add'){
	echo"Add Content";	
}
else{
	echo "Edit Content";
	if ($_REQUEST['nId']){
		$vo = $ndao->fetchDetails($id);
	}	
}
?>
</legend>
<?php
$updated_msg="<script language='javascript'>\nalert('Selected Menu Content has been Updated successfully.');\n location='index.php?p=leftcontent';</script>\n";
$inserted_msg="<script language='javascript'>\nalert('Menu Content has been Added successfully.');\n location='index.php?p=leftcontent';\n</script>";
if($_POST){	
	$vo->lftmenu = $_POST['lftmenu'];
	$vo->slted = $_POST['slted'];
	$vo->title = $_POST['title'];
	$vo->name = $_POST['name'];
	$vo->email = $_POST['email'];
	$vo->short_descs =  addslashes($_POST['short_descs']);
	$vo->description = addslashes($_POST['description']);
	$vo->files = $_FILES['files']['name']; 
	$vo->published_date = $cur_time;
	$vo->update_date = $cur_time;
	$vo->is_archieve = $_POST['is_archieve'];		
	//echo $vo->is_archieve;

	$vo->formatInsertVariables();
	
	//validate the different fields
	if(!$vo->title){
		$errmsg="Please enter the title.<br />";
	}		
		if($vo->files) //if the image is uploaded from the file choose
		{
		//now code here goes to check the image type and make the thumbnail
	 	get_file_name_and_ext($vo->files,$image,$file_ext); 
		if($file_ext!='jpg' && $file_ext!='png' && $file_ext!='gif' && $file_ext!='jpeg'  && $file_ext!='jpg' && $file_ext!='doc' && $file_ext!='xls' && $file_ext!='pdf')
			{
		 	$errmsg ='Invalid file format';
		 	}			
		else
			{
			if($_POST['pict'])
			$vo->removePicture($_POST['pict']);
			
			srand(make_seed());
			$randval = rand();
			//concat the random value to the file name to avoid duplicate filen name
			$vo->files = "lftmenu_".$randval.".".$file_ext;
			//get the mime type of the picture
			$mimetype = $_FILES['files']['type'];
			//get the thumbnail height and width according to the size of the image using user defined function
			getThumbnailHeightAndWidth($mimetype,$_FILES['files']['tmp_name'],200,200,$thumb_w,$thumb_h);
			//make the thumbnail for the home page
			$vo->thumbnailAndUpload($mimetype,$_FILES['files']['tmp_name'],$vo->files,$thumb_w,$thumb_h);
			}
		}
	else
 		$vo->files = $_POST['pict'];

	if(!$errmsg){ //if the form is posted and there is no error at all
		if($_GET['nId']){
			if($ndao->update($vo))
				echo $updated_msg;
		}
		else{
			if($ndao->insert($vo))
				echo $inserted_msg;
		}
	}	
}
?>
<?php
//to display the error message
echo "<div align='center' class='style10'>$errmsg</div>";
?>
<script language="javascript">
	function Change(slt){		
		if(slt=='Sahitya'){
			document.getElementById("slted").style.visibility="visible";
		}
		else{
			document.getElementById("slted").style.visibility="hidden";
		}
	}
</script>
 <form name="addEditLeftMenu" id="addEditLeftMenu" enctype="multipart/form-data" action="" method="post">

			<table width="100%" cellpadding="3" cellspacing="1" border="0">
            	<tr bgcolor="#efefef">
                	<td colspan="3"></td>
                    <td width="44%">* Required information</td>
                </tr>
                <tr bgcolor="#efefef">
                	<td align="right" nowrap="nowrap" class="medium">Left Menu:
                    </td>
                    <td width="29%"><label>
                      <select name="lftmenu" id="lftmenu"  onchange="Change(this.value)">
<option <?php if($vo->lftmenu =='Rochak Satya') echo "selected"; ?> >Rochak Satya</option>
<option  <?php if($vo->lftmenu == 'Dastabase') echo "selected";?> >Dastabase</option>
<option  <?php if($vo->lftmenu == 'Sahitya') echo "selected";?> >Sahitya</option>
<option  <?php if($vo->lftmenu == 'Share Mausam') echo "selected"; ?> >Share Mausam</option>
<option  <?php if($vo->lftmenu == 'technology') echo "selected"; ?>>Technology</option>
<option <?php if($vo->lftmenu=='Lekh Rachana') echo "selected"; ?>>Lekh Rachana</option>

                      </select>
                    </label>
                    </td>
                    <td width="13%">
                    
                    <label>
                      <select name="slted" id="slted" <?php if($vo->lftmenu == 'Sahitya') echo "style='visibility:visible'"; else echo "style='visibility:hidden'"; ?>>
                        <option <?php if($vo->slted =='Katha') echo "selected"; ?>>Katha</option>
                        <option <?php if($vo->slted =='Laghu Katha') echo "selected"; ?>>Laghu Katha</option>
                        <option <?php if($vo->slted =='Kabita') echo "selected"; ?>>Kabita</option>
                        <option <?php if($vo->slted =='Gazal') echo "selected"; ?>>Gazal</option>
                        <option <?php if($vo->slted =='Geet') echo "selected"; ?>>Geet</option>
                        <option <?php if($vo->slted =='Jiwani') echo "selected"; ?>>Jiwani</option>
                      </select>
                    </label></td>
                    <td>&nbsp;</td>
                </tr>
				<tr bgcolor="#efefef">
				  <td class="medium">Name:</td>
				  <td colspan="3"><label>
				    <input name="name" type="text" id="name" size="40" class="field" value="<?php echo $vo->name;?>" />
				  </label></td>
			  </tr>
				<tr bgcolor="#efefef">
				  <td class="medium">Email:</td>
				  <td colspan="3"><label>
				    <input name="email" type="text" id="email" size="40" class="field" value="<?php echo $vo->email;?>" />
				  </label></td>
			  </tr>
				<tr bgcolor="#efefef">
				  <td width="14%" class="medium">Title: </td>
				  <td colspan="3">
					<input type="text" name="title" size="40" class="field" value="<?php echo $vo->title;?>" valiclass="required" req="1" valimessage="Page title is missing"/>
					<span class="inputRequirement"><span class="style1">*</span></span></td>
				  </tr>
				<tr bgcolor="#efefef">
				  <td class="medium">Image:</td>
				  <td colspan="3"><label>
				    <input type="file" name="files" id="files" class="field" />
		          <span class="main">*Image should be 200X200</span></label></td>
			  </tr>
				<?php if($vo->files!=''){?>
												 <tr> 
													<td align="left" valign="middle" class="content"><b>File:</b></td>
													<td align="left" valign="middle" class="content">
													<img src="../images/uploaded/<?php echo $vo->files;?> ?>" height="50" width="50"/></td>
												</tr>
												<?php }?>
				<tr bgcolor="#efefef">
				  <td class="medium">Short Description: </td>
				  <td colspan="3"><textarea name="short_descs" cols="40" rows="3" class="field" id="short_descs"><?php echo $vo->short_descs;?></textarea></td>
			    </tr>
				<tr>
				  <td> </td>
				  <td colspan="3"></td>
				  </tr>
				
				<tr>
					<td></td>
					<td colspan="3"></td>
				</tr>
				<tr>
				  <td colspan="4" align="left" class="medium">Description :&nbsp;&nbsp;&nbsp;<strong>Image Size:300*300</strong></td>
				</tr>
				<tr>
					<td colspan="4">
					<?php
						include "fckeditor2/fckeditor.php";
						$oFCKeditor = new FCKeditor('description') ;
						$oFCKeditor->BasePath = 'fckeditor2/' ;
						$oFCKeditor->Height = '430' ;
						$oFCKeditor->Value	=  $vo->description;
						$oFCKeditor->Create() ;
					?>	
					</td>
				</tr>
				<tr>
				  <td>Status:</td>
				  <td colspan="3"><select name="is_archieve" id="is_archieve" class="field">
												<option value="1" <?php if($vo->is_archieve == 1) echo "selected"; ?>  >Active</option>
												<option value="0" <?php if($vo->is_archieve == 0) echo "selected"; ?>  >Deactive</option>
											 	 </select></td>
			  </tr>
				<tr>
					<td colspan="4">
                    <input type="hidden" name="save" id="save" value="true">
	<input type="hidden" name="id" id="id" value="<?php //echo $keynotesvo->id;?>">
	<input type="button" class="theader3" name="savebtn" id="savebtn" value="Save" onClick="this.form.save.value='true'; call_validate(this.form,0,this.form.length);">
					
							</td>
				</tr>
			</table>
            <input type="hidden" name="register_posted" value="yes" id="register_posted" >
		  <?php
				if($function == 'add') {?>
	                <input type='hidden' name='function' value='add'>
				<?php	}else{?>
				<input type='hidden' name='function' value='edit'><?php }?>
			   <input type="hidden" name="<? //=$_GET[action]?>" value="yes"/>	
               <input type='hidden' name='pict' id='pict' value='<?php echo $vo->files; ?>'>				   
			</form>
</fieldset>
</td>
</tr>
</table>