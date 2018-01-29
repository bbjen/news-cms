<?php
	$query =mysql_query("SELECT * FROM tbl_interview WHERE is_archieve ='1' ORDER BY published_date DESC LIMIT 2");
	$query2 =mysql_query("SELECT * FROM tbl_leftmenu WHERE lftmenu='Lekh Rachana' AND is_archieve ='1' ORDER BY published_date DESC LIMIT 2");		
	$query5 =mysql_query("SELECT * FROM tbl_leftmenu WHERE lftmenu='Technology' AND is_archieve ='1' ORDER BY published_date DESC LIMIT 2");
	$query6=mysql_query("SELECT DISTINCT(slted) FROM tbl_leftmenu WHERE lftmenu='Sahitya' AND is_archieve ='1' ORDER BY published_date DESC");
?>
<div class="content_left_1">
	<div class="content_left_1_content">
    		<p class="left_txt_top"><a href="index.php?jpg=interviewHome">&#2360;&#2306;&#2357;&#2366;&#2342;</p>
        	<!--........................ --> 
        <?php  while($row=mysql_fetch_array($query)){ ?>
            <div class="lt_content_1"><!--itcont1-->
                    <p class="left_txt_1"><img src="images/point_1.jpg" />&nbsp;<?php echo "<a href=index.php?jpg=interview&jID=".$row['id']." title='".$row['subject']."'>".ucfirst($row['subject'])."</a>" ?></p>
                    <div class="lt_content_1_lt">
                        <p class="left_txt_2"><?php echo ucfirst($row['name']); ?></p>
                        <p class="left_txt_3">
						<?php 
							$longtext =$row['shortdescription'];
							$shorttext = limit_words( $longtext, 15, '...' );
							echo stripslashes($shorttext);
							//echo stripslashes(substr($row['shortdescription'],0,800)).".."; 
						?>                        
                        </p>
                    </div>
         			<div class="lt_content_1_rt"><img src="vignette.php?f=images/uploaded/<?php echo $row['files'];?>&w=60&h=50" alt="<?php echo ucwords($row['files']);?>" border="0">
					</div>
       				<p class="read_more"><?php echo "<a href='index.php?jpg=interview&jID=".$row['id']."' title='".$row['subject']."'>+ &#2341;&#2346 &#2309;&#2344;&#2381;&#2340;&#2352;&#2381;&#2357;&#2366;&#2352;&#2381;&#2340;&#2366;</a>" ?></p>
        </div> <!--itcont1-->
       	<?php } ?>
        <!--........................ --> 
         <div class="left_1_btm_ic" align="right">
         	<?php //include_once("InterviewSlideshow.php"); ?>
           <span class="read_more"><?php echo "<a href='index.php?jpg=interviewHome'>+ &#2341;&#2346; &#2309;&#2352;&#2369;</a>" ?></span> 
         </div>

    </div>                                    
</div>
<!-- ................................................................................... -->
<div class="aj" style="height:5px;"></div>
 <!-- .......................................................... -->
<div class="content_left_1">
	<div>
	<?php
		$nvo = new AdvertisementVO();
		$ndao = new AdvertisementDAO();
		$list = $ndao->fetchAdLeft(); 
		if(!empty($list)){
			foreach($list as $advertleft){
				//echo $lst->url;
	?>
    <p style="padding:5px 0px 5px 5px;">
    <?php 
		if($advertleft->url=="http://"){ 
			echo "<img src='images/uploaded/advertisment/left/".$advertleft->files."' />";
		}
		else {
			echo "<a href=".$advertleft->url."  target='_blank'><img src='images/uploaded/advertisment/left/".$advertleft->files."' /></a>"; }?>
	</p>
    <?php
			}
		}
	?>
<!--.......End Left Advertisment Panel................. --> 
    <div class="aj"></div>
