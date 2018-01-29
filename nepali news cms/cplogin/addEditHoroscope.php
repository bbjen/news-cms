<?php
$t_id = $_REQUEST['nId'];
$function = $_GET['function'];

$nvo = new HoroscopeVO();
if(isset($_GET['nId']) && intval($_GET['nId'])!=0)
		{
		$newsletterDAO = new HoroscopeDAO();
		$id = intval($_GET['nId']);
		$nvo = $newsletterDAO->fetchDetails($id);
		}

$ndao = new HoroscopeDAO();
//to check the permission of the particular person

if($function == 'add'){
	echo"<h2>Add Horoscope</h2>";
	}
else{
	echo "<h2>Edit Horoscope</h2>";
	if ($_REQUEST['nId'])
		{
		$nvo = $ndao->fetchDetails($id);
		}
	}
// the different message for updating and adding the news
$updated_msg="<script language='javascript'>\nalert('Selected Horoscope has been Updated successfully.');\n location='index.php?p=horoscope';</script>\n";
$inserted_msg="<script language='javascript'>\nalert('Horoscope has been Added successfully.');\n location='index.php?p=horoscope';\n</script>";
if($_POST)
	{
	
	$nvo->name = $_POST['name'];
	$nvo->descs = $_POST['descs'];
	$nvo->stars = $_POST['stars'];
	$nvo->dates = $cur_time;
	
	$nvo->formatInsertVariables();
	
	//validate the different fields
	if(!$nvo->descs)
		{
		$errmsg="Please Enter some text.<br />";
		}
	
	if(!$errmsg) //if the form is posted and there is no error at all
		{
		if($_GET['nId']) 
			{
			if($ndao->update($nvo))
				//echo "hell";
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
                                <td colspan="2" align="left" class="main"><strong>Horoscope Form:</strong></td>
                            </tr>
							   <tr>
							     <td colspan="2" class="main"><table class="infoBox" border="0" cellpadding="2" cellspacing="1" width="100%">
                                    <tbody>
                                      <tr class="infoBoxContents"> 
                                        <td style="border: 1px solid #CCCCCC;">
										<table border="0" cellpadding="0" cellspacing="0" width="683" >
                                            <tbody>
                                              <tr>
                                                <td width="174" align="left" class="text">&nbsp;</td>
                                                <td width="461"  align="left" class="main">&nbsp;</td>
                                              </tr>
                                              <tr>
                                                <td align="left" class="text">&nbsp;</td>
                                                <td class="main"  align="left">&nbsp;</td>
                                              </tr>
 <?php
		//$dd = new PhotogalleryDAO();
		
		
?>                                             <tr>
                                                <td align="left" class="text">Zodiac :</td>
                                                <td class="main"  align="left">
<select name="name" id="name">
	<?php $list = $ndao->fetchSub(); 	
		if(!empty($list)){
				foreach($list as $gallery){?>
				<option  value="<?=$gallery->name?>"<?php if($nvo->name == $gallery->name) echo "selected"; ?>><?php echo $gallery->name ;?> </option>

	<?php }}?>
</select></td>
                                              </tr>
                                              <tr>
                                                <td align="left" class="text">Descriptions :</td>
                                                <td class="main"  align="left">
												<textarea name="descs" cols="30" rows="3" class="field" id="descs" valiclass="required" req="3" valimessage="Description: This field is required!"><?php echo $nvo->descs; ?></textarea>
												*
													</td>
                                              </tr>
											   <tr>
                                                <td align="left" class="text">Stars</td>
                                                <td class="main"><label>
                                                  <select name="stars" id="stars">
                                                    <option <?php if($nvo->stars == '5') echo "selected"; ?>>5</option>
                                                    <option <?php if($nvo->stars == '4') echo "selected"; ?>>4</option>
                                                    <option <?php if($nvo->stars == '3') echo "selected"; ?>>3</option>
                                                    <option <?php if($nvo->stars == '2') echo "selected"; ?>>2</option>
                                                    <option <?php if($nvo->stars == '1') echo "selected"; ?>>1</option>
                                                  </select>
                                                </label></td>
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
						   <input type='hidden' name='pict' id='pict' value='<?php //echo $nvo->files; ?>'>
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