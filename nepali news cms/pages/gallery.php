<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery-1.2.1.min.js" type="text/javascript"></script> 
<script src="js/jquery.easing.1.2.js" type="text/javascript"></script> 
<script src="js/jquery.slideviewer.1.1.js" type="text/javascript"></script> 

<title>Untitled Document</title>
<script type="text/javascript"> 
    $(window).bind("load", function() { 
    $("div#mygalone").slideView() 
}); 
</script> 
</script> 
</head>

<body>
<h1>Test</h1>
<div id="mygalone" class="svw"> 
    <ul> 
        <li><img width="500" height="400" alt="abc"  src="images/108.jpg" /></li> 
        <li><img width="500" height="400" alt="defrg"  src="images/109.jpg" /></li>         
        <li><img width="500" height="400" alt="abc"  src="images/108.jpg" /></li> 
        <li><img width="500" height="400" alt="defrg"  src="images/109.jpg" /></li>         
        <!-- eccetera --> 
    </ul> 
</div> 
<div class="aj" style="height:15px;"></div>
    <p>Hello</p>
<div class="aj" style="height:25px;"></div>
<?php include_once("galleryHome.php"); ?>
</body>
</html>