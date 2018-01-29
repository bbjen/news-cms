<?php
	include_once("includes/db_connection.php");
	$qa=$_GET["qa"];		
	$sql="SELECT * FROM tbl_leftmenu WHERE slted = '".$qa."' ORDER BY published_date DESC LIMIT 1";	
	$result = mysql_query($sql);	
			while($row = mysql_fetch_array($result)){
			  echo "<div class='horo_lft'>";
			  echo ucfirst($row['title']);
			  echo substr(ucfirst($row['description']),0,650);
			  echo "<div id='aj' style='height:2px;'></div>";
			  echo "</p>";
			  echo "<span class='read_morehoro'><a href='index.php?jpg=article&jID=".$row['id']."'>+ &#2341;&#2346; &#2309;&#2352;&#2369;</a></span></div>";			  
			}
?> 