<?php
function __autoload($class)
	{
	$url = $_SERVER['REQUEST_URI'];
	$arr = explode("/",$url);
	if(in_array("cplogin", $arr))
		$relativepath = "../";
	/*elseif(in_array("en", $arr))
		$relativepath = "../";
	elseif(in_array("de", $arr))
		$relativepath = "../";
	else
		$relativepath = "";*/
		
		//echo $relativepath;
		//echo $relativepath."mvpclasses/".$class.".class.php";
		require_once $relativepath."classes/".$class.".class.php";
	}
	
	
$server_type = "live";

if($server_type == "live")
	{
	$SERVER	=	"localhost";
	$DB_USER = "web103-ok";
	$DB_PASS	=	"oknepal2010101";
	
	
	$DB_DATABASE	=	"web103-ok";
	}
else
	{	
	$SERVER = "localhost";
	$DB_USER	=	"web103-ok";
	$DB_PASS	=	"oknepal2010101";
	

	
	$DB_DATABASE	=	"db_mailnepal";

	}
	
$ado=new BaseDAO($SERVER, $DB_USER, $DB_PASS, $DB_DATABASE);

	try
	{		
		$ado->dbConnect();
	}
	catch(Exception $e)
		{
			if($e->getCode() == BaseDAO::CONNECTION_ERROR)
				die($e->getMessage());
		}
?>