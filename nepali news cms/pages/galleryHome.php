<div class="bd_content">
<?php 
	$query =mysql_query("SELECT * FROM tbl_photogallery WHERE cat='0' AND is_archieve ='1' ORDER BY published_date DESC");
?>
<div class="wrapper">
	<p class="heading_biz_1">Popular Image Galleries</p>
    <p class="aj" style="height:10px;"></p>
   <div class="seach_display">
      <ul>
           <?php  while($row=mysql_fetch_array($query)){ 
		   		$result = mysql_query("SELECT * FROM tbl_photogallery WHERE cat='".$row['id']."'");
				$num_rows = mysql_num_rows($result);	
		   ?>
              <div class="seach_display">
              	<ul>
                	<li class="seach_display_1">
                    	<div class="display_box">
                        	<img src=vignette.php?f=images/uploaded/<?php echo $row['files'];?>&w=70&h=60" alt="<?php echo ucwords($row['files']);?>" border="0">
							<?php //echo "<img src='images/uploaded/".$row['files']."' width='75' height='75' />";?>
                         </div>
                    	<p class="display_1"><?php echo "<a href=index.php?jpg=galleyPhoto&jID=".$row['id'].">".ucfirst($row['subject'])."</a>" ?><?php  echo "&nbsp;[".$num_rows."]"; ?></p>
                    </li>
                </ul>
             </div>
          <?php } ?>
     </ul>
   </div>    	 
</div>
</div>