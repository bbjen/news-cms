<script type="text/javascript" src="js/selectHoroscope.js"></script>
<div id="mainright">
<?php
	$query1 =mysql_query("SELECT * FROM tbl_cartoon WHERE is_archieve ='1' ORDER BY id DESC LIMIT 1");
	$query3 =mysql_query("SELECT * FROM tbl_leftmenu WHERE lftmenu='Rochak Satya' AND is_archieve ='1' ORDER BY published_date DESC LIMIT 2");
	$query4 =mysql_query("SELECT * FROM tbl_leftmenu WHERE lftmenu='Dastabase' AND is_archieve ='1' ORDER BY published_date DESC LIMIT 2");
?>
<!-- --------------------------------------------------------------------------------- -->
<div class="content_left_1">
	<div>
    	<!--...........Start Right Advertisment Panel ............. -->                                          
        <?php
			$nvo = new AdvertisementVO();
			$ndao = new AdvertisementDAO();
			$list = $ndao->fetchAdRightTop(); 
			if(!empty($list)){
				foreach($list as $advertleft){
		?>
        <p style="padding:5px 0px 5px 5px;">
        <?php 
			if($advertleft->url=="http://"){ 
				echo "<img src='images/uploaded/advertisment/right/".$advertleft->files."' />";
			}
			else {
				echo "<a href=".$advertleft->url."  target='_blank'><img src='images/uploaded/advertisment/right/".$advertleft->files."' /></a>"; }
		?>
		</p><?php
				} //foreach end
			} //if end
			?>
                <!--.......End Left Advertisment Panel................. --> 
	</div>                                    
</div>
<!-- ........................................................................ -->
<div class="content_left_1">
	<div class="content_left_1_content">
    	<p class="left_txt_top">&#2357;&#2381;&#2351;&#2306;&#2327;&#2381;&#2351; &#2330;&#2367;&#2340;&#2381;&#2352;</p>
        <!--........................ --> 
        	<p style="padding:10px 0px 10px 10px;">
            	<?php 
					while($row1=mysql_fetch_array($query1)){
						echo "<a href='index.php?jpg=cartoon&jID=".$row1['id']."'><img src='images/uploaded/".$row1['files']."' width='190' height='290'/></a>";
						echo "<p class='des_c'>".substr($row1['description'],0,500)."</p>";
						echo "<span class='read_more'><a href='index.php?jpg=cartoon&jID=".$row1['id']."'>+ &#2341;&#2346; &#2309;&#2352;&#2369;</a></span> ";
					}
				?>
			</p>
		 <!--........................ --> 
        <div class="aj"></div>
     </div>
</div>
<!-- ........................................................................ -->
<div class="aj" style="height:10px;"></div>
	<div class="content_left_1">
    	<div>
	 	<!--...........Start Right Advertisment Panel ............. -->                                          
        <?php
			$nvo = new AdvertisementVO();
			$ndao = new AdvertisementDAO();
			$list = $ndao->fetchAdRightMiddle(); 
			if(!empty($list)){
				foreach($list as $advertleft){
		?>
        	<p style="padding:5px 0px 5px 5px;">
        <?php 
			if($advertleft->url=="http://"){ 
				echo "<img src='images/uploaded/advertisment/right/".$advertleft->files."' />";
			}
			else {
				echo "<a href=".$advertleft->url."  target='_blank'><img src='images/uploaded/advertisment/right/".$advertleft->files."' /></a>"; }
		?>
		</p>
		<?php
				} //foreach end
			} //if end
		?>
        <!--.......End Left Advertisment Panel................. --> 
	</div>                                    
</div>
<!-- ........................................................................ -->
<!-- rochack satya -->           
 <div class="aj" style="height:6px;"></div>
					<div class="content_left_1">
                    	<!--<p><img src="images/top_corner.jpg" width="200" height="4" /></p>-->
                        <div class="content_left_1_content">
                        	<p class="left_txt_top">&#2352;&#2379;&#2330;&#2325; &#2360;&#2340;&#2381;&#2351;</p>
                                <!--........................ --> 
                            	<?php  while($row3=mysql_fetch_array($query3)){ ?>
                                <div class="lt_content_1_j">
                                	<p class="left_txt_1"><img src="images/point_1.jpg" />&nbsp;<?php echo"<a href=index.php?jpg=article&jID=".$row3['id']." title='".$row3['title']."'>".ucfirst($row3['title'])."</a>" ?></p>
                                </div> 
                                <?php } ?>
                                <div class="left_1_btm_j" align="right">
		                       <span class="read_more"><a href="index.php?jpg=articleHome&read=Rochak Satya">+ &#2341;&#2346; &#2309;&#2352;&#2369;</a></span>      							</div>
                       </div>                                                           
                  </div>     
                  
