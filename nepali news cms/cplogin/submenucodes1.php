<?php
	include "../includes/db_connection.php";
	
	if(isset($_POST['save']) && $_POST['save']=='true'){
		$vo = new SubMenu1VO();
		$dao = new SubMenu1DAO();
		
		$vo->id = $_POST['id'];
		$vo->submenu_id = $_POST['submenu_id'];
		$vo->title = $_POST['title'];
		$vo->menu_order = $_POST['menu_order'];
		$vo->has_content = $_POST['has_content'];
		
		//echo $vo->id;
//		echo $vo->submenu_id;
//		echo $vo->title;
//		echo $vo->menu_order;
//		echo $vo->has_content;
		//exit;
		
		$vo->formatInsertVariables();
		
		if($vo->id == 0){//add new since id is zero
			if($dao->insert($vo))
				$msg = "New submenu has been successfully inserted.";
			else
				$msg = "Some error prevented new submenu from being inserted.";
		}
		else{//update the row with this id
			if($dao->update($vo))
				$msg = "Selected submenu has been successfully updated.";
			else
				$msg = "Some error prevented submenu from updating.";
		}
		header("Location:index.php?p=submenu1&m=".$_POST['submenu_id']."&msg=".$msg);
	}
?>