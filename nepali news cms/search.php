<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	include_once("includes/db_connection.php");
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
<meta name="keywords" content="news, breaking news, special news, nepal, nepali, mailnepal, society, kathmandnu, butwal, sports, advertisement, economics, politics, entertainment, mail nepal, mailnepal, business, cartoon, nepali cartoon,Featured Headlines, world, heritage, language, gaha, conversation, interviews, opinions, views, crime, criminals, fashion, images, photo, nepali photo, image gallery, yellow pages, business directory, horoscope, daily horoscope, Rochak Satya, Share Mausam, Sathya police, army, politician, jay, businessman, online news of nepal," />
<meta name="description" content="Mailnepal online News, The best News Portal from Nepal, Online news of nepal, Business directory, Breaking News, Special News," />
<title>mailnepal </title>
<?php 
	}		
	else{
		while($row=mysql_fetch_array($result)){
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $row['page_keywords']; ?>" />
<meta name="description" content="<?php echo $row['page_description']; ?>" />
<meta name="metatag"  content="<?php echo $row['page_metatag'];?>" />
<title><?php   echo "mailnepal |".$row['page_title'];  ?>
</title>
<?php 
		}
	}
?>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/thickbox.css" type="text/css" media="screen" />
<!--[if lt IE 7]>
<link href="css/ie7minus.css" rel="stylesheet" type="text/css" />
<![endif]-->
<link rel="stylesheet" type="text/css" href="css/superfish.css" media="screen">
		<script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/thickbox.js"></script>
		<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
		<script type="text/javascript" src="js/hoverIntent.js"></script>
		<script type="text/javascript" src="js/superfish.js"></script>
		<script type="text/javascript">

		// initialise plugins
		jQuery(function(){
			jQuery('ul.sf-menu').superfish();
		});

		</script>
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
                              <div id="cse-search-results"></div>
<script type="text/javascript">
  var googleSearchIframeName = "cse-search-results";
  var googleSearchFormName = "cse-search-box";
  var googleSearchFrameWidth = 400;
  var googleSearchDomain = "www.google.com";
  var googleSearchPath = "/cse";
</script>
<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>

<div class="aj" style="height:0px;"></div>
<div class="content_right_btm_s">
    	<!--...........Start Left Advertisment Panel ............. --> 
        <?php
			$nvo = new AdvertisementVO();
			$ndao = new AdvertisementDAO();
			$listbtn = $ndao->fetchAdBottom(); 
			if(!empty($list)){
				foreach($listbtn as $advertbottom){
					//echo $lst->url;
		?>
        <?php 
			if($fetchAdBottom->url==""){ 
				echo "<img src='images/uploaded/advertisment/footer/".$advertbottom->files."' />";
			}
			else {
				echo "<a href=".$advertbottom->url."  target='_blank'><img src='images/uploaded/advertisment/footer/".$advertbottom->files."' /></a>"; }
		?>
		<?php
				}
			}
		?>
                                     
        <!--.......End Left Advertisment Panel................. --> 
</div>
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