<!--------------------------------------- -->   
<!-- ................................Dastabase.............................................. -->                              
              <div class="aj" style="height:6px;"></div>
					<div class="content_left_1">
                    	<!--<p><img src="images/top_corner.jpg" width="200" height="4" /></p>-->
                        <div class="content_left_1_content">
                        	<p class="left_txt_top">&#2342;&#2360;&#2381;&#2340;&#2366;&#2357;&#2375;&#2332;</p>
                                <!--........................ --> 
                            	<?php  while($row4=mysql_fetch_array($query4)){ ?>
                                <div class="lt_content_1_j">
                                	<p class="left_txt_1"><img src="images/point_1.jpg" />&nbsp;<?php echo "<a href=index.php?jpg=article&jID=".$row4['id']." title='".$row4['title']."'>".ucfirst($row4['title'])."</a>" ?></p>
                          </div> 
                                <?php } ?>
						<div class="left_1_btm_j" align="right">                                
                       <span class="read_more"><a href="index.php?jpg=articleHome&read=Dastabase">+ &#2341;&#2346; &#2309;&#2352;&#2369;</a></span>      
                       </div>
                      </div>                                                           
                  </div>    
                  
<!-- --------------------------------------------------------------------------------- -->
<div class="aj" style="height:6px;"></div>
     <!--....................... --> 
                               <div class="content_right_btmnxt">
                               <!--	<p><img src="images/top_corner.jpg" width="280" height="4" /></p>-->
                                 	<div class="horoscope">
                                     <p class="left_txt_top">&#2352;&#2366;&#2358;&#2367;&#2347;&#2354;</p>
                                   <div class="aj" style="padding:5px 0px 5px 30px;"></div>
                                        <form>
                                        &nbsp; <select name="users" onchange="showUser(this.value)">
                                            <option value="Aries">Aries </option>
                                            <option value="Taurus">Taurus</option>
                                            <option value="Gemini">Gemini</option>
                                            <option value="Cancer">Cancer</option>
                                            <option value="Leo">Leo</option>
                                            <option value="Virgo">Virgo</option>
                                            <option value="Libra">Libra</option>
                                            <option value="Scorpio">Scorpio</option>
                                            <option value="Sagittarius">Sagittarius</option>
                                            <option value="Capricorn">Capricorn</option>
                                            <option value="Aquarius">Aquarius</option>
                                            <option value="Pisces">Pisces</option>
                                        </select>
                                        </form>
                                        <div id="aj" style="height:5px;"></div>	  											
                                        <div id="txtHint">
                                        <?php
										$sql="SELECT * FROM tbl_horoscope WHERE name = 'Aries' ORDER BY dates DESC LIMIT 1";	
										$result = mysql_query($sql);	
											while($row = mysql_fetch_array($result)){
												echo "<div class='horo_lft'>";
												echo ucfirst($row['descs']);
												$i=$row['stars'];
												echo "<div id='aj' style='height:5px;'></div>";
												echo "<p class='horo_rgt_stars'>Stars: ";
												for($j==5;$j<$i;$j++){
													echo "<img src='images/star.gif' width='15' height='15' title='".$i." star'>";
												}?><br/>
                                                 <p class="read_morehoro" style="height:5px;"><a href="index.php?jpg=horoscopeHome">+ &#2341;&#2346; &#2309;&#2352;&#2369;</a></p>
                                                <?
												echo "</p></div>";
												if($row['name']=='Aries'){
												  echo "<div class='horo_rgt'><img src='images/aries.gif' width='50' height='50'><p class='horo_rgt_date'>March 21 - April 19</p></div>";
												}
												echo "</div>";
											}
										
										?>
                                       
                                      </div>
                                        
                                        </div>
                                 </div>
<!-- ........................................................................ -->                                         
<div class="aj" style="height:6px;"></div>
<div class="content_left_1">
	<div>
    	<!--...........Start Right Advertisment Panel ............. -->                                          
        <?php
			$nvo = new AdvertisementVO();
			$ndao = new AdvertisementDAO();
			$list = $ndao->fetchAdRightBottom(); 
			if(!empty($list)){
				foreach($list as $advertleft){
		?>
        <p style="padding:5px 0px 5px 5px;">
        <?php 
			if($advertleft->url=="http://"){ 
				echo "<img src='images/uploaded/advertisment/right/".$advertleft->files."' />";
			}
			else {
				echo "<a href=".$advertleft->url."  target='_blank'><img src='images/uploaded/advertisment/right/".$advertleft->files."' /></a>"; }
		?>
		</p><?php
				} //foreach end
			} //if end
			?>
                <!--.......End Left Advertisment Panel................. --> 
	</div>                                    
</div>
</div><!--mainright-->