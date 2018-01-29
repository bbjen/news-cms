<?php
	$page=$_GET['page'];
	$id=$_GET['jID'];
	$data=$_REQUEST['f_1'];	
	$loc=$_REQUEST['from'];
?>
<div class="bd_content">
	<div class="bdcontent_1">
     <div class="brs_txt_1">Browse Categories</div>
    	<div class="browse_category">
       
        	<ul>
            	<li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=A">A</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=B">B</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=C">C</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=D">D</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=E">E</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=F">F</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=G">G</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=H">H</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=I">I</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=J">J</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=K">K</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=L">L</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=M">M</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=N">N</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=O">O</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=P">P</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=Q">Q</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=R">R</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=S">S</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=T">T</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=U">U</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=V">V</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=W">W</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=X">X</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=Y">Y</a></li>
                <li class="brs_txt_2"><a href="index.php?jpg=ylwpagemainCat&sID=Z">Z</a></li>
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
					<option value="<?=$lst->location?>"<?php if($loc==$lst->location) echo "selected";?>><?php echo $lst->location;?> </option>
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
	
		if($data==""){
			$sql1="SELECT * FROM tbl_business WHERE  cat='$id' AND is_archieve ='1'";
			$result1=mysql_query($sql1);
			$num_rows = mysql_num_rows($result1);
		}
		if($id==""){
			
			if($loc!="All"){	
				$sql1="SELECT * FROM tbl_business WHERE location='$loc' OR address LIKE '%$data%' OR location  LIKE '%$data%' AND cat!='0' AND is_archieve ='1' AND name LIKE '%$data%'";
			}
			else{
				$sql1="SELECT * FROM tbl_business WHERE  name LIKE '%$data%'  OR address LIKE '%$data%' OR location  LIKE '%$data%' AND is_archieve ='1'";
			}
				$result1=mysql_query($sql1);
				$num_rows = mysql_num_rows($result1);
				
		}
		$total=$num_rows;
		$limit = 35; 
		$link = "jpg=ylwpageCat&jID=$id&f_1=$data&from=$loc";
		$pager  = Pager::getPagerData($total, $limit, $page);  
		$offset = $pager->offset;  
		$limit  = $pager->limit;  
		$page   = $pager->page;  
		$no_of_page=$pager->numPages;
		
		if($offset <0):
			$offset=0;
		endif;
		if($data==""){
			$sql="SELECT * FROM tbl_business WHERE  cat='$id' AND is_archieve ='1' limit $offset, $limit";
			$result=mysql_query($sql);
		}
		if($id==""){
			if($loc!="All"){	
				$sql="SELECT * FROM tbl_business WHERE location='$loc' OR address LIKE '%$data%' OR location  LIKE '%$data%' AND cat!='0' AND is_archieve ='1' AND name LIKE '%$data%' limit $offset, $limit";
				
			}
			else{
				$sql="SELECT * FROM tbl_business WHERE  name LIKE '%$data%'  OR address LIKE '%$data%' OR location  LIKE '%$data%' AND is_archieve ='1' limit $offset, $limit";
				//print $sql;
			}
				$result=mysql_query($sql);
		}
		
		   echo "<div class=wrapper_1>";	
				echo "<div class='aj' style='height:10px;'></div>";		   
		   		echo "<p class='heading_biz_1'>Total ".$num_rows." results listing</p>";
				if($num_rows!=0){
					echo "<div class=biz_box>";		
						if($alpha==""){
							echo "<p class=biz_box_lt>Business Name</p>";
							echo "<p class=biz_box_rt>Address</p>";
							while($row=mysql_fetch_array($result)){	
								echo "<div class='biz_box_inner'>";
								echo "<div class=biz_box_lt_1>";
								if($row['cat']=='0')
								{									
									echo "<a href=index.php?jpg=ylwpageCat&jID=".$row['id'].">".ucfirst($row['name'])."</a>";
								}
								else{
									echo "<a href=index.php?jpg=ylwpageProfile&jID=".$row['id'].">".ucfirst($row['name'])."</a></div>";
									
									echo "<div class=biz_box_rt_1>";
									echo ucfirst($row['address']);
                                    }
								echo "</div>";?>
									<div class="biz_box_lt_x">
                                    <?
						echo "<p class='read_more2'><a href=index.php?jpg=ylwpageProfile&jID=".$row['id'].">....more</a></p>";	?>
                        </div>
                       
                        <?		
						echo "</div>";?>
						 <br/>
							<?php }
						}
			if ($no_of_page>1):?><?=paging("index.php", $page, $no_of_page, $link, $id)?><?php endif;
						echo "</div>";
				}
				else{
				echo "<p style='color:#F00; text-align:center;'>No result found. Please search again.</p>";
				}
    		echo "</div>";			
?>	