</div>                               
<div class="aj" style="height:5px;"></div>
<!--  Sahitya -->           
 <div class="aj" ></div>
					<div class="content_left_1">
                    	<!--<p><img src="images/top_corner.jpg" width="200" height="4" /></p>-->
                        <div class="content_left_1_content">
                        	<p class="left_txt_top">&#2360;&#2366;&#2361;&#2367;&#2340;&#2381;&#2351;</p>
                                <!--........................ --> 
                            	<?php  while($row6=mysql_fetch_array($query6)){ ?>
                                <div class="lt_content_1_j">
                                	<p class="left_txt_1"><img src="images/point_1.jpg" />&nbsp;
									<?php 
										if($row6['slted']=='Gazal'){
											echo "<a href=index.php?jpg=articleHome&read=Sahitya&section=Gazal>&#2327;&#2332;&#2354;</a>" ;
										}
										else if($row6['slted']=='Kabita'){
											echo "<a href=index.php?jpg=articleHome&read=Sahitya&section=Kabita> &#2325;&#2348;&#2367;&#2340;&#2366;</a>" ;
										}
										else if($row6['slted']=='Katha'){
											echo "<a href=index.php?jpg=articleHome&read=Sahitya&section=Katha> &#2325;&#2341;&#2366;</a>";
										}
										else if($row6['slted']=='Laghu Katha'){
											echo "<a href='index.php?jpg=articleHome&read=Sahitya&section=Laghu Katha'>&#2354;&#2328;&#2369;&#2325;&#2341;&#2366;</a>" ;
										}
										else if($row6['slted']=='Geet'){
											echo "<a href=index.php?jpg=articleHome&read=Sahitya&section=Geet>&#2327;&#2368;&#2340;</a>" ;
										}
										else if($row6['slted']=='Jiwani'){
											echo "<a href=index.php?jpg=articleHome&read=Sahitya&section=Jiwani>&#2332;&#2368;&#2357;&#2344;&#2368;</a>" ;
										}
									?>
                                </p>
  </div> 
                                <?php } ?>
                                <div class="left_1_btm_j" align="right">
		                       <span class="read_more"><a href="index.php?jpg=articleHome&read=Sahitya">+ &#2341;&#2346; &#2309;&#2352;&#2369;</a></span>      							</div>
                       </div>                                                           
                  </div>     
                  
<!--------------------------------------- -->  
<div class="aj" style="height:5px;"></div>
<!--------------------------------------- -->  
<div class="content_left_1">
	<div>
    <?php
		$nvo = new AdvertisementVO();
		$ndao = new AdvertisementDAO();
		$list = $ndao->fetchAdLeftMiddle(); 
		if(!empty($list)){
			foreach($list as $advertleft){
				//echo $lst->url;
	?>
    <p style="padding:5px 0px 5px 5px;">
    <?php 
		if($advertleft->url=="http://"){ 
			echo "<img src='images/uploaded/advertisment/left/".$advertleft->files."' />";
		}
		else {
			echo "<a href=".$advertleft->url."  target='_blank'><img src='images/uploaded/advertisment/left/".$advertleft->files."' /></a>"; }?>
	</p><?php
			}
		}
		?>
<!--.......End Left Advertisment Panel................. --> 
	<div class="aj"></div>
    </div>
    <div class="aj"></div>
</div>   

<!-- .............................................................................. -->  
<!-- .......................................................... -->
<div class="aj" style="height:6px;"></div>
<div class="content_left_1">
	<div class="content_left_1_content">
    	<p class="left_txt_top"><a href="index.php?jpg=articleHome&read=Lekh Rachana">&#2348;&#2367;&#2330;&#2366;&#2352;/ &#2360;&#2381;&#2340;&#2350;&#2381;&#2349;</a></p>
        <!--........................ --> 
        <?php  while($row2=mysql_fetch_array($query2)){ ?>
   	  <div class="lt_content_1">
            	<p class="left_txt_1"><img src="images/point_1.jpg" />&nbsp;<?php echo "<a href=index.php?jpg=article&jID=".$row2['id']." title='".$row2['title']."'>".ucfirst($row2['title'])."</a>" ?></p>
                <div class="lt_content_1_lt">
                	<p class="left_txt_2"><?php echo ucfirst($row2['name']); ?></p>
					<div class="left_txt_3">
					<?php 
							$longtext =$row2['short_descs'];
							$shorttext = limit_words( $longtext, 15, '...' );
							echo stripslashes($shorttext);
						//echo stripslashes(substr($row2['short_descs'],0,800))."..";
					?>
                   </div>
                    
                </div>
         		<div class="lt_content_1_rt"><img src="vignette.php?f=images/uploaded/<?php echo $row2['files'];?>&w=60&h=50" alt="<?php echo ucwords($row['files']);?>" border="0">
				</div>
		       <p class="read_more"><?php echo "<a href='index.php?jpg=article&jID=".$row2['id']."' title='".$row2['title']."'>+ &#2341;&#2346; &#2354;&#2375;&#2326;</a>" ?>
               </p>
          </div> 
       <?php } ?>
       <div class="left_1_btm_ic" align="right">
	   		<?php //include_once("ArticleSlideshow.php"); ?>
         <span class="read_more"><?php echo "<a href='index.php?jpg=articleHome&read=Lekh Rachana'>+ &#2341;&#2346; &#2309;&#2352;&#2369;</a>" ?></span> 
       </div>
    </div>
