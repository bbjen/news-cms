<link rel="stylesheet" type="text/css" href="css/style1.css" />
<script type="text/javascript" src="js/example.js"></script>
<div id="page-wrap" >
	<div id="organic-tabs">
   		<ul id="explore-nav" class="ul">
        	<li id="ex-featured">
            	<a rel="featured" href="#" class="current">&#2352;&#2366;&#2332;&#2344;&#2368;&#2340;&#2367;</a>
            </li>
            <li id="ex-fst">
            	<a rel="fst" href="#" class="current">&#2360;&#2350;&#2366;&#2332;</a>
            </li>
            <li id="ex-lst">
            	<a rel="lst" href="#" class="current">&#2309;&#2352;&#2381;&#2341;</a>
            </li>
            <li id="ex-jquery">
            	<a rel="jquerytuts" href="#" class="current">&#2357;&#2367;&#2358;&#2381;&#2357;</a>
            </li>           
  	        <li id="ex-classics">
            	<a rel="classics" href="#" class="current">&#2326;&#2375;&#2354;</a>
            </li>
            <li id="ex-core" class="last">
            	<a rel="core" href="#" class="current">&#2358;&#2367;&#2354;&#2381;&#2346;&#2368;/&#2360;&#2376;&#2354;&#2368;</a>
            </li>
        </ul>    		
   <div id="all-list-wrap">
	    <?php $query =mysql_query("SELECT * FROM tbl_newsletter WHERE type='Economics' ORDER BY published_date DESC LIMIT 7"); ?>
		<ul id="lst" class="ul">
		<?php  while($row=mysql_fetch_array($query)){ ?>
    		<li><?php echo "<a href=index.php?jpg=news&jID=".$row['id'].">".ucfirst($row['subject'])."</a>" ?></li> <?php } ?>   		
	  </ul>
   		<?php $query =mysql_query("SELECT * FROM tbl_newsletter WHERE type='Politics' ORDER BY published_date DESC LIMIT 7");?>
    	<ul id="featured" class="ul">
        <?php  while($row=mysql_fetch_array($query)){ ?>
    	  	<li><?php echo "<a href=index.php?jpg=news&jID=".$row['id'].">".ucfirst($row['subject'])."</a>" ?></li> <?php } ?>
        </ul>
        <?php $query =mysql_query("SELECT * FROM tbl_newsletter WHERE type='Society' ORDER BY published_date DESC LIMIT 7");?>
	   	<ul id="fst" class="ul">
        <?php  while($row=mysql_fetch_array($query)){ ?>
    	  	<li><?php echo "<a href=index.php?jpg=news&jID=".$row['id'].">".ucfirst($row['subject'])."</a>" ?></li> <?php } ?>
        </ul>    	
 		<?php $query =mysql_query("SELECT * FROM tbl_newsletter WHERE type='Entertainment' ORDER BY published_date DESC LIMIT 7"); ?>
       	<ul id="core" class="ul">                 
        <?php  while($row=mysql_fetch_array($query)){ ?>
    		<li><?php echo "<a href=index.php?jpg=news&jID=".$row['id'].">".ucfirst($row['subject'])."</a>" ?></li> <?php } ?>
        </ul>
        <?php $query =mysql_query("SELECT * FROM tbl_newsletter WHERE type='World News' ORDER BY published_date DESC LIMIT 7"); ?>
    	<ul id="jquerytuts" class="ul">
        <?php  while($row=mysql_fetch_array($query)){ ?>
    	  	<li><?php echo "<a href=index.php?jpg=news&jID=".$row['id'].">".ucfirst($row['subject'])."</a>" ?></li> <?php } ?>
        </ul>
        <?php $query =mysql_query("SELECT * FROM tbl_newsletter WHERE type='Sports' ORDER BY published_date DESC LIMIT 7"); ?>
        <ul id="classics" class="ul">
        <?php  while($row=mysql_fetch_array($query)){ ?>
    	 	<li><?php echo "<a href=index.php?jpg=news&jID=".$row['id'].">".ucfirst($row['subject'])."</a>"; ?></li> <?php } ?>
        </ul>
    </div>		 
 </div> <!-- END List Wrap -->    		 
</div> <!-- END Organic Tabs -->