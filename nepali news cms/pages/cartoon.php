<div class="wrapper">
<div class="heading_news">
<?php
		$id=$_GET['jID'];
		$sql="SELECT * FROM tbl_cartoon WHERE  id='$id' AND is_archieve ='1'";
		$result=mysql_query($sql);
		if(empty($result)){
			echo "EMPTY";
		}
		else{		   
          			while($row=mysql_fetch_array($result)){						  	
						echo "<p class='heading_news_1'>Cartoon of the Day</p><br>";
						echo "<div class='aj' style='height:5px;'></div>";
						echo "<p class='shrtdes_c'>Art by: ".$row['name']."&nbsp;&nbsp;<span class='heading_news_date'>(".$row['published_date'].")</span></p>";
						echo "<p class='heading_c'><img src='images/uploaded/".$row['files']."'/></p>";
						echo "<div class='aj' style='height:5px;'></div>";
						echo "<p class='des_c'>".$row['description']."</p>";
					}
		}
		
    		
?>		
</div>   



</div>
	
<!-- ......................... -->
<div class="aj" style="height:8px;"></div>

<div class="wrapper">
<div class="heading_news">
<p class="heading_news_1">Previous Cartoons</p>
<?php		
		$sql="SELECT * FROM tbl_cartoon WHERE  id!='$id' AND is_archieve ='1' ORDER BY published_date DESC LIMIT 9";
		$result=mysql_query($sql);		   
          			while($row=mysql_fetch_array($result)){						  	
						echo "<div style='height:3px;'></div>";	
						echo "<div class='cartoon_box'><ul><li class='cartoon_box_1'>";
						echo "<p class='heading_c'><a href='index.php?jpg=cartoon&jID=".$row['id']."'><img src='images/uploaded/".$row['files']."' height='75' width='75'/></a></p>";

						echo "</li></ul></div>";
					}
    		
?>		
</li>
</ul>
</div>   



</div>                                    