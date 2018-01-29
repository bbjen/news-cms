<?php
	$nflash = new NewsletterDAO();
	$list = $nflash->fetchFlash();
	if(!empty($list)){
			  foreach($list as $flash){
			  	echo "<div id=flashnews>";
					echo "<h1>Flash News</h1>";
					echo "<p>".$flash->shortdescription."</p>";
				echo "</div>";
			  }
	}
?>
<div class="aj" style="height:5px;"></div>
<!--<div class="content_right_top">-->
<!--.........News SlideShow...... -->                                                                 	
	<?php include_once("sliderNews.php"); ?>  
<!--.........End of News SlideShow...... -->
<!-- </div>-->
<!-- ................... ........................................... -->
<div class="aj" style="height:5px;"></div>
<div class="content_right_btm_j">
	<div class="found_people">
    <!--	<div class="aj" ></div>-->
        <p class="popular_header">&#2360;&#2350;&#2366;&#2330;&#2366;&#2352; &#2357;&#2367;&#2357;&#2367;&#2343;</p>
        	<?php include_once("newsTab.php"); ?>
    </div>
</div>                                 
<!-- ................... ........................................... -->
<div class="content_right_btm">
<!--	<div class="j">&#2348;&#2367;&#2332;&#2381;&#2334;&#2366;&#2346;&#2344;</div>-->
    <ul>
    <?php
		$nvo = new AdvertisementVO();
		$ndao = new AdvertisementDAO();
		$list = $ndao->fetchAd(); 
		if(!empty($list)){
			foreach($list as $lst){
				//echo $lst->url;
	?>
    	<li><?php 
				if($lst->url=="http://"){ 
					echo "<img src='images/uploaded/advertisment/middle/".$lst->files."'/>";
				}
				else {
					echo "<a href=".$lst->url."  target='_blank'><img src='images/uploaded/advertisment/middle/".$lst->files."'/></a>"; }?>
		</li>
        <?php
				}
			}
		?>
    </ul> 
</div>   
<!-- ................... ........................................... -->
<div class="content_right_mid" >
	<p><img src="images/rt_top_corner_1.jpg" width="508px" height="8px" /></p>
    <div class="content_right_mid_content">
    	<p class="right_mid_txt_top">Business Directory</p>
        	<!--...................... -->
            <div class="bd_content">
            	<div class="bdcontent_1">
				<div class="brs_txt_1">Browse Categories</div>
                	<div class="browse_category">
                    	
						
                        	<ul>
                            	<li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=A">A</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=B">B</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=C">C</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=D">D</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=E">E</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=F">F</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=G">G</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=H">H</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=I">I</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=J">J</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=K">K</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=L">L</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=M">M</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=N">N</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=O">O</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=P">P</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=Q">Q</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=R">R</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=S">S</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=T">T</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=U">U</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=V">V</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=W">W</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=X">X</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=Y">Y</a></li>
                                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=Z">Z</a></li>
                            </ul>
							
                     </div>
                 </div>
             </div>
    <!--................... -->
	<!--...................... -->
    <form method="post" action="index.php?jpg=ylwpageCat" name="form1">
    <div class="bd_content">
    	<div class="bdcontent_1" style="padding-left:0px;">
        	<div class="browse_category">
            	<p class="brs_txt_6">&#2326;&#2379;&#2332;&#2368;</p>
            <p class="brs_txt_4"><input type="text" name="f_1" class="f_txt1" /></p>
                <p class="brs_txt_5">&#2336;&#2366;&#2313;&#2305; </p>
                <p class="brs_txt_4">
              <select name="from" id="from" size="1" class="txt_field" onchange="ChangeValue(document.booking)">
                	<option selected="selected">All</option>
	            <?php
						$bDAO = new BusinessDAO();						
						$cat = $bDAO->fetchLoc();
						if(!empty($cat))
							foreach($cat as $lst){
				?>
					<option value="<?=$lst->location?>"><?php echo $lst->location;?> </option>
           	 <?php		}
				?>			
         </select></p> 
				<p class="brs_txt_7"><input type="submit" value="go" name="s_1" class="f_txt2" /></p>
			</div>
        </div>
    </div>
    </form>
    <!--................... --> 
    <?php 
		$query =mysql_query("SELECT * FROM tbl_business WHERE cat='0' AND features='1' AND is_archieve ='1' ORDER BY published_date DESC LIMIT 10");
	?>
    <div class="popular">
    	<p class="popular_header">Popular Categories</p>
        	<div class="seach_display">
            	<ul><?php  while($row=mysql_fetch_array($query)){
						   $result = mysql_query("SELECT * FROM tbl_business WHERE cat='".$row['id']."'");
							$num_rows = mysql_num_rows($result);
					?>
                    <li class="seach_display_1">
                    	<p class="display_1"><?php echo "<a href=index.php?jpg=ylwpageCat&jID=".$row['id'].">".ucfirst($row['name'])."</a>&nbsp;&nbsp;[".$num_rows."]" ?></p>
                    </li>
                    <?php } ?>
                    <li class="seach_display_1">
                    	<p class="read_more" style="float:left; visibility:hidden;"></p>
                    </li>
                    <li class="seach_display_1">
                    	<p class="read_more" style="float:right;"><a href="index.php?jpg=ylwpage">+More Category</a></p>
                    </li>
                </ul>
          	</div>
	</div>                                         
    <!--................... --> 
    <!--................... --> 
    <div class="aj" style="height:10px;"></div>
    <!--................... -->                                         
    		</div>
</div>  
<!-- ................... ........................................... -->
<div class="aj" style="height:5px;"></div>
<div class="content_right_btm_j">
	<!--<div class="j">&#2348;&#2367;&#2332;&#2381;&#2334;&#2366;&#2346;&#2344; -->
    <?php
		$nvo = new AdvertisementVO();
		$ndao = new AdvertisementDAO();
		$listbtn = $ndao->fetchAdBottom(); 
		if(!empty($list)){
			foreach($listbtn as $advertbottom){
				//echo $lst->url;
				if($fetchAdBottom->url=="http://"){ 
					echo "<img src='images/uploaded/advertisment/footer/".$advertbottom->files."' />";
				}
				else {
					echo "<a href=".$advertbottom->url."  target='_blank'><img src='images/uploaded/advertisment/footer/".$advertbottom->files."' /></a>"; }?>
	<?php
				}
			}
	?>                                      
</div></div>
<!-- ................... ........................................... -->                           