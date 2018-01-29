<link href="css/css_page.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/white/style.css" media="screen" title="shadow" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/piroBox.1_2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$().piroBox({
			my_speed: 600, //animation speed
			bg_alpha: 0.5, //background opacity
			radius: 4, //caption rounded corner
			scrollImage : false, // true == image follows the page, false == image remains in the same open position
			pirobox_next : 'piro_next', // Nav buttons -> piro_next == inside piroBox , piro_next_out == outside piroBox
			pirobox_prev : 'piro_prev',// Nav buttons -> piro_prev == inside piroBox , piro_prev_out == outside piroBox
			close_all : '.piro_close',// add class .piro_overlay(with comma)if you want overlay click close piroBox
			slideShow : 'slideshow', // just delete slideshow between '' if you don't want it.
			slideSpeed : 4 //slideshow duration in seconds(3 to 6 Recommended)
	});
});
</script>
<?php
	$id=$_GET['jID'];
?>
<div class="main_content_demo">
<h2>Image Gallery</h2>
<div style="float:left; width:500px; display:block; xborder:1px solid #60F;">
<?php
	$sql="SELECT * FROM tbl_photogallery WHERE id='$id' AND is_archieve ='1'";
    $result=mysql_query($sql);
		while($rows=mysql_fetch_array($result)){
					echo "<h3>Set of ".$rows['subject']."</h3>";
		}
		
	$ndoa = new PhotogalleryDAO();
	$vo = $ndoa->fetchPhoto($id);
		foreach($vo as $lst){
			echo "<div class='demo'><a  href='images/uploaded/".$lst->files."' class='pirobox_gall' title='".$lst->shortdescription."<br><b>Photo By:</b>".$lst->pby."'><img src='images/uploaded/".$lst->files."' width='70' height='70' /></a></div>";
         	//echo $lst->subject."&nbsp;";
			//echo $lst->shortdescription."<br>";                
		}
?>
	<div class="heading_news_rt">
    </div>
    </div>
    </div>
    
    <div class="aj" style="height:15px;"></div>
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
			if($fetchAdBottom->url=="http://"){ 
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