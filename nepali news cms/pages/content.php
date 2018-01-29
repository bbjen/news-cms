<div class="wrapper">	
	<div class="heading_news">
<?php
	$id=$_GET['jID'];
	$sid=$_GET['sID'];
	if($sid!=""){
		$q_chkMenu = "SELECT * FROM tbl_submenu1 WHERE submenu_id='$sid'";
		$r_chkMenu = mysql_query($q_chkMenu);
		$no_chkMenu = mysql_num_rows($r_chkMenu);
		if($no_chkMenu>0){	
			
			$sql="SELECT s.id,s.submenu_id,s.title,
					c.menu_id,c.content,c.page_description
					FROM tbl_submenu1 AS s 
					JOIN tbl_contents AS c
					ON s.id = c.submenu_id
					WHERE c.menu_id='$sid'";
			//print $sql;
			$result=mysql_query($sql) or die ("ERROR: " .mysql_error());			
				while($row=mysql_fetch_array($result)){					
					echo "<p class='heading_news_2'><a href='index.php?jpg=contentSub&jID=".$row['id']."'>".$row['title']."</a></p><br />";
					 echo "<p class='heading_news_3'>".$row['page_description']."<br><a href='index.php?jpg=contentSub&jID=".$row['id']."'>+ &#2341;&#2346; &#2309;&#2352;&#2369;...</a></p><br>";
				}
		}
		else{			
			$sql="SELECT * FROM tbl_contents WHERE  parent_menu_id='$id' and menu_id='$sid'";
			$result=mysql_query($sql);
		}
	}
	else{
		$sql="SELECT * FROM tbl_contents WHERE parent_menu_id='$id' AND menu_id='NULL'";				
		$result=mysql_query($sql);
	}
	$num=mysql_num_rows($result);	
        if($num==0){
?>
           <h1>Under Construction!</h1>
            <p>This page is still under construction and this feature is not yet implemented. Sorry.
    Please check back again sometime.</p>
<?php
        }
        else{
			echo "<div class=mainText id=demoText>";
			echo "<div class='aj' style='height:5px;'></div>";
            while($row=mysql_fetch_array($result)){?>
               <h1><?=$row['page_title']?></h1>
            <p><?=$row['content']?></p>
    <?php }
			echo "</div>";
        } //if and while loop ko end 
?>
	</div>
    <div class="heading_news_rt">
    </div>
</div>