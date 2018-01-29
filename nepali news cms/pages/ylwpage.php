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
            <p class="brs_txt_4"><input name="f_1" type="text" class="f_txt1"  /></p>
                <p class="brs_txt_5">&#2336;&#2366;&#2313;&#2305;</p>
                <p class="brs_txt_4"> 
              <select name="from" id="from" size="1" class="txt_field" onchange="ChangeValue(document.booking)">
                	<option selected="selected">All</option>
	            <?php
						$page=$_GET['page'];
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
				$newsletterdao = new BusinessDAO();
				$total=$newsletterdao->countBizCat();
				
				$limit = 50; 
				$link = "jpg=ylwpage";
				$pager  = Pager::getPagerData($total, $limit, $page);  
				$offset = $pager->offset;  
				$limit  = $pager->limit;  
				$page   = $pager->page;  
				$no_of_page=$pager->numPages;
					
					if($offset <0):
						$offset=0;
					endif;
				$list = $newsletterdao->fetchBizCat($offset, $limit); 	
				
		//$query =mysql_query("SELECT * FROM tbl_business WHERE cat='0' ORDER BY published_date DESC");
?>
    <div class="popular">
    	<p class="popular_header">Popular Business Directories</p>
        	<div class="seach_display">
            	<ul><?php  
						
						if(!empty($list)){
							foreach($list as $lst){							
							//while($row=mysql_fetch_array($query)){
						   		$result = mysql_query("SELECT * FROM tbl_business WHERE cat='".$lst->id."' AND is_archieve ='1'");
								$num_rows = mysql_num_rows($result);
					?>
                    <li class="seach_display_1">
                    	<p class="display_1"><?php echo "<a href=index.php?jpg=ylwpageCat&jID=".$lst->id.">".ucfirst($lst->name)."</a>&nbsp;&nbsp;[".$num_rows."]" ?></p>
                    </li>
                    <?php } 
							}
					?>
                    
                    <li class="seach_display_1">
                    	<p class="read_more" style="float:left; visibility:hidden;"></p>
                    </li>
                    <li class="seach_display_1">
                    	
                    </li>
                </ul>
                <?php if ($no_of_page>1):?><?=paging("index.php", $page, $no_of_page, $link, $id)?><?php endif; ?>
          	</div>
	</div>            