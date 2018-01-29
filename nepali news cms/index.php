<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	include_once("includes/db_connection.php");
	function limit_words( $str, $num, $append_str='' ){
		  $words = preg_split( '/[\s]+/', $str, -1, PREG_SPLIT_OFFSET_CAPTURE );
  			if( isset($words[$num][1]) ){
			    $str = substr( $str, 0, $words[$num][1] ) . $append_str;
  			}
 		 unset( $words, $num );
  		return trim( $str );
	}
	
	$id=$_GET['jID'];
	$sid=$_GET['sID'];
	$content=$_GET['jpg'];
	//echo "1".$id;
//	echo " 2".$content;
//	echo " 3".$sid;
	if($sid!=""){
		//echo "SELECT * FROM tbl_contents WHERE  parent_menu_id='$id' and menu_id='$sid'";	
		$sql="SELECT * FROM tbl_contents WHERE  parent_menu_id='$id' and menu_id='$sid'";
		$result=mysql_query($sql);
	}
	else{
		//echo "SELECT * FROM tbl_contents WHERE parent_menu_id='NULL' AND menu_id='$id'";
		$sql="SELECT * FROM tbl_contents WHERE parent_menu_id='$NULL' AND menu_id='$id'";				
		$result=mysql_query($sql);		
	}	
	$num=mysql_num_rows($result);
		//echo $num;
	if(($id==NULL and $sid==NULL) or $num<=0){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Nepal, Nepalese around the world, news, breaking news, special news, nepal, nepali, Okaytimes, society, kathmandnu, butwal, sports, advertisement, economics, politics, entertainment, business, cartoon, nepali cartoon,Featured Headlines, world, heritage, language, gaha, conversation, interviews, opinions, views, crime, criminals, fashion, images, photo, nepali photo, image gallery, yellow pages, business directory, horoscope, daily horoscope, Rochak Satya, Share Mausam, Sathya police, army, politician, jay, businessman, online news of nepal," />
<meta name="description" content="Okaytimes online News, The best News Portal from Nepal, Online news of nepal, Business directory, Breaking News, Special News," />
<title>Okaytimes: connecting people and nepalese diaspora </title>
<?php 
	}		
	else{
		while($row=mysql_fetch_array($result)){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $row['page_keywords']; ?>" />
<meta name="description" content="<?php echo $row['page_description']; ?>" />
<meta name="metatag"  content="<?php echo $row['page_metatag'];?>" />
<title><?php   echo "mailnepal";   ?>
</title>
<?php 
		}
	}
?>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/style1.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
 <link rel="stylesheet" href="css/page.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/slider.css" type="text/css" media="screen" />

		<script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/thickbox.js"></script>
		<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
		<script type="text/javascript" src="js/hoverIntent.js"></script>
	    <script type="text/javascript" src="js/jquery.easing.1.2.js"></script>
		<script type="text/javascript" src="js/jquery.anythingslider.js"  charset="utf-8"></script>
	<!-- for menu -->
		<link rel="stylesheet" type="text/css" href="menu_files/pro_dropdown_2.css" />
		<script src="menu_files/stuHover.js" type="text/javascript"></script>
 	<!-- end of file menu list -->
		<link rel="shortcut icon" href="images/j.ico">
</head>

<body>
      <div id="main_body">
           <!--............Header_Start............... -->
           <div id="header">
           		<?php include_once("includes/header.php"); ?> 
                <?php include_once("menutest.php"); ?> 
           </div>
           <!--............Header_End............... -->
           <!--............Content_Start............... -->
           <div id="content">
                <div id="content_main">
                     <!--............ContentMainSection_Start............... -->
                     <div class="content_main_section">
                     <!--............ContentLeft_Start............... -->
                          <div class="content_left">
                               <?php include_once("includes/left_section.php"); ?>  
                          </div>
                          <!--............ContentLeft_End............... -->
                          <!--............ContentRight_Start............... -->
                          <div class="content_right">
                               <?php include_once("includes/right_section.php"); ?>
                          </div>
                           <div id="rightpart">
                                <?php include_once("includes/rightpart.php"); ?>
                          </div>
                          <!--............ContentRight_End............... -->
                      </div>
                      <!--............ContentMainSection_End............... -->
                </div>
           </div>
           <!--............Content_end............... -->
           <!--............Footer_Start............... -->
           
           <div id="footer">
                <?php include_once("includes/footer.php"); ?>   
           </div>
           <!--............Footer_End............... --> 
      </div>
       
</body>
</html>