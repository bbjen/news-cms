
<?php		
		require_once "includes/db_connection.php";
		$mdao = new MainMenuDAO();			
		$list=$mdao->Menu();
		echo "<div class='header_menu'><ul id='nav'> ";
		echo "<li class='top'><a href='index.php?jpg=home' class='top_link'>Home</a></li>";
		echo "<li class='top'><a href='index.php?jpg=galleryHome' class='top_link'>Gallery</a></li>";
		foreach($list as $v){
		  echo "<li class='top'><a href='index.php?jpg=content&jID=".$v->id."&sID=' class='top_link'>".ucfirst($v->title)."</a> ";	  		 
		  	$sdao= new MainMenuDAO;
			$hassubmenu = $sdao->hassmenu($v->id);
			 if($hassubmenu !='0'){ 			  	
			  		echo "<ul class='sub'>";						  					  
 					$sql="SELECT * FROM tbl_submenu WHERE mainmenu_id='$v->id' ORDER BY id";
				    $result=mysql_query($sql);
					$list1 = array($sql);				
					while($rows=mysql_fetch_array($result)){
						echo "<li><a href='index.php?jpg=content&jID=".$v->id."&sID=".$rows['id']."'>".ucfirst($rows['title'])."</a></li>";					
						}		// end while			
			 echo "</ul>"; }
			 echo "</li>";
				 
		}
		echo "</ul></div>";
?>