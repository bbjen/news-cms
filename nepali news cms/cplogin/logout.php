<?php
session_start();
require_once "../includes/db_connection.php";
$admin_id = intval($_SESSION['admin_id']);
$logintime =  $_SESSION['logintime'];

$adminsdao = new AdminsDAO();
if($admin_id != 0 && $logintime != "")
	$adminsdao->updateLastLogin($admin_id, $logintime);

unset($_SESSION['admin_id']);
unset($_SESSION['admin']);
unset($_SESSION['auth']);
unset($_SESSION['logintime']);
unset($_SESSION['lastlogin']);

header("Location: loginpage.php");
?>