<?php
include_once "../includes/db_connection.php";
if(isset($_POST['saveContent']) && $_POST['saveContent']=='true'){
	$vo = new lftContentVO();
	$dao = new lftContentDAO();
	
	$vo->id = $_POST['id'];
	$vo->content = $_POST['lftmenu'];
	$vo->page_title = $_POST['page_title'];
	$vo->page_metatag = $_POST['page_metatag'];
	$vo->page_keywords = $_POST['page_keywords'];
	$vo->page_heading = $_POST['page_heading'];
	$nvo->description = addslashes($_POST['description']);
	//$vo->published_date;
	
	$vo->formatInsertVariables();
	if($vo->id == 0)
		{
		$vo->created_date = date("Y-m-d");
		if($dao->insert($vo))
			$msg = "New content has been successfully inserted.";
		else
			$msg = "Some error prevented new content from being saved.";
		}
	else
		{
		if($dao->update($vo))
			$msg = "Selected content has been successfully updated.";
		else
			$msg = "Some error prevented content from being updated.";
		
		}
	header("Location: index.php?p=leftcontent&msg=".$msg);	
	}
?>