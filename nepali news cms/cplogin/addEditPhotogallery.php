<?php
$t_id = $_REQUEST['nId'];
$function = $_GET['function'];
$catId= $_GET['nId'];

$sId=$_SESSION['$sId'];

$nvo = new PhotogalleryVO();
if(isset($_GET['nId']) && intval($_GET['nId'])!=0)
		{
		$newsletterDAO = new PhotogalleryDAO();
		$id = intval($_GET['nId']);
		$nvo = $newsletterDAO->fetchDetails($id);
		}

$ndao = new PhotogalleryDAO();
//to check the permission of the particular person

if($function == 'add')
	{
	echo"<h2>Add Photos</h2>";
	}
else 
	{
	echo "<h2>Edit Photos</h2>";
	if ($_REQUEST['nId'])
		{
		$nvo = $ndao->fetchDetails($id);
		}
	}
// the different message for updating and adding the news
$updated_msg="<script language='javascript'>\nalert('Selected Photo has been Updated successfully.');\n location='index.php?p=photogallery';</script>\n";
$inserted_msg="<script language='javascript'>\nalert('Photo has been Added successfully.');\n location='index.php?p=photogallery';\n</script>";
if($_POST)
	{
	
	$nvo->subject = $_POST['subject'];
	$nvo->cat = $_POST['cat'];
	$nvo->pby = $_POST['pby'];
	$nvo->shortdescription = $_POST['shortdescription'];
	$nvo->files = $_FILES['files']['name']; 	
	$nvo->published_date = $cur_time;
	$nvo->is_archieve = $_POST['is_archieve'];	
	$nvo->formatInsertVariables();
	
	//validate the different fields
	if(!$nvo->subject)
		{
		$errmsg="Please Enter the subject <br />";
		}
	if($nvo->files) //if the image is uploaded from the file choose
		{
		//now code here goes to check the image type and make the thumbnail
	 	get_file_name_and_ext($nvo->files,$image,$file_ext); 
		if($file_ext!='jpg' && $file_ext!='png' && $file_ext!='gif' && $file_ext!='jpeg'  && $file_ext!='jpg' && $file_ext!='doc' && $file_ext!='xls' && $file_ext!='pdf')
			{
		 	$errmsg ='Invalid file format';
		 	}			
		else
			{
			if($_POST['pict'])
			$nvo->removePicture($_POST['pict']);
			
			srand(make_seed());
			$randval = rand();
			//concat the random value to the file name to avoid duplicate filen name
			$nvo->files = "photo_".$randval.".".$file_ext;
			//get the mime type of the picture
			$mimetype = $_FILES['files']['type'];
			//get the thumbnail height and width according to the size of the image using user defined function
			getThumbnailHeightAndWidth($mimetype,$_FILES['files']['tmp_name'],500,500,$thumb_w,$thumb_h);
			//make the thumbnail for the home page
			$nvo->thumbnailAndUpload($mimetype,$_FILES['files']['tmp_name'],$nvo->files,$thumb_w,$thumb_h);
			}
		}
	else
 		$nvo->files = $_POST['pict'];
	if(!$errmsg) //if the form is posted and there is no error at all
		{
		if($_GET['nId']) 
			{
			if($ndao->update($nvo))
				//echo"";
				echo $updated_msg;
			}
		else
			{
			if($ndao->insert($nvo))
				echo $inserted_msg;
			}
		}
	}
?>
<?php
//to display the error message
echo "<div align='center' class='style10'>$errmsg</div>";
?>
<table align="center" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
            <tr>
              <td valign="top" width="100%"> 
             
                <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center">
                  <tbody>
                    <tr> 
                      <!-- body_text //-->
                      <td valign="top" width="100%">
					   <form name="addEditusers" id="addEditusers" enctype="multipart/form-data" action="" method="post">
                          <table width="80%" align="center">
                              <tr>
                                <td colspan="2" align="left" class="main"><table width="105%" border="0" cellspacing="0" cellpadding="0" class="">
                                          <tr>
                                            <TD width="43%" class="pageHeading" >&nbsp;</TD>
                                            <TD width="57%"  align="center" class="pageHeading"><span class="style1">*</span> <span class="style1" >Required information</span></TD>
                                          </table></td>
                              </tr><BR />
                              <tr>
                                <td colspan="2" align="left" class="main"></td>
                              </tr>
                              <tr>
                                <td colspan="2" align="left" class="main"><strong>Photogallery    Form:</strong></td>
                              </tr>
							   <tr>
							     <td colspan="2" class="main"><table class="infoBox" border="0" cellpadding="2" cellspacing="1" width="100%">
                                    <tbody>
                                      <tr class="infoBoxContents"> 
                                        <td style="border: 1px solid #CCCCCC;">
										<table border="0" cellpadding="0" cellspacing="0" width="600" >
                                            <tbody>
                                              <tr>
                                                <td width="174" align="left" class="text">&nbsp;</td>
                                                <td width="426"  align="left" class="main">&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td align="left" class="text">&nbsp;</td>
                                                <td class="main"  align="left">&nbsp;</td>
                                              </tr>
                                              
                                              <tr> 
                                                <td align="left" class="text">Title :&nbsp;</td>
                                                <td class="main"  align="left"><label>
                                                  <input type="text" name="subject" id="subject" value="<?php echo $nvo->subject ?>" class="field" valiclass="required" req="3" valimessage="Title: This field is required!"  />
                                                </label> <span class="inputRequirement"><span class="style1">*</span></span>   </td>
                                              </tr>
 <?php
		//$dd = new PhotogalleryDAO();
		$list = $ndao->fetchSub(); 
		//print_r($list);
		$sn =0;
		foreach($list as $gallery)
		{
		//echo $gggi->subject;
		}