</div>                               
<!--....................... -->
<!--------------------------------------- -->  
<div class="content_left_1">
	<div>
    <?php
		$nvo = new AdvertisementVO();
		$ndao = new AdvertisementDAO();
		$list = $ndao->fetchAdBottom(); 
		if(!empty($list)){
			foreach($list as $advertleft){
				//echo $lst->url;
	?>
    <p style="padding:5px 0px 5px 5px;">
    <?php 
		if($advertleft->url=="http://"){ 
			echo "<img src='images/uploaded/advertisment/left/".$advertleft->files."' />";
		}
		else {
			echo "<a href=".$advertleft->url."  target='_blank'><img src='images/uploaded/advertisment/left/".$advertleft->files."' /></a>"; }?>
	</p><?php
			}
		}
		?>
<!--.......End Left Advertisment Panel................. --> 
	<div class="aj"></div>
    </div>
    <div class="aj"></div>
</div>   

<!-- .............................................................................. -->  
                  
                              
<!-- ................................Technology.............................................. -->                              
              <div class="aj" style="height:6px;"></div>
					<div class="content_left_1">
                    	<!--<p><img src="images/top_corner.jpg" width="280" height="4" /></p>-->
                        <div class="content_left_1_content">
                        	<p class="left_txt_top">&#2346;&#2381;&#2352;&#2348;&#2367;&#2343;&#2367;</p>
                                <!--........................ --> 
                            	<?php  while($row5=mysql_fetch_array($query5)){ ?>
                                <div class="lt_content_1_j">
                                	<p class="left_txt_1"><img src="images/point_1.jpg" />&nbsp;<?php echo "<a href=index.php?jpg=article&jID=".$row5['id']." title='".$row5['title']."'>".ucfirst($row5['title'])."</a>" ?></p>
                          </div> 
                                <?php } ?>
                        <div class="left_1_btm_j" align="right">
                       <span class="read_more"><a href="index.php?jpg=articleHome&read=Technology">+ &#2341;&#2346; &#2309;&#2352;&#2369;</a></span>      
                       </div>
                      </div>                                                           
                  </div>   
<!-- .............................................................................. -->                                           
<!-- ................................Share.............................................. -->                              
              <div class="aj" style="height:6px;"></div>
					<div class="content_left_1">
                    	<!--<p><img src="images/top_corner.jpg" width="280" height="4" /></p>-->
                        <div class="content_left_1_content">
                        	<p class="left_txt_top">&#2358;&#2375;&#2351;&#2352;/ &#2350;&#2380;&#2360;&#2350;</p>
                                <!--........................ --> 
                            	<div class="lt_content_1_j">
                                	<p class="left_txt_1"><img src="images/point_1.jpg" />&nbsp;<a href="share.php?height=500&width=600" class="thickbox" title="&#2358;&#2375;&#2351;&#2352; &#2350;&#2380;&#2360;&#2350">&#2325;&#2381;&#2354;&#2367;&#2325; &#2327;&#2352;&#2381;&#2344;&#2369;&#2361;&#2379;&#2360;&#2381;</a></p>
                          </div> 

                        <div class="left_1_btm_j" align="right">
                       <span class="read_more"><a href="index.php?jpg=articleHome&read=Share Mausam">+ &#2341;&#2346; &#2309;&#2352;&#2369;</a></span>      
                       </div>
                      </div>                                                           
                  </div>   
<!-- .............................................................................. --> 
                               <!--....................... --> 
                               <!--	<p><img src="images/top_corner.jpg" width="280" height="4" /></p>-->
                                 </div>                             
