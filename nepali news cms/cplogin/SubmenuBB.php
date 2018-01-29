<?php
		if(isset($_REQUEST['mainmenu']) && intval($_REQUEST['mainmenu'])!=0){
			print "aa";
			$mainmenuDAO = new MainMenuDAO();
			$id = intval($_REQUEST['mainmenu']);
			
			
			$s_id = intval($_REQUEST['submenu']);
			
			$hassubmenu = $mainmenuDAO->hasSubmenus($id);
			$hassubmenu1 = $mainmenuDAO->hasSubmenus1($s_id);
			
			print 's1'.$hassubmenu." ".'s2'.$hassubmenu1;
			
			
			
			if(!$hassubmenu && !$hassubmenu1){
				$showform = true;
			}elseif((isset($_REQUEST['submenu']) && intval($_REQUEST['submenu'])!=0) && (isset($_REQUEST['submenu1']) && intval($_REQUEST['submenu1'])!=0)){
				
				$showform = true;
				$hassubmenu = true;
				$hassubmenu1 = true;
			}
			
			
					
			
			
			
		}
		else{
			$showform = false;
			$hassubmenu = false;
			$hassubmenu1 = false;
		}
		print $showform;
?>

<fieldset>
<legend class="ptitle">Manage Content</legend>
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
			  <td colspan="2" align="left" class="medium">&nbsp;</td>
		  </tr>
			<tr>
				<td width="22%" class="medium" align="left">Main Menu:&nbsp;
				  <select name="mainmenu" id="mainmenu" class="field" onchange="this.form.submit();">
				    <option value="">Select</option>
				    <?php
						$mainmenuDAO = new MainMenuDAO();
						$subDAO = new SubMenuDAO();
						
						$list = $mainmenuDAO->fetchAll("all");
						if(!empty($list))
							foreach($list as $mainmenu)
								{
								$sublist = $subDAO->fetchAll($mainmenu->id, "content");
								$subcount = count($sublist);
								
									if($mainmenu->has_content=='yes' || ($mainmenu->has_content=='no' && $subcount > 0))
										{
											if($mainmenu->id == $_REQUEST['mainmenu'])
												echo "<option value='".$mainmenu->id."' selected>".$mainmenu->title."</option>";
											else
												echo "<option value='".$mainmenu->id."'>".$mainmenu->title."</option>";
										}
								}
						?>
		        </select></td>
				
				<?php
				if($hassubmenu)//hasmenu flag gets true if main menu has submenus.
					{
					?>
					<td width="25%" class="medium" align="left">Submenu:&nbsp;
						<select name="submenu" id="submenu" class="field" onChange="this.form.submit();">
							<option value="">Select</option>
							<?php
							$submenuDAO = new SubMenuDAO();
							$list = $submenuDAO->fetchAll($_REQUEST['mainmenu'],"content");
							if(!empty($list))
								foreach($list as $submenu)
									{
									if($submenu->id == $_REQUEST['submenu'])
										echo "<option value='".$submenu->id."' selected>".$submenu->title."</option>";
									else
										echo "<option value='".$submenu->id."'>".$submenu->title."</option>";
									}
							?>
						</select>				  </td>
                        
                         <?php
				  }
                       
					if($hassubmenu1)//hasmenu flag gets true if main menu has submenus.
					{
					?>
					<td width="25%" class="medium" align="left">Submenu1:&nbsp;
						<select name="submenu1" id="submenu1" class="field" onChange="this.form.submit();">
							<option value="">Select</option>
							<?php
							$submenuDAO = new SubMenuDAO();
							$list = $submenuDAO->fetchAll1($_REQUEST['submenu'],"content");
							if(!empty($list))
								foreach($list as $submenu)
									{
									if($submenu->id == $_REQUEST['submenu1'])
										echo "<option value='".$submenu->id."' selected>".$submenu->title."</option>";
									else
										echo "<option value='".$submenu->id."'>".$submenu->title."</option>";
									}
							?>
		  </select>				  </td>
					
				 
				  
				  <?php
				  }
				  ?>
			</tr>
			<tr>
			  <td class="medium" align="left">&nbsp;</td>
			  <td colspan="2" align="left" class="medium">&nbsp;</td>
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
	
	if($showform)
		{
		include_once "addEditContent.php";
		}
	?>
</div>