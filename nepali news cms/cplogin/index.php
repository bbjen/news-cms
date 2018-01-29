<?php
session_start();
require_once "loginchecker.php";
require_once "inc/pageFinder.php";
require_once "../includes/db_connection.php";
require_once "../includes/functions.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to okaytimes.com Admin Panel</title>
<link href="style/global-style.css" rel="stylesheet" type="text/css" />
<link href="style/styles.css" rel="stylesheet" type="text/css" />
<link href="style/styless.css" rel="stylesheet" type="text/css" />
<link href="style/tic_styles.css" rel="stylesheet" type="text/css" />
<link href="style/jquery-calendar.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" language="javascript" src="../includes/functions.js"></script>
<script type="text/javascript" language="javascript" src="../includes/jquery.js"></script>
<script type="text/javascript" language="javascript" src="../includes/ajx.js"></script>
<script type="text/javascript" language="javascript" src="../includes/layer.js"></script>
<script type="text/javascript" src="../includes/jquery-calendar.js"></script>
<script language="javascript1.2" src="../includes/doAjax.js"></script>
<script language="javascript1.2" src="../js/topics-layer.js"></script>

</head>
<body >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <!--header starts-->
  <tr>
    <td width="100%" style="background:#efefef;"><? include_once("inc/header.php"); ?></td>
  </tr>
  <!--header ends-->
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <!--@left navigation-->
    <td width="198" id="l-colm" valign="top" style="background:#f9f9f9;"><? include_once("inc/l-colm.php"); ?></td>
	<!--@left navigation-->
    <td style="vertical-align:top; padding:5px 15px 15px 15px; text-align:left">
	<!--@content starts-->
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	<?php include_once $includepage; ?>
	</td>
  </tr>
</table>
<!--@content Ends--></td>
  </tr>
</table></td>
  </tr>
 <!-- @footer starts-->
  <tr>
    <td><? include_once("inc/footer.php"); ?></td>
  </tr>
   <!-- @footer ends-->
</table>
</body>
</html>
