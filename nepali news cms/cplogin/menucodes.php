<?php
include "../includes/db_connection.php";
	
	if(isset($_POST['save']) && $_POST['save']=='true')
		{
		$vo = new MainMenuVO();
		$dao = new MainMenuDAO();
		
		$vo->id = $_POST['id'];
		$vo->title = $_POST['title'];
		$vo->menu_order = $_POST['menu_order'];
		$vo->location = $_POST['location'];
		$vo->has_content = $_POST['has_content'];
		
		$vo->formatInsertVariables();
		
		if($vo->id == 0)//add new since id is zero
			{
			if($dao->insert($vo))
				$msg = "New menu has been successfully inserted.";
			else
				$msg = "Some error prevented new menu from being inserted.";
			}
		else//update the row with this id
			{
			if($dao->update($vo))
				$msg = "Selected menu has been successfully updated.";
			else
				$msg = "Some error prevented menu from updating.";
			}
		header("Location:index.php?p=menu&msg=".$msg);
		}
?>