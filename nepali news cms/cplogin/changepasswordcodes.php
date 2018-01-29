<?php
session_start();
require_once "../mvpincludes/db_connection.php";

if(isset($_POST['save']) && $_POST['save']=='true')
	{
	$previouspassword = $_POST['previous_password'];
	$newpassword = $_POST['newpassword'];
	$admin_id = $_SESSION['admin_id'];
	
	$dao = new AdminsDAO();
	$vo = $dao->fetchDetails($admin_id);
	if($vo->id != 0)
		{
		if(md5($previouspassword) != $vo->password)
			$msg = "Your existing password is incorrect.";
		else
			{
			if($dao->changePassword(md5($newpassword), $admin_id))
				$msg = "Your new password has been saved.";
			else
				$msg = "Some error prevented your new password from being saved.";
			}
		}
	else
		$msg = "Some error prevented your new password from being saved.";
	
	header("Location: index.php?p=changepassword&msg=".$msg);
	}
else
	echo "inside else";
?>
