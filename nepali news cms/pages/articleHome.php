<?php	
		include_once "includes/functions.php";
		$read = $_GET['read'];
		//echo $read;
		$_SESSION['read']=$read;
		$sect = $_GET['section'];
		//echo $sect;
		//exit;
		//echo  $_SESSION['read'];
		$page = $_GET['page'];
?>
<div class="wrapper">
	<div class="heading_news">
        <p class="heading_news_1">
        <?php
        	if($read=='Lekh Rachana')
				echo "&#2354;&#2375;&#2326; &#2352;&#2330;&#2344;&#2366;";
			else if($read=='Technology')
				echo "&#2346;&#2381;&#2352;&#2348;&#2367;&#2343;&#2367;";
			else if($read=='Share Mausam')
				echo "&#2358;&#2375;&#2351;&#2352; &#2350;&#2380;&#2360;&#2350;";
			else if($read=='Sahitya')
				echo "&#2360;&#2366;&#2361;&#2367;&#2340;&#2381;&#2351;";
			else if($read=='Rochak Satya')
				echo "&#2352;&#2379;&#2330;&#2325; &#2360;&#2340;&#2381;&#2351;";
			else if($read=='Dastabase')
				echo "&#2342;&#2360;&#2381;&#2340;&#2366;&#2357;&#2375;&#2332;";
		?>
        </p>
        	<?php              
            	$newsletterdao = new lftContentDAO();
				$total=$newsletterdao->countTotal($read, $sect);
				
				$limit = 25; 
				$link = "jpg=articleHome";
				$pager  = Pager::getPagerData($total, $limit, $page);  
				$offset = $pager->offset;  
				$limit  = $pager->limit;  
				$page   = $pager->page;  
				$no_of_page=$pager->numPages;
					
					if($offset <0):
						$offset=0;
					endif;
				$list = $newsletterdao->fetchAll1($offset, $limit,$read, $sect); 
				if(!empty($list)){
					foreach($list as $newsletter){					
           
			 ?>
                <p class="heading_news_2">
					<?php echo ucfirst($newsletter->title); ?>
                    <span class='heading_news_date'></span>
                </p>
                <p class="heading_news_desc">
            &nbsp;&nbsp;&nbsp;
			<?php 
				//$longtext = newsletter->short_descs;
				//$shorttext = limit_words( $longtext, 20, '<br><a href=index.php?jpg=article&jID='.$newsletter->id.' title='.$newsletter->title.'>+ &#2341;&#2346; &#2309;&#2352;&#2369;...</a><br><br>' );
				//echo stripslashes($shorttext);
				echo stripslashes(substr(ucfirst($newsletter->short_descs),0,900))."...<br><a href='index.php?jpg=article&jID=".$newsletter->id."' title='".$newsletter->title."'>+ &#2341;&#2346; &#2309;&#2352;&#2369;...</a><br><br>"; 
			?></p>
                
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
<div class="content_right_btm_j">    	<!--...........Start Left Advertisment Panel ............. --> 
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