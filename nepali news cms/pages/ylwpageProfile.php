<div class="bd_content">
	<div class="bdcontent_1">
     <p class="brs_txt_1">Browse Categories</p>
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
					<option value="<?=$lst->location?>"><?php echo $lst->location;?> </option>
           	 	<?php	}	?>			
         		</select>
            </p>
           <p class="brs_txt_7"><input type="submit" value="go" name="s_1" class="f_txt2" /></p>
		</div>
     </div>
</div>
</form>
<?php
		$id=$_GET['jID'];
		$sql="SELECT * FROM tbl_business WHERE  id='$id' AND is_archieve ='1'";
		$result=mysql_query($sql);?>
        
		<div id="wrapperprofile">
        <?
		while($row=mysql_fetch_array($result)){	
	   		echo "<p class='heading_biz_pro'>".ucfirst($row['name'])."</p>";
			//echo "<p class=biz_detail>".$row['id']."</p>";?>            
			<div class="lt">
            <? echo ucfirst($row['address']);?><br/>
          <?   echo ucfirst($row['location']);?><br/>
         <?  echo  "<b>Phone:</b>".$row['phone'];?><br/>
         <? echo  "<b>Fax:</b>".$row['fax'];?><br/>
          <?  echo  "<b>Email:</b>" ?><a href="mailto:<?=$row['email']?>"><?=$row['email'];?></a><br/>
         <? echo  "<b>URL:</b>"?>
           <?php 
		if($row['url']=="http://"){ 
			echo $row['url'];
		}
		else {
			//echo "<a href=".$row['url']."  target='_blank'><img src='images/uploaded/advertisment/left/".$advertleft->files."' /></a>"; }?>
         <a href="<?=$row['url']?>" target='_blank'><?=$row['url'];?></a>
         <?php } ?>
         <br/>
			 <? echo  "<b>Description:</b>".$row['descs'];?><br/>
          
            
           
			<? //echo "<p class=biz_detail><b>".ucfirst($row['name'])."</b></p>";
			/*echo "<p class=biz_detail><b>Address: </b>".ucfirst($row['address'])."</p>";
			//echo "<p class=biz_db>" .ucfirst($row['address'])."</p>";
			echo "<p class=biz_detail><b>Location: </b>".ucfirst($row['location'])."</p>";
			echo "<p class=biz_detail><b>Phone: </b>".$row['phone']."</p>";
			echo "<p class=biz_detail><b>Fax: </b>".$row['fax']."</p>";
			echo "<p class=biz_detail><b>Email: </b><a href=mailto:".$row['email'].">".$row['email']."</a></p>";
			echo "<p class=biz_detail><b>URL: </b><a href=".$row['url']." target='_blank'>".$row['url']."</a></p>";
			echo "<p class=biz_detail><b>Description: </b>".$row['descs']."</p>";*/
			?></div>
           
            <div class="rt">
            <?
			echo "<img src=images/uploaded/".$row['files']." />"; ?>
            </div><?
		}
		?>
		
		</div>

