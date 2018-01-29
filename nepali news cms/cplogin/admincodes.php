<?php
require_once "../mvpincludes/db_connection.php";

if(isset($_POST['save']) && $_POST['save']=='true')
	{
	$vo = new AdminsVO();
	$dao = new AdminsDAO();
	
	$vo->id = $_POST['id'];
	$vo->login = $_POST['login'];
	
	if($_POST['password']!="")
		$vo->password = md5(trim($_POST['password']));
	else
		$vo->password = $_POST['oldPassword'];
	
	$vo->email = $_POST['email'];
	$vo->status = $_POST['status'];
	$vo->created_date = date("Y-m-d H:i:s");
	
	$vo->formatInsertVariables();
	
	if($vo->id == 0)
		{
		if($dao->insert($vo))
			{
			$id = $dao->insert_id();
			$msg = "New admin user has been created.";
			}
		else
			$msg = "Error occured while creating new admin user.";
		}
	else
		{
		if($dao->update($vo))
			$msg = "Selected admin user has been updated.";
		else
			$msg = "Error occured while updating selected admin user.";
		
		$id = $vo->id;
		}
	
	header("Location:index.php?p=adminuser&id=".$id."&msg=".$msg);
	}
?>