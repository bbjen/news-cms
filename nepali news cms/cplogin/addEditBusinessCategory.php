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
if($_POST){
	$nvo->name = $_POST['name'];
	$nvo->features = $_POST['features'];
	$nvo->published_date = $cur_time;
	$nvo->is_archieve = $_POST['is_archieve'];	
	$nvo->formatInsertVariables();	
	
	//validate the different fields
	if(!$nvo->name){
		$errmsg="Please Enter the Company Name.<br />";
	}
	if(!$errmsg){ //if the form is posted and there is no error at all
		if($_GET['nId']){
			if($ndao->update1($nvo))
				echo $updated_msg;
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
                                            <TD width="57%"  align="center" class="pageHeading">&nbsp;</TD>
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
                                                <td align="left" class="text">&nbsp;</td>
                                                <td class="main"  align="left">&nbsp;</td>
                                              </tr>
                                              
                                              <tr> 
                                                <td align="left" class="text">Category Name :&nbsp;</td>
                                                <td class="main"  align="left"><label>
                                                  <input name="name" type="text" class="field" id="name" value="<?php echo $nvo->name ?>" size="40" valiclass="required" req="3" valimessage="Title: This field is required!"  />
                                                </label></td>
                                              </tr>
 <?php
		$list = $ndao->fetchSub(); 
		$sn =0;

?>
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