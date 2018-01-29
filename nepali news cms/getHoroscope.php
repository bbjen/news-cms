<?php
	include_once("includes/db_connection.php");
	$q=$_GET["q"];		
	$sql="SELECT * FROM tbl_horoscope WHERE name = '".$q."' ORDER BY dates DESC LIMIT 1";	
	$result = mysql_query($sql);	
			while($row = mysql_fetch_array($result)){
			  echo "<div class='horo_lft'>";
			  echo ucfirst($row['descs']);
			  $i=$row['stars'];
			  //echo $i;
			  echo "<div id='aj' style='height:5px;'></div>";
			  echo "<p class='horo_rgt_stars'>Stars: ";
			  for($j==5;$j<$i;$j++){
			  		echo "<img src='images/star.gif' width='15' height='15' title='".$i." star'>";
			  }
			  ?>
              <p class="read_morehoro" style="height:5px;"><a href="index.php?jpg=horoscopeHome">+ &#2341;&#2346; &#2309;&#2352;&#2369;</a></p>
              <?php
			  
			  echo "</p></div>";

			   if($row['name']=='Aries'){
				  echo "<div class='horo_rgt'><img src='images/aries.gif' width='50' height='50'><p class='horo_rgt_date'>March 21 - April 19</p></div>";
			  }
			  if($row['name']=='Taurus'){
				  echo "<div class='horo_rgt'><img src='images/taurus.gif' width='50' height='50'><p class='horo_rgt_date'>
April 20 - May 20</p></div>";
				  
			  }
			  if($row['name']=='Gemini'){
				  echo "<div class='horo_rgt'><img src='images/gemini.gif' width='50' height='50'><p class='horo_rgt_date'>
May 21 - June 20</p></div>";
			  }
			  if($row['name']=='Cancer'){
				  echo "<div class='horo_rgt'><img src='images/cancer.gif' width='50' height='50'><p class='horo_rgt_date'>June 21 - July 22</p></div>";
			  }
			  if($row['name']=='Leo'){
				  echo "<div class='horo_rgt'><img src='images/leo.gif' width='50' height='50'><p class='horo_rgt_date'>July 23 - Aug. 22</p></div>";
			  }
			  if($row['name']=='Virgo'){
				  echo "<div class='horo_rgt'><img src='images/virgo.gif' width='50' height='50'><p class='horo_rgt_date'>Aug. 23 - Sept. 22</p></div>";
			  }
			  if($row['name']=='Libra'){
				  echo "<div class='horo_rgt'><img src='images/libra.gif' width='50' height='50'><p class='horo_rgt_date'>Sept. 23 - Oct. 22</p></div>";
			  }
			  if($row['name']=='Scorpio'){
				  echo "<div class='horo_rgt'><img src='images/scorpio.gif' width='50' height='50'><p class='horo_rgt_date'>Oct. 23 - Nov. 21</p></div>";
			  }
			  if($row['name']=='Sagittarius'){
				  echo "<div class='horo_rgt'><img src='images/sagittarius.gif' width='50' height='50'><p class='horo_rgt_date'>Nov. 22 - Dec. 21</p></div>";
			  }
			  if($row['name']=='Capricorn'){
				  echo "<div class='horo_rgt'><img src='images/capricorn.gif' width='50' height='50'><p class='horo_rgt_date'>Dec. 22 - Jan. 19</p></div>";
			  }
			  if($row['name']=='Aquarius'){
				  echo "<div class='horo_rgt'><img src='images/aquarius.gif' width='50' height='50'><p class='horo_rgt_date'>Jan. 20 - Feb. 18</p></div>";
			  }
			  if($row['name']=='Pisces'){
				  echo "<div class='horo_rgt'><img src='images/pisces.gif' width='50' height='50'><p class='horo_rgt_date'>Feb. 19 - March 20</p></div>";
			  }			  
			}
			
?> 