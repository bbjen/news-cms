<?php
$t_id = $_REQUEST['nId'];
$function = $_GET['function'];

$nvo = new NewsletterVO();
if(isset($_GET['nId']) && intval($_GET['nId'])!=0)
		{
		$newsletterDAO = new NewsletterDAO();
		$id = intval($_GET['nId']);
		$nvo = $newsletterDAO->fetchDetails($id);
		}

$ndao = new NewsletterDAO();
//to check the permission of the particular person

if($function == 'add')
	{
	echo"<h2>Add News/Article</h2>";
	}
else 
	{
	echo "<h2>Edit News/Article</h2>";
	if ($_REQUEST['nId'])
		{
		$nvo = $ndao->fetchDetails($id);
		}
	}
// the different message for updating and adding the news
$updated_msg="<script language='javascript'>\nalert('News/Article has been Updated successfully.');\n location='index.php?p=newsletter';</script>\n";
$inserted_msg="<script language='javascript'>\nalert('News/Article has been Added successfully.');\n location='index.php?p=newsletter';\n</script>";
//print_r($_POST);
if($_POST)
	{
	
	$nvo->type = $_POST['type'];
	$nvo->breaking = $_POST['breaking'];
	$nvo->special = $_POST['special'];
	$nvo->normal = $_POST['normal'];
	$nvo->flash = $_POST['flash'];
	$nvo->name = $_POST['name'];
	$nvo->subject = $_POST['subject'];
	$nvo->shortdescription = $_POST['shortdescription'];
	$nvo->description = addslashes($_POST['description']);
	$nvo->files = $_FILES['files']['name']; 
	
	$nvo->published_date = $cur_time;
	$nvo->is_archieve = $_POST['is_archieve'];
	
	$nvo->formatInsertVariables();
	
	//validate the different fields
	if(!$nvo->subject)
		{
		$errmsg="Please Enter the subject.<br />";
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
			$nvo->files = "news_".$randval.".".$file_ext;
			//get the mime type of the picture
			$mimetype = $_FILES['files']['type'];
			//get the thumbnail height and width according to the size of the image using user defined function
			getThumbnailHeightAndWidth($mimetype,$_FILES['files']['tmp_name'],475,250,$thumb_w,$thumb_h);
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
             
                <table border="0" cellpadding="0" cellspacing="0" width="100%" align="center" >
                  <tbody>
                    <tr> 
                      <!-- body_text //-->
                      <td valign="top" width="100%">
					   <form name="addEditusers" id="addEditusers" enctype="multipart/form-data" action="" method="post">
                          <table width="100%" align="center">
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
                                <td colspan="2" align="left" class="main"><strong>News/Article    Form:</strong></td>
                            </tr>
							   <tr>
							     <td colspan="2" class="main"><table class="infoBox" border="0" cellpadding="2" cellspacing="1" width="100%">
                                    <tbody>
                                      <tr class="infoBoxContents"> 
                                        <td style="border: 1px solid #CCCCCC;">
										<table border="0" cellpadding="0" cellspacing="0" width="100%" >
                                            <tbody>
                                              <tr>
                                                <td width="119" align="left" class="text">&nbsp;</td>
                                                <td colspan="2"  align="left" class="main">&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td align="left" class="text">&nbsp;</td>
                                                <td colspan="2"  align="left" class="main">&nbsp;</td>
                                              </tr>
                                              
                                              <tr>
                                                <td align="left" class="text">Type :</td>
                                                <td colspan="2"  align="left" class="main"><label>
                                                  <select name="type" id="type">
                                                    <option <?php if($nvo->type == 'News') echo "selected"; ?>  >News</option>
                                                    <option <?php if($nvo->type == 'Society') echo "selected"; ?>>Society</option>
                                                    <option <?php if($nvo->type == 'Sports') echo "selected"; ?>>Sports</option>
                                                    <option <?php if($nvo->type == 'Economics') echo "selected"; ?>>Economics</option>
                                                    <option <?php if($nvo->type == 'Politics') echo "selected"; ?>>Politics</option>
                                                    <option <?php if($nvo->type == 'World News') echo "selected"; ?>>World News</option>
                                                    <option <?php if($nvo->type == 'Entertainment') echo "selected"; ?>>Entertainment</option>
                                                  </select>
                                                </label></td>
                                              </tr>
                                              <tr>
                                                <td align="left" class="text">News Options :</td>
                                                <td colspan="2"  align="left" class="main">&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td align="right" class="text">Breaking News</td>
                                                <td width="407"  align="left" class="main"><label>
                                                  <select name="breaking" id="breaking">
                                                   <option value="0" <?php if($nvo->breaking == 0) echo "selected"; ?>>No</option>
                                                    <option value="1" <?php if($nvo->breaking == 1) echo "selected"; ?>>Yes</option>
                                                                                                    </select>
                                                </label></td>
                                                <td width="452"  align="left" class="main">&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td align="right" class="text">Special News</td>
                                                <td colspan="2"  align="left" class="main"><label>
                                                  <select name="special" id="special">
                                                    <option value="0" <?php if($nvo->special == 0) echo "selected"; ?>>No</option>
                                                    <option value="1" <?php if($nvo->special == 1) echo "selected"; ?>>Yes</option>
                                                  </select>
                                                </label></td>
                                              </tr>
                                              <tr>
                                                <td align="right" class="text">Normal News</td>
                                                <td colspan="2"  align="left" class="main"><label>
                                                  <select name="normal" id="normal">
                                                   <option value="0">No</option>
                                                    <option value="1" <?php if($nvo->normal == 1) echo "selected"; ?>>Yes</option>
                                                   
                                                                                                                                                      </select>
                                                </label></td>
                                              </tr>
                                              <!--<tr>
                                                <td align="right" class="text">Flash News</td>
                                                <td colspan="2"  align="left" class="main">
                                                <label>
                                                  <select name="flash" id="flash">
                                                    <option value="1" <?php //if($nvo->flash == 1) echo "selected"; ?>>Yes</option>
                                                    <option value="0" <?php //if($nvo->flash == 0) echo "selected"; ?>>No</option>
                                                                                                                                                      </select>
                                                </label>
                                                </td>
                                              </tr>-->
                                              <tr>
                                                <td align="left" class="text">Auther :</td>
                                                <td colspan="2"  align="left" class="main"><label>
                                                  <input type="text" name="name" id="name" class="field" valiclass="required" req="2" valimessage="Auther:This field is required" value="<?php echo $nvo->name; ?>" />
                                                <span class="inputRequirement"><span class="style1">*</span></span></label></td>
                                              </tr>
                                              <tr> 
                                                <td align="left" class="text">Title :</td>
                                                <td colspan="2"  align="left" class="main">
												<textarea name="subject" cols="30" rows="3" class="field" id="subject" valiclass="required" req="2"  valimessage="Title:This field is required!
"><?php echo $nvo->subject ?></textarea>
											
                                                  &nbsp;<span class="inputRequirement"><span class="style1">*</span></span></td>
                                              </tr>
                                              <tr>
                                                <td align="left" class="text">Short Description :</td>
                                                <td colspan="2"  align="left" class="main">
												<textarea name="shortdescription" cols="30" rows="3" class="field" id="shortdescription" ><?php echo $nvo->shortdescription ?></textarea></td>
                                              </tr>
                                              <tr>
                                                <td align="left" class="text">Description :</td>
                                                <td colspan="2"  align="left" class="main">
												<?php
													include "fckeditor2/fckeditor.php";
													$oFCKeditor = new FCKeditor('description') ;
													$oFCKeditor->Width  = '100%' ;
													$oFCKeditor->Height = '420' ;
													$oFCKeditor->BasePath = 'fckeditor2/' ;
													$oFCKeditor->Value	=  $nvo->description;
													$oFCKeditor->Create() ;
												?>												</td>
                                              </tr>
                                              <tr>
                                                <td align="left" class="text">File</td>
                                                <td colspan="2"  align="left" class="main"><input name="files" type="file" id="files" class="field">
                                                  *Image should be 475X250</td>
                                              </tr>
                                              	<?php if($nvo->files!=''){?>
												 <tr> 
													<td align="left" valign="middle" class="content"><b>File:</b></td>
													<td colspan="2" align="left" valign="middle" class="content">
													<img src="../images/uploaded/<?php echo $nvo->files;?> ?>" height="50" width="50"/>											</td>
												</tr>
												<?php }?>
                                              <tr>
                                                <td align="left" class="text">Status:</td>
                                                <td colspan="2"  align="left" class="main">
												<select name="is_archieve" id="is_archieve">
												<option value="1" <?php if($nvo->is_archieve == 1) echo "selected"; ?>  >Active</option>
												<option value="0" <?php if($nvo->is_archieve == 0) echo "selected"; ?>  >Deactive</option>
											 	 </select></td>
                                              </tr>
											   <tr>
                                                <td align="left" class="text">&nbsp;</td>
                                                <td colspan="2" class="main">&nbsp;</td>
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