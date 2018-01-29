                <div class="">
					<!--  <div class="search">
                      	<div class="search_j">
					       <form>
						        <p class="search_txt">
                                   <input type="text" value="" name="t_1" class="s_txt" /> 
                                </p>
                                <p class="search_btm">
                                   <input class="s_btn" type="submit" value="" name="b_1"  />
                                </p>
                               
  							  </form>   
                          </div>
                          <ul>
                          	<li><a href="#">About Us</a></li>
                            <li><a href="index.php?jpg=contact">Contact Us</a></li>
                          </ul>                                             
 						 </div>       
                                           
                </div> -->       

				<div class="header_btm">
                   <!--<div class="logo"></div>-->
                    <div id="logodiv">OKAYTIMES.COM
                    </div>
                    <div id="watchdiv">
                   <div class="headmenu">
                       <a href="index.php?jpg=home">&#2327;&#2371;&#2361;</a>|
                       <a href="index.php?jpg=content&jID=17">&#2361;&#2366;&#2350;&#2381;&#2352;&#2379; &#2348;&#2366;&#2352;&#2375;&#2350;&#2366;</a>|
                       <a href="index.php?jpg=content&jID=18">&#2360;&#2350;&#2381;&#2346;&#2352;&#2381;&#2325;</a>|
                       <a href="index.php?jpg=feedback">&#2360;&#2369;&#2333;&#2366;&#2357;</a> 
                   </div>
                   <div id="search"><!--main search--> 
                  <div class="searchdiv">
                  <form action="search.php" id="cse-search-box">
				  <div class="innersearch">
   <!-- <input type="hidden" name="cx" value="004765379470313461435:zfchsgcgbum" />
    <input type="hidden" name="cof" value="FORID:11" />
    <input type="hidden" name="ie" value="UTF-8" />
    <input type="text" name="q" size="20" />
    <input type="submit" name="sa" value="&#2326;&#2379;&#2332;&#2368;" />-->
  </div>
</form>
<script type="text/javascript" src="http://www.google.com/cse/brand?form=cse-search-box&lang=en"></script>

                    <div id="date">
                      <?php
					  	echo date("l, d F Y");
					  ?>
                      </div>
                      
                  </div>
                 
                   <!--  <div class="advertise_1">
						<SCRIPT LANGUAGE="JavaScript">var clocksize='50';</SCRIPT>
                        <SCRIPT SRC="js/clock.js"></SCRIPT>
                     </div>-->
                     
                     </div> <!--main search--> 
                     
                     
                      </div>
                    
                      
                </div>
               
                     </div>
                <!--...........BreakingNews_Start.............. -->
                <div class="breaking_news">
                     <div class="news_lt">
                          <p class="news_lt_txt1">&#2326;&#2348;&#2352; &#2357;&#2367;&#2358;&#2375;&#2359;</p>
                         <!-- <p class="news_lt_arw"></p>-->
               </div>
                     <div class="news_rt">
                       <?php
                     $query =mysql_query("SELECT id,subject,breaking FROM tbl_newsletter WHERE breaking='1' ORDER BY published_date  DESC LIMIT 5");
					 echo "<marquee height='20' onmouseover='this.scrollAmount=0' onmouseout='this.scrollAmount=4' scrollamount='4'>";
                     while($row=mysql_fetch_array($query)){
              	       echo "&nbsp;&nbsp;|<a href=index.php?jpg=news&jID=".$row['id'].">".$row['subject']."</a>|&nbsp;&nbsp;";
					 }
					 echo "</marquee>"
                     ?>
                     </div>
                </div>
                <!--...........BreakingNews_End.............. -->