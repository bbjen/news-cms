<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
<title>Pirobox 1.2 black</title>
</head>
<!--////// page .css  \\\\\\\-->
<link href="..css/css_page.css" media="screen" rel="stylesheet" type="text/css" />
<!--//////END\\\\\\\-->


<!--////// CHOOSE ONE OF THE 3 PIROBOX STYLES  \\\\\\\-->
<link href="..css/white/style.css" media="screen" title="shadow" rel="stylesheet" type="text/css" />
<!--<link href="css_pirobox/white/style.css" media="screen" title="white" rel="stylesheet" type="text/css" />
<link href="css_pirobox/black/style.css" media="screen" title="black" rel="stylesheet" type="text/css" />-->
<!--////// END  \\\\\\\-->

<!--////// INCLUDE THE JS AND PIROBOX OPTION IN YOUR HEADER  \\\\\\\-->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="..js/piroBox.1_2.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$().piroBox({
			my_speed: 600, //animation speed
			bg_alpha: 0.5, //background opacity
			radius: 4, //caption rounded corner
			scrollImage : false, // true == image follows the page, false == image remains in the same open position
			pirobox_next : 'piro_next', // Nav buttons -> piro_next == inside piroBox , piro_next_out == outside piroBox
			pirobox_prev : 'piro_prev',// Nav buttons -> piro_prev == inside piroBox , piro_prev_out == outside piroBox
			close_all : '.piro_close',// add class .piro_overlay(with comma)if you want overlay click close piroBox
			slideShow : 'slideshow', // just delete slideshow between '' if you don't want it.
			slideSpeed : 4 //slideshow duration in seconds(3 to 6 Recommended)
	});
});
</script>
<!--////// END  \\\\\\\-->


<body>
<div class="main_content_demo"><h1></h1>
<h2>Shadow style [default] you can change pirobox style</h2>
<div style="float:left; width:900px; display:block;">
<h3 id="examples">Single image</h3>


<!--////// BELOW THE PART OF CODE YOU HAVE TO REPLACE  WITH THE URLs OF YOUR IMAGES \\\\\\\-->


<div class="demo"><a href="../image/1_b.jpg" class="pirobox" title="Single ../image"><img src="../image/1.jpg"  /></a></div>
<!--////// CLASS pirobox FOR SINGLE IMAGE \\\\\\\-->

<h3>Set of image 1</h3>
<div class="demo"><a href="../image/2_b.jpg" class="pirobox_gall" title="Set of ../image 1"><img src="../image/2.jpg"  /></a></div>

<div class="demo"><a href="../image/3_b.jpg" class="pirobox_gall" title="Set of ../image 1"><img src="../image/3.jpg"  /></a></div>

<div class="demo"><a href="../image/5_b.jpg" class="pirobox_gall" title="Set of ../images 1"><img src="../image/5.jpg"  /></a></div>

<div class="demo"><a href="../image/4_b.jpg" class="pirobox_gall" title="Set of ../image 1"><img src="../image/4.jpg"  /></a></div>

<div class="demo"><a href="../image/6_b.jpg" class="pirobox_gall" title="Set of ../image 1"><img src="../image/6.jpg"  /></a></div>

<div class="demo"><a href="../image/7_b.jpg" class="pirobox_gall" title="Set of ../image 1"><img src="../image/7.jpg"  /></a></div>

<div class="demo"><a href="../image/8_b.jpg" class="pirobox_gall" title="Set of ../image 1"><img src="../image/8.jpg"  /></a></div>



<h3>Set of ../image 2</h3>
<div class="demo"><a href="../image/2_b.jpg" class="pirobox_gall_work1" title="Set of ../image 2"><img src="../image/2.jpg"  /></a></div>

<div class="demo"><a href="../image/3_b.jpg" class="pirobox_gall_work1" title="Set of ../image 2"><img src="../image/3.jpg"  /></a></div>

<div class="demo"><a href="../image/5_b.jpg" class="pirobox_gall_work1" title="Set of ../image 2"><img src="../image/5.jpg"  /></a></div>

<div class="demo"><a href="../image/4_b.jpg" class="pirobox_gall_work1" title="Set of ../image 2"><img src="../image/4.jpg"  /></a></div>

<div class="demo"><a href="../image/6_b.jpg" class="pirobox_gall_work1" title="Set of ../image 2"><img src="../image/6.jpg"  /></a></div>

<div class="demo"><a href="../image/7_b.jpg" class="pirobox_gall_work1" title="Set of ../image 2"><img src="../image/7.jpg"  /></a></div>

<div class="demo"><a href="../image/8_b.jpg" class="pirobox_gall_work1" title="Set of ../image 2"><img src="../image/8.jpg"  /></a></div>



<h3>Set of ../image 3</h3>
<div class="demo"><a href="../image/2_b.jpg" class="pirobox_gall_work2" title="Set of ../image 3"><img src="../image/2.jpg"  /></a></div>

<div class="demo"><a href="../image/3_b.jpg" class="pirobox_gall_work2" title="Set of ../image 3"><img src="../image/3.jpg"  /></a></div>

<div class="demo"><a href="../image/5_b.jpg" class="pirobox_gall_work2" title="Set of ../image 3"><img src="../image/5.jpg"  /></a></div>

<div class="demo"><a href="../image/4_b.jpg" class="pirobox_gall_work2" title="Set of ../image 3"><img src="../image/4.jpg"  /></a></div>

<div class="demo"><a href="../image/6_b.jpg" class="pirobox_gall_work2" title="Set of ../image 3"><img src="../image/6.jpg"  /></a></div>

<div class="demo"><a href="../image/7_b.jpg" class="pirobox_gall_work2" title="Set of ../image 3"><img src="../image/7.jpg"  /></a></div>

<div class="demo"><a href="../image/8_b.jpg" class="pirobox_gall_work2" title="Set of ../image 3"><img src="../image/8.jpg"  /></a></div>

<h3>Image Errore</h3>
<div class="demo"><a href="../image/7_bb.jpg" class="pirobox" title="wrong URL"><img src="../image/7.jpg"  /></a></div>
<!--////// WRONG URL \\\\\\\-->
</div>
 

<!--////// END  \\\\\\\-->
<!--////// THAT'S IT :) for any question about pirobox ///////////> diegovalobra@gmail.com <\\\\\\\\\\   -->
</div>
</body>
</html>