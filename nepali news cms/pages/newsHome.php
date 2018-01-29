<?php
		include_once "includes/functions.php";		
		$page=$_GET['page'];		
		
?>
<div class="wrapper">
	<div class="heading_news">
        <p class="heading_news_1">Latest News<br/></p>
        	<?php              
            	$newsletterdao = new NewsletterDAO();
				$total=$newsletterdao->countNewsletter();
				
				$limit = 10; 
				$link = "jpg=newsHome";
				$pager  = Pager::getPagerData($total, $limit, $page);  
				$offset = $pager->offset;  
				$limit  = $pager->limit;  
				$page   = $pager->page;  
				$no_of_page=$pager->numPages;
					
					if($offset <0):
						$offset=0;
					endif;
				
				
				$list = $newsletterdao->fetchAll($offset, $limit); 
				if(!empty($list)){
					foreach($list as $newsletter){
            ?>
                <p class="heading_news_2">
						<?php echo ucfirst($newsletter->subject); ?>
                        <span class='heading_news_date'>
							
                        </span>
                </p>
                <p class="heading_news_3">
						<?php echo ucfirst($newsletter->shortdescription)."...<br><a href='index.php?jpg=news&jID=".$newsletter->id."' title='".$newsletter->subject."'>+ &#2341;&#2346; &#2309;&#2352;&#2369;...</a><br><br>"; ?>
                </p>
                
			<?php
					}
				}
			?>	
				<?php if ($no_of_page>1):?><?=paging("index.php", $page, $no_of_page, $link, $id)?><?php endif; ?>
    </div>
        <div class="heading_news_rt">
    </div>
</div>
    
   
<div class="aj" style="height:15px;"></div>
<div class="content_right_btm_j">
    	<!--...........Start Left Advertisment Panel ............. --> 
        <?php
			$nvo = new AdvertisementVO();
			$ndao = new AdvertisementDAO();
			$listbtn = $ndao->fetchAdBottom(); 
			if(!empty($list)){
				foreach($listbtn as $advertbottom){
					//echo $lst->url;
		?>
        <?php 
			if($fetchAdBottom->url=="http://"){ 
				echo "<img src='images/uploaded/advertisment/footer/".$advertbottom->files."' />";
			}
			else {
				echo "<a href=".$advertbottom->url."  target='_blank'><img src='images/uploaded/advertisment/footer/".$advertbottom->files."' /></a>"; }
		?>
		<?php
				}
			}
		?>
                                     
        <!--.......End Left Advertisment Panel................. --> 
</div>