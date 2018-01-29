<?php	include_once("includes/db_connection.php");
		$sql="SELECT * FROM tbl_leftmenu WHERE  lftmenu='Share Mausam' ORDER BY published_date DESC LIMIT 1";
		$result=mysql_query($sql);
		   echo "<div class=wrapper'>";	
          			while($row=mysql_fetch_array($result)){						  	
						echo "<p class='desc'>".stripslashes($row['description'])."</p>";
					}
    		echo "</div>";			  
?>		   
                                    