?>                                             <tr>
                                                <td align="left" class="text">Category :</td>
                                                <td class="main"  align="left">
<select name="cat">
<option value="0">New category </option>
	<?php
	//	$gallerydao = new PhotogalleryDAO();
//		$list = $gallerydao->fetchAll(); 
//		$sn =0;
		if(!empty($list)){
				foreach($list as $gallery){?>
				<option value="<?=$gallery->id?>" <?php if($sId==$gallery->id) echo "selected"; ?>><?php echo $gallery->subject;?> </option>

	<?php }}?>
</select></td>
                                              </tr>
                                              <tr>
                                                <td align="left" class="text">Photo By :</td>
                                                <td class="main"  align="left"><label>
                                                  <input type="text" name="pby" id="pby" value="<?php echo $nvo->pby ?>" class="field" />
                                                </label></td>
                                              </tr>
                                              <tr>
                                                <td align="left" class="text">Description :</td>
                                                <td class="main"  align="left">
												<textarea name="shortdescription" cols="30" rows="3" class="field" id="shortdescription" ><?php echo $nvo->shortdescription ?></textarea></td>
                                              </tr>
                                              <tr>
                                                <td align="left" class="text">File</td>
                                                <td class="main"  align="left"><input name="files" type="file" id="files" class="field"> <span class="style1">* Image Size: 500X500</span></td>
                                              </tr>
                                              	<?php if($nvo->files!=''){?>
												 <tr> 
													<td align="left" valign="middle" class="content"><b>File:</b></td>
													<td align="left" valign="middle" class="content">
													<img src="../images/uploaded/<?php echo $nvo->files;?> ?>" height="50" width="50"/></td>
												</tr>
												<?php }?>
                                              <tr>
                                                <td align="left" class="text">Status:</td>
                                                <td class="main"  align="left">
												<select name="is_archieve" id="is_archieve">
												<option value="1" <?php if($nvo->is_archieve == 1) echo "selected"; ?>  >Active</option>
												<option value="0" <?php if($nvo->is_archieve == 0) echo "selected"; ?>  >Deactive</option>
											 	 </select></td>
                                              </tr>
											   <tr>
                                                <td align="left" class="text">&nbsp;</td>
                                                <td class="main">&nbsp;</td>
                                              </tr>
                                            </tbody>
                                        </table></td>
                                      </tr>
                                    </tbody>
                                  </table></td>
					        </tr>
                              <tr> 
                                <td colspan="2"  align="left"><input type="hidden" name="save" id="save" value="true">
	<input type="hidden" name="id" id="id" value="<?php //echo $keynotesvo->id;?>">
	<input type="button" class="theader3" name="savebtn" id="savebtn" value="Save" onClick="this.form.save.value='true'; call_validate(this.form,0,this.form.length);"></td>
                              </tr>
                          </table>
						  <input type="hidden" name="register_posted" value="yes" id="register_posted" >
						  <?php
	 					if($function == 'add') {?><input type='hidden' name='function' value='add'><?php	}else{?>
						<input type='hidden' name='function' value='edit'><?php }?>
						   <input type="hidden" name="<? //=$_GET[action]?>" value="yes"/>
						   <input name="id" type="hidden" value="<? //if(!isset($_GET['act'])){ echo $rows['id']; } else { echo ''; }?>" <?// }?>>
						   <input type='hidden' name='pict' id='pict' value='<?php echo $nvo->files; ?>'>
                        </form></td>
                      <!-- body_text_eof //-->
                    </tr>
                  </tbody>
                </table>
                <!-- body_eof //-->
                <!-- footer //--></td>
            </tr>
          </tbody>
        </table>