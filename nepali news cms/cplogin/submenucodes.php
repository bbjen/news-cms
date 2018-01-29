<?php
include "../includes/db_connection.php";
	
	if(isset($_POST['save']) && $_POST['save']=='true')
		{
		$vo = new SubMenuVO();
		$dao = new SubMenuDAO();
		
		$vo->id = $_POST['id'];
		$vo->mainmenu_id = $_POST['parent_menu_id'];
		$vo->title = $_POST['title'];
		$vo->menu_order = $_POST['menu_order'];
		$vo->has_content = $_POST['has_content'];
		
		$vo->formatInsertVariables();
		
		if($vo->id == 0)//add new since id is zero
			{
			if($dao->insert($vo))
				$msg = "New submenu has been successfully inserted.";
			else
				$msg = "Some error prevented new submenu from being inserted.";
			}
		else//update the row with this id
			{
			if($dao->update($vo))
				$msg = "Selected submenu has been successfully updated.";
			else
				$msg = "Some error prevented submenu from updating.";
			}
		header("Location:index.php?p=submenu&m=".$_POST['parent_menu_id']."&msg=".$msg);
		}
?>