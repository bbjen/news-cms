<?php
include_once "includes/functions.php";
	
		$newsletterdao = new HoroscopeDAO();
		$list = $newsletterdao->fetchHoro(); 


?>
<div class="wrapper">
	<div class="heading_news">
        <p class="heading_news_1">Daily Horoscope<br/></p>
        	<?php foreach($list as $lst){ ?>	
                <p class="heading_news_2"><?php echo ucfirst($lst->name); ?></p>
                <p class="heading_news_5"><?php echo ">> ".ucfirst($lst->descs)."<br><br>"; ?></p>
                
			<?php } ?>	        	
    </div>
    
    <?php /*?><div class="middleadd">
    	 <div class="j">Advertisement</div>
                                    <?php
												$nvo = new AdvertisementVO();
												$ndao = new AdvertisementDAO();
												$list = $ndao->fetchAd(); 
												if(!empty($list)){
													foreach($list as $lst){
														//echo $lst->url;
											   if($lst->url=="http://"){ 
											   echo "<br>";
										   		echo "<img src='images/uploaded/advertisment/right/".$lst->files."' width='200' height='118'/>";
											   }
											   else {
												   echo "<br>";
												 echo "<a href=".$lst->url."  target='_blank'><img src='images/uploaded/advertisment/right/".$lst->files."' width='200' height='118'/></a><br>"; }
												 
													}
										}
									?>                                          
                                 
    </div><?php */?>
</div>