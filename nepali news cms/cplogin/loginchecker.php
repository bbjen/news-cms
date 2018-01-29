<?php
session_start();
if(isset($_SESSION['admin']) && $_SESSION['admin']!="" && $_SESSION['auth']=='true' && isset($_SESSION['admin_id']) && intval($_SESSION['admin_id'])!=0)
	{
	
	}
else
	header("Location: loginpage.php");
?>