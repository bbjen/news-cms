<?php
	$back_advert_pic_dir="../images/uploaded/advertisment/tmp/";
	$dest_path_left="../images/uploaded/advertisment/left/";
	$dest_path_thumb_right="../images/uploaded/advertisment/right/";
	$dest_path_thumb_middle="../images/uploaded/advertisment/middle/";
	$dest_path_thumb_footer="../images/uploaded/advertisment/footer/";
$t_id = $_REQUEST['nId'];
$function = $_GET['function'];

	
$nvo = new AdvertisementVO();
if(isset($_GET['nId']) && intval($_GET['nId'])!=0)
		{
		$newsletterDAO = new AdvertisementDAO();
		$id = intval($_GET['nId']);
		$nvo = $newsletterDAO->fetchDetails($id);
		}

$ndao = new AdvertisementDAO();
//to check the permission of the particular person

if($function == 'add')
	{
	echo"<h2>Add Advertisement</h2>";
	}
else 
	{
	echo "<h2>Edit Advertisement</h2>";
	if ($_REQUEST['nId'])
		{
		$nvo = $ndao->fetchDetails($id);
		}
	}
// the different message for updating and adding the news
$updated_msg="<script language='javascript'>\nalert('Advertisement has been Updated successfully.');\n location='index.php?p=advertisement';</script>\n";
$inserted_msg="<script language='javascript'>\nalert('Advertisement has been Added successfully.');\n location='index.php?p=advertisement';\n</script>";
//print_r($_POST);
//exit;
if($_POST){
	
	$nvo->name = $_POST['name'];
	$nvo->url = $_POST['url'];
	$nvo->files = $_FILES['files']['name']; 
	
	$nvo->published_date = $cur_time;
	$nvo->is_archieve = $_POST['is_archieve'];
	$nvo->location = $_POST['location'];
	
	$nvo->formatInsertVariables();
	
	//validate the different fields
	if(!$nvo->url)
		{
		$errmsg="Please Enter the url.<br />";
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
			$pic_tmp=$_FILES['files']['tmp_name'];
			$parts=explode(".",$nvo->files );
			$size=sizeof($parts);
			$ext=$parts[$size-1];
			
			    srand(make_seed());
				$randval = rand();	
				$nvo->files = "advertisement_".$randval.".".$ext;
				//get the random name for the file
				//$filename1="advert".$randval.".".$ext;
				//$filename2="advert_right".$randval.".".$ext;
				//$filename3="advert_middle".$randval.".".$ext;
				//$filename4="advert_ooter".$randval.".".$ext;
				//$picture_left=$filename1;
				//$picture_thumb_right=$filename2;
				//$picture_thumb_middle=$filename3;
				//$picture_thumb_footer=$filename4;
				//get the mime type of the picture
				$mimetype=$_FILES['files']['type'];
				move_uploaded_file($pic_tmp,$back_advert_pic_dir.$nvo->files);
				Create_ThumbNail($back_advert_pic_dir.$nvo->files,$mimetype, $back_advert_pic_dir, 273, 75,$nvo->files,$dest_path_left);
				Create_ThumbNail($back_advert_pic_dir.$nvo->files,$mimetype, $back_advert_pic_dir, 205, 77,$nvo->files,$dest_path_thumb_right);
				Create_ThumbNail($back_advert_pic_dir.$nvo->files,$mimetype, $back_advert_pic_dir, 140, 90,$nvo->files,$dest_path_thumb_middle);
				Create_ThumbNail($back_advert_pic_dir.$nvo->files,$mimetype, $back_advert_pic_dir, 500, 175,$nvo->files,$dest_path_thumb_footer);
				unlink($back_advert_pic_dir.$nvo->files);
			
			//srand(make_seed());
			//$randval = rand();
			//concat the random value to the file name to avoid duplicate filen name
			//$nvo->files = "advertisement_".$randval.".".$file_ext;
			//get the mime type of the picture
			//$mimetype = $_FILES['files']['type'];
			//get the thumbnail height and width according to the size of the image using user defined function
			//getThumbnailHeightAndWidth($mimetype,$_FILES['files']['tmp_name'],235,165,$thumb_w,$thumb_h);
			//make the thumbnail for the home page
			//$nvo->thumbnailAndUpload($mimetype,$_FILES['files']['tmp_name'],$nvo->files,$thumb_w,$thumb_h);
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
                                <td colspan="2" align="left" class="main"><strong>Advertisement Form:</strong></td>
                            </tr>
							   <tr>
							     <td colspan="2" class="main"><table class="infoBox" border="0" cellpadding="2" cellspacing="1" width="100%">
                                    <tbody>
                                      <tr class="infoBoxContents"> 
                                        <td style="border: 1px solid #CCCCCC;">
										<table border="0" cellpadding="0" cellspacing="0" width="758" >
                                            <tbody>
                                              <tr>
                                                <td width="173" align="left" class="text">&nbsp;</td>
                                                <td width="585"  align="left" class="main">&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td align="left" class="text">&nbsp;</td>
                                                <td class="main"  align="left">&nbsp;</td>
                                              </tr>
                                              
                                              <tr>
                                                <td align="left" class="text">Organization Name :</td>
                                                <td class="main"  align="left"><label>
                                                <input type="text" name="name" id="name" class="field" valiclass="required" req="2" valimessage="Name:This field is required" value="<?php echo $nvo->name; ?>" />
                                                 <span class="inputRequirement"><span class="style1">*</span></span></label></label></td>
                                              </tr>
                                              <tr> 
                                                <td align="left" class="text">URL :</td>
                                                <td class="main"  align="left">
												<textarea name="url" cols="30" rows="3" class="field" id="url" 
"><?php if($nvo->url!="") echo $nvo->url; else echo "http://";?></textarea>							
                                                  &nbsp;<span class="inputRequirement"><span class="style1">*Specify with <strong>http://</strong> (eg.http://globalwebmatrix.net/)</span></span></td>
                                              </tr>
                                              <tr>
                                                <td align="left" class="text">File</td>
                                                <td class="main"  align="left"><input name="files" type="file" id="files" class="field"></td>
                                              </tr>
                                              	<?php if($nvo->files!=''){?>
												 <tr> 
													<td align="left" valign="middle" class="content"><b>File:</b></td>
													<td align="left" valign="middle" class="content">
													<?php /*?><img src="../images/uploaded/uploadTestimonial/<?php echo $nvo->files;?> ?>"/><?php */?>													</td>
												</tr>
												 
												<?php }?>
                                                <tr>
												   <td align="left" valign="middle" class="content">location</td>
												   <td align="left" valign="middle" class="content">
                                                   <select name="location" id="location">
												     <option value="Left-Top" <?php if($nvo->location == Left-Top) echo "selected"; ?> selected="selected"  >Left-Top</option>
                                                     <option value="Left-Middle" <?php if($nvo->location == Left-Middle) echo "selected"; ?>  >Left-Middle</option>
                                                     <option value="Left-Bottom" <?php if($nvo->location == Left-Bottom) echo "selected"; ?>  >Left-Bottom</option>
                                                     <option value="Right-Top" <?php if($nvo->location == Right-Top) echo "selected"; ?>  >Right-Top</option>
                                                     <option value="Right-Middle" <?php if($nvo->location == Right-Middle) echo "selected"; ?>  >Right-Middle</option>
												     <option value="Right-Bottom" <?php if($nvo->location == Right-Bottom) echo "selected"; ?>  >Right-Bottom</option>
												     <option value="Middle" <?php if($nvo->location == Middle) echo "selected"; ?>  >Middle</option>
												    
                                                      
                                                       <option value="Bottom" <?php if($nvo->location == Bottom) echo "selected"; ?>  >Bottom</option>
											       </select> 
                                                   <span class="style1">* <strong>Left: </strong>273X75 <strong> Right:</strong> 205X77 <strong>Middle:</strong> 140X90 <strong>Bottom:</strong> 500X175</span></span></td>
										      </tr>
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
                                                <td class="main"></td>
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