<?php	
	$alpha=$_GET['sID'];
	$page=$_GET['page'];
?>
<div class="bd_content">
	<div class="bdcontent_1">
     <div class="brs_txt_1">Browse Categories</div>
    	<div class="browse_category">
       
        	<ul>
            	<li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=A">A</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=B">B</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=C">C</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=D">D</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=E">E</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=F">F</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=G">G</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=H">H</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=I">I</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=J">J</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=K">K</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=L">L</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=M">M</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=N">N</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=O">O</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=P">P</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=Q">Q</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=R">R</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=S">S</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=T">T</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=U">U</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=V">V</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=W">W</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=X">X</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=Y">Y</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpageCat&sID=Z">Z</a></li>
             </ul>
       </div>
	</div>
</div>
<form method="post" action="index.php?jpg=ylwpageCat" name="form1">
	<div class="bd_content">
    	<div class="bdcontent_1" style="padding-left:15px;">
        	<div class="browse_category">
            	<p class="brs_txt_3">&#2326;&#2379;&#2332;&#2368;</p>
            <p class="brs_txt_4"><input type="text" name="f_1" class="f_txt1" /></p>
                <p class="brs_txt_5">&#2336;&#2366;&#2313;&#2305;</p>
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
        		</select>
                </p>
               <p class="brs_txt_7"><input type="submit" value="go" name="s_1" class="f_txt2" /></p>
			</div>
		</div>
	</div>
</form>
<?php		
			$sql1="SELECT * FROM tbl_business WHERE cat='0' AND is_archieve ='1' AND name LIKE '$alpha%'";
			$result1=mysql_query($sql1);
			$num_rows = mysql_num_rows($result1);
			
			$total=$num_rows;
			$limit = 20; 
			$link = "jpg=ylwpagemainCat&sID=$alpha";
			$pager  = Pager::getPagerData($total, $limit, $page);  
			$offset = $pager->offset;  
			$limit  = $pager->limit;  
			$page   = $pager->page;  
			$no_of_page=$pager->numPages;
		
		if($offset <0):
			$offset=0;
		endif;
		$sql="SELECT * FROM tbl_business WHERE cat='0' AND is_archieve ='1' AND name LIKE '$alpha%' limit $offset, $limit";
		$result=mysql_query($sql);
			
		   echo "<div class=wrapper_1>";	
				echo "<div class='aj' style='height:10px;'></div>";		   
		   		echo "<p class='heading_biz_1'>Total ".$num_rows." results listing</p>";
				if($num_rows!=0){
					echo "<div class=biz_box>";		
							echo "<p class=biz_box_lt>Category</p><p class=biz_box_rt>&nbsp;</p>";							
							while($row=mysql_fetch_array($result)){		
								$result2 = mysql_query("SELECT * FROM tbl_business WHERE cat='".$row['id']."'");
								$num_rows2 = mysql_num_rows($result2);
								echo "<br><p class=biz_box_lt_1_2><a href=index.php?jpg=ylwpageCat&jID=".$row['id'].">".ucfirst($row['name'])."</a>&nbsp;&nbsp;[".$num_rows2."]</p>";
							}
						}
					
						echo "</div>";
			if ($no_of_page>1):?><?=paging("index.php", $page, $no_of_page, $link, $id)?><?php endif;
				//else{
				//echo "<p style='color:#F00; text-align:center;'>No result found. Please search again.</p>";
				//}
    		echo "</div>";			
?>	