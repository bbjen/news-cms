<?php
	if(isset($_REQUEST['mainmenu']) && intval($_REQUEST['mainmenu'])!=0)
		{
		$mainmenuDAO = new PhotogalleryDAO();
		
		$cat = intval($_REQUEST['mainmenu']);
		$hassubmenu = $mainmenuDAO->hasdata($cat);
		print_r("$hassubmenu = $mainmenuDAO->hasdata($id)");
		if(!$hassubmenu)
			$showform = true;
		elseif(isset($_REQUEST['submenu']) && intval($_REQUEST['submenu'])!=0)
			{
			$showform = true;
			$hassubmenu = true;
			}
		}
	else
		{
		$showform = false;
		$hassubmenu = false;
		}
?>
<fieldset>
<legend class="ptitle">Manage Photo Gallery</legend>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="24%" class="ptitle"><strong>
    <h1></h1>
    </strong></td>
    <td width="76%" class="medium"><font color="#cc0000"><?php echo $_GET['msg'];?></font></td>
  </tr>
  
  <tr>
    <td colspan="2">
	<form name="categoryForm" id="categoryForm" action="" method="post">
		<table width="100%" cellpadding="0" cellspacing="0" border="0"   style="border:1px solid #ccc;">
			<tr>
			  <td class="medium" align="left">&nbsp;</td>
			  <td class="medium" align="left">&nbsp;</td>
		  </tr>
			<tr>
				<td width="22%" class="medium" align="left">Main Category:&nbsp;
					<select name="mainmenu" id="mainmenu" class="field" onChange="this.form.submit();">
						<option value="">New Category</option>
						<?php
						$mainmenuDAO = new PhotogalleryDAO();
								
						$list = $mainmenuDAO->fetchAllSub();
						if(!empty($list))
							foreach($list as $mainmenu)
								{
								$sublist = $mainmenuDAO->fetchSub($mainmenu->cat);
								$subcount = count($sublist);
						
									if($mainmenu->cat=='0' && $subcount > 0)
										{
											if($mainmenu->id == $_REQUEST['mainmenu'])
											
												echo "<option value='".$mainmenu->cat."' selected>".$mainmenu->subject."</option>";
												//echo "ho";
											else
												echo "<option value='".$mainmenu->cat."'>".$mainmenu->subject."</option>";
												//echo "hoina";
										}
								}
						?>
					</select>			  </td>
				
				<?php
				if($hassubmenu)//hasmenu flag gets true if main menu has submenus.
					{
					?>
					<td width="78%" class="medium" align="left">Submenu:&nbsp;
						<select name="submenu" id="submenu" class="field" onChange="this.form.submit();">
							<option value="">Select</option>
							<?php
							$submenuDAO = new PhotogalleryDAO();
							$list = $submenuDAO->fetchAll($_REQUEST['mainmenu']);
							if(!empty($list))
								foreach($list as $submenu)
									{
									if($submenu->id == $_REQUEST['submenu'])
										echo "<option value='".$submenu->cat."' selected>".$submenu->subject."</option>";
									else
										echo "<option value='".$submenu->cat."'>".$submenu->subject."</option>";
									}
							?>
						</select>				  </td>
				  <?php
				  }
				  ?>
			</tr>
			<tr>
			  <td class="medium" align="left">&nbsp;</td>
			  <td class="medium" align="left">&nbsp;</td>
		  </tr>
		</table>
	</form>
	</td>
  </tr>
</table>
</fieldset>
<br/>
<div align="right">
	<?php
		if($showform){
			include_once "addPhotogallery.php";
	}
	?>
</div>