

    <script type="text/javascript">    
        function formatText(index, panel) {
		  return index + "";
	    }
    
        $(function () {
        
            $('.anythingSlider').anythingSlider({
                easing: "easeInOutExpo",        // Anything other than "linear" or "swing" requires the easing plugin
                autoPlay: true,                 // This turns off the entire FUNCTIONALY, not just if it starts running or not.
                delay: 4000,                    // How long between slide transitions in AutoPlay mode
                startStopped: false,            // If autoPlay is on, this can force it to start stopped
                animationTime: 600,             // How long the slide transition takes
                hashTags: false,                 // Should links change the hashtag in the URL?
                buildNavigation: true,          // If true, builds and list of anchor links to link to each slide
        		pauseOnHover: true,             // If true, and autoPlay is enabled, the show will pause on hover
        		startText: "Go",             // Start text
		        stopText: "Stop",               // Stop text
		        navigationFormatter: formatText       // Details at the top of the file on this use (advanced use)
            });
            
            $("#slide-jump").click(function(){
                $('.anythingSlider').anythingSlider(6);
            });
            
        });
    </script>
<?php
	//include_once("includes/db_connection.php");
	$nvo = new NewsletterVO();
	$ndao = new NewsletterDAO();
	$list = $ndao->fetchSlide(); 
	

?>
<div id="jpg-wrap">          
	<div class="anythingSlider">
       	<div class="wrapjay">
        	<ul>
            <?php foreach($list as $lst){ ?>
              <li>
              	<div id="textSlide">
                	<div id="inner">					
						<?php echo "<img src='images/uploaded/".$lst->files."' width='475px'  height='250' />" ?>                      
                   		<h2><?php echo "<a href='index.php?jpg=news&jID=".$lst->id."' title='".$lst->subject."'>" ?><?php echo  ucfirst($lst->subject); ?></a></h2>
                    <p class="left_txt_3"><?php 
					//$text = $lst->description;
					//$count = count(explode(" ", $text));
					$longtext = $lst->description;
					$shorttext = limit_words( $longtext, 15, '...' );
					echo $shorttext;
					//echo "contains $count words";
					//echo substr(ucfirst($lst->description),0,1000)."..."; ?></p>
                    </div>
                  </div>       
              </li>
             <?php } ?>
            </ul>        
        </div>
    </div>
</div>       