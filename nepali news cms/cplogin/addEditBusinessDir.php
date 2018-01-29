<?php
$t_id = $_REQUEST['nId'];
$function = $_GET['function'];
$catId= $_GET['catId'];

$nvo = new BusinessVO();
if(isset($_GET['nId']) && intval($_GET['nId'])!=0)
		{
		$newsletterDAO = new BusinessDAO();
		$id = intval($_GET['nId']);
		$nvo = $newsletterDAO->fetchDetails($id);
		}

$ndao = new BusinessDAO();
//to check the permission of the particular person

if($function == 'add')
	{
	echo"<h2>Add Business Directory</h2>";
	}
else 
	{
	echo "<h2>Edit Business Directory</h2>";
	if ($_REQUEST['nId'])
		{
		$nvo = $ndao->fetchDetails($id);
		}
	}
// the different message for updating and adding the news
$updated_msg="<script language='javascript'>\nalert('Selected Business Directory has been Updated successfully.');\n location='index.php?p=business';</script>\n";
$inserted_msg="<script language='javascript'>\nalert('Business Directory has been Added successfully.');\n location='index.php?p=business';\n</script>";
if($_POST)
	{
	
	$nvo->name = $_POST['name'];
	$nvo->cat = $_POST['cat'];
	$nvo->address = $_POST['address'];
	$nvo->location = $_POST['location'];
	$nvo->phone = $_POST['phone'];
	$nvo->fax = $_POST['fax'];
	$nvo->email = $_POST['email'];
	$nvo->url = $_POST['url'];
	$nvo->descs = $_POST['descs'];
	$nvo->features = $_POST['features'];
	$nvo->files = $_FILES['files']['name'];	
	$nvo->published_date = $cur_time;
	$nvo->is_archieve = $_POST['is_archieve'];	
	$nvo->formatInsertVariables();
	
	//echo $nvo->cat;

	
	//validate the different fields
	if(!$nvo->name){
		$errmsg="Please Enter the Company Name.<br />";
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
			$nvo->files = "business_".$randval.".".$file_ext;
			//get the mime type of the picture
			$mimetype = $_FILES['files']['type'];
			//get the thumbnail height and width according to the size of the image using user defined function
			getThumbnailHeightAndWidth($mimetype,$_FILES['files']['tmp_name'],235,165,$thumb_w,$thumb_h);
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
                                <td colspan="2" align="left" class="main"><strong>Business Directory    Form:</strong></td>
                            </tr>
							   <tr>
							     <td colspan="2" class="main"><table class="infoBox" border="0" cellpadding="2" cellspacing="1" width="100%">
                                    <tbody>
                                      <tr class="infoBoxContents"> 
                                        <td style="border: 1px solid #CCCCCC;">
										<table border="0" cellpadding="0" cellspacing="0" width="683" >
                                            <tbody>
                                              <tr>
                                                <td width="141" align="left" class="text">&nbsp;</td>
                                                <td width="542"  align="left" class="main">&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td align="left" class="text">Category :</td>
                                                <td class="main"  align="left">
                                                 <?php
		$list = $ndao->fetchSub(); 
		$sn =0;

?>
                                                <select name="cat" class="field">
                                                  <option value="0">New category </option>
                                                  <?php

		if(!empty($list)){
				foreach($list as $gallery){?>
                                                  <option value="<?=$gallery->id?>"<?php if($catId==$gallery->id) echo "selected"; ?>><?php echo $gallery->name;?></option>
                                                  <?php }}?>
                                                </select></td>
                                              </tr>
                                              
                                              <tr> 
                                                <td align="left" class="text">Title/Company Name :&nbsp;</td>
                                                <td class="main"  align="left"><label>
                                                  <input name="name" type="text" class="field" id="name" value="<?php echo $nvo->name ?>" size="40" valiclass="required" req="3" valimessage="Title: This field is required!"  />
                                                </label></td>
                                              </tr>

                                              <tr>
                                                <td align="left" class="text">Address :</td>
                                                <td class="main"  align="left">
												<textarea name="address" cols="35" rows="3" class="field" id="address"  ><?php echo $nvo->address ?></textarea></td>
                                              </tr>
                                              <tr>
                                                <td align="left" class="text">Location:</td>
                                                <td class="main"  align="left"><label>
                                                  <input name="location" type="text" class="field" value="<?php echo $nvo->location ?>" id="location" size="40"  />
                                                </label></td>
                                              </tr>
                                              <tr>
                                                <td align="left" class="text">Phone No.:</td>
                                                <td class="main"  align="left"><label>
                                                  <input name="phone" type="text" value="<?php echo $nvo->phone ?>" class="field" id="phone" size="40"  />
                                                </label></td>
                                              </tr>
                                              <tr>
                                                <td align="left" class="text">Fax No.:</td>
                                                <td class="main"  align="left"><label>
                                                  <input name="fax" type="text" class="field" id="fax" value="<?php echo $nvo->fax ?>" size="40"  />
                                                </label></td>
                                              </tr>
                                              <tr>
                                                <td align="left" class="text">Email</td>
                                                <td class="main"  align="left"><label>
                                                  <input name="email" type="text" id="email" class="field" value="<?php echo $nvo->email ?>" size="40"  />
                                                </label></td>
                                              </tr>
                                              
												 <tr> 
													<td align="left" valign="middle" class="content">URL</td>
													<td align="left" valign="middle" class="content"><label>
													  <textarea name="url" cols="30" rows="3" class="field" id="url" 
"><?php if($nvo->url!="") echo $nvo->url; else echo "http://";?>
													  </textarea>
												    <span class="style1">*Specify with <strong>http://</strong> (eg.http://globalwebmatrix.net/)</span></label></td>
												</tr>
												 <tr>
												   <td align="left" class="text">Company Description:</td>
												   <td class="main"  align="left"><label>
												   <textarea name="descs" id="descs" cols="35" rows="3" class="field"><?php echo $nvo->descs; ?> </textarea>
											       </label></td>
										      </tr>
												 <tr>
												   <td align="left" class="text">Featues:</td>
												   <td class="main"  align="left"><label>
												     <select name="features" id="features">
												       <option value="0" <?php if($nvo->features == 0) echo "selected"; ?>>No</option>
												       <option value="1" <?php if($nvo->features == 1) echo "selected"; ?>>Yes</option>
											         </select>
												    Category display in front page</label></td>
										      </tr>
												 <tr>
												   <td align="left" class="text">Image</td>
												   <td class="main"  align="left"><input name="files" type="file" id="files" class="field" />
											       image should be 235x165</td>
										      </tr>
                                              <tr>
                                                <td align="left" class="text">Status:</td>
                                                <td class="main"  align="left">
												<select name="is_archieve" id="is_archieve" class="field">
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