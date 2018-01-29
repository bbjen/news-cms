<?php
include_once "../includes/db_connection.php";

if(isset($_POST['saveContent']) && $_POST['saveContent']=='true'){
	$vo = new ContentVO();
	$dao = new ContentDAO();
	
	$vo->id = $_POST['id'];
	$vo->submenu_id = $_POST['submenu_id'];
	$vo->menu_id = $_POST['menu_id'];
	$vo->parent_menu_id = $_POST['parent_menu_id'];
	$vo->content =  addslashes($_POST['content']);
	$vo->page_title = $_POST['page_title'];
	$vo->page_metatag = $_POST['page_metatag'];
	$vo->page_keywords = $_POST['page_keywords'];
	$vo->page_description = $_POST['page_description'];
	$vo->page_heading = $_POST['page_heading'];
	$vo->updated_date = date("Y-m-d");
	$vo->created_date;
	
	$vo->formatInsertVariables();
	if($vo->id == 0){
		$vo->created_date = date("Y-m-d");
		if($dao->insert($vo))
			$msg = "New content has been successfully inserted.";
		else
			$msg = "Some error prevented new content from being saved.";
	}
	else{
		if($dao->update($vo))
			$msg = "Selected content has been successfully updated.";
		else
			$msg = "Some error prevented content from being updated.";
	}
	header("Location: index.php?p=content&msg=".$msg);	
	}
?>