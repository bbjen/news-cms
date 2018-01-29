<script language="text/javascript" src="js/jquery-1.2.1.js"></script>
<!-- jquery for this page -->
<script type="text/javascript">
// initialize the jquery code
 $(document).ready(function(){
// changer links when clicked
$("a.changer").click(function(){
//set the div with class mainText as a var called $mainText 
var $mainText = $('div.mainText');
// set the current font size of .mainText as a var called currentSize
var currentSize = $mainText.css('font-size');
// parse the number value out of the font size value, set as a var called 'num'
var num = parseFloat(currentSize, 10);
// make sure current size is 2 digit number, save as var called 'unit'
var unit = currentSize.slice(-2);
// javascript lets us choose which link was clicked, by ID
if (this.id == 'linkLarge'){
num = num * 1.4;
} else if (this.id == 'linkSmall'){
num = num / 1.4;
}
// jQuery lets us set the font Size value of the mainText div
$mainText.css('font-size', num + unit);
   return false;
});
// hover for links - toggle css background colors
$("a.changer").hover(function(){
$(this).css('background-color', '#0099fb');
}, function(){
$(this).css('background-color', '#fff');
});
// hide switchLinks on page load
$('#switchLinks').hide();
// show the switchLinks div if showme is clicked
$('#showMe').click(function(){
$(this).hide();
$('#switchLinks').show();
return false;
});
// hide switchlinks if it is clicked
$('#switchLinks').click(function(){
$(this).hide();
$('#showMe').show();
return false;
});

});
 function ClickHereToPrint(){
    try{ 
        var oIframe = document.getElementById('ifrmPrint');
        var oContent = document.getElementById('demoText').innerHTML;
        var oDoc = (oIframe.contentWindow || oIframe.contentDocument);
        if (oDoc.document) oDoc = oDoc.document;
		oDoc.write("<html><head><title>title</title>");
		oDoc.write("</head><body onload='this.focus(); this.print();'>");
		oDoc.write(oContent + "</body></html>");	    
		oDoc.close(); 	    
    }
    catch(e){
	    self.print();
    }
}
</script>

<div id="media">
	<a id="showMe" href="#">Change text size</a>
		<div id="switchLinks">
			<a id="linkLarge" class="changer" href="#">Larger</a>
			<a class="changer" id="linkSmall" href="#">Smaller</a>
			<br />
			<br style="clear:both"/>
			Click to close
		</div>
	<a id="showMe" href="recform.php" target="page" onClick="window.open('','page','toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,addressbar=0,resizable=0,width=485,height=300,left=50,top=50,titlebar=0')">|Recommend this page|</a>
	<a id="showMe" href="#" onclick="ClickHereToPrint();">Print</a>
</div>
<div class="aj" style="height:5px;"></div>
<?php
		
		include_once "includes/functions.php";
		$id = $_GET['jID'];
		$page = $_GET['jpg'];
		
		$sql="SELECT * FROM tbl_newsletter WHERE  id='$id' AND is_archieve ='1'";
		$result=mysql_query($sql);
		   echo "<div class=mainText id=demoText>";	
          			while($row=mysql_fetch_array($result)){						  	
						echo "<h1>".ucfirst($row['subject'])."</h1><br>";
						echo "<div class=floatTxt>".ucfirst($row['name'])."<br><br>".ucfirst($row['shortdescription'])."</div>";
						echo "<div class='floatPic'><img src='images/uploaded/".$row['files']."' width='235' height='165' /></div>";
						echo "<div class='aj' style='height:5px;'></div>";
						echo "<p>".stripslashes($row['description'])."</p>";
					}
			echo "</div>";
		$cdao = new CommentDAO();
		$total=$cdao->countArticle($id);
			  
?>	
<script src="js/ajax_framework.js" language="javascript"></script>
<div class="aj" style="height:10px;"></div>

<div id="cmt_ctt">
	<h1>&#2346;&#2381;&#2352;&#2340;&#2367;&#2325;&#2381;&#2352;&#2367;&#2351;&#2366;<?php echo "(".$total.")"; ?></h1>    
    <div class="cmt_ctt_head">    
    	<?php	
			$list = $cdao->fetchComment($id, $page); 
			$sn =0;
			if(!empty($list)){
				foreach($list as $cmt){
					//if($_GET['jID']==$cmt->id) echo 'bgcolor="#ffcccc"'; elseif($sn%2==0) echo 'bgcolor="#efefef"';
						echo ++$sn."&nbsp;";
						echo $cmt->name."&nbsp;";
						echo "(".$cmt->published_date.")<br>";
						echo "&nbsp;&nbsp;&nbsp;".$cmt->comment."<br>";
				}
				
			}
			else
				echo "No comment posted yet";
   		?>
    </div><!--End of cmt_ctt_head   -->
    <div class="aj" style="height:10px;"></div>
    <form name="comment" id="comment" method="post" action="javascript:insert()"> 
<table border="0" width="100%">
	<tr>
    	<td colspan="2"><input type="hidden" id="id" name="id" value="<?php echo $id; ?>" />
	        <input type="hidden" id="page" name="page" value="<?php echo $page; ?>" />
        </td>
    </tr>
    <tr>
	    <td colspan="2"> <div id="insert_response" style="color:#F03; font-size:15px; text-align:center; text-decoration:underline;" ></div></td>
    </tr>
    <tr>
    	<td>&#2346;&#2370;&#2352;&#2366; &#2344;&#2366;&#2350;:</td>
        <td><input name="name" id="name" type="text" size="40" /><span>&nbsp;*</span></td>
    </tr>
    <tr>
    	<td>&#2312;&#2350;&#2375;&#2354; &#2336;&#2375;&#2327;&#2366;&#2344;&#2366;:</td>
        <td><input name="email" type="text" id="email" size="40" />  <span>&nbsp;*</span></td>
    </tr>
    <tr>
    	<td>&nbsp;&#2336;&#2375;&#2327;&#2366;&#2344;&#2366;:</td>
        <td><input name="address" type="text" id="address" size="40" />    <span>&nbsp;*</span></td>
    </tr>
    <tr>
    	<td>&#2346;&#2381;&#2352;&#2340;&#2367;&#2325;&#2381;&#2352;&#2367;&#2351;&#2366;:</td>
        <td><textarea name="tcomment" id="tcomment" cols="40" rows="5"></textarea><span>&nbsp;*</span></td>
    </tr>
    <tr>
    	<td>&nbsp;</td>
        <td>    <label>
        <input type="submit" name="submit" id="submit" value="&#2348;&#2369;&#2333;&#2366;&#2313;&#2344;&#2375;" /> <span>*</span> &#2309;&#2344;&#2367;&#2357;&#2366;&#2352;&#2381;&#2351; &#2331;&#2375;&#2340;&#2381;&#2352;
      </label>
		</td>
	</tr>
</table>
    </form>
    
</div> <!--End of cmt_ctt   -->


<!-- .............. ralated news .......... -->
	<div class="aj" style="height:10px;"></div>
	<div class="wrapper">
		<div class="heading_news">
        	<p class="heading_news_1">Latest 10 News<br/></p>
            <div class="aj" style="padding-bottom:5px;"></div>
        	<?php              
            	$newsletterdao = new NewsletterDAO();
						
				$list = $newsletterdao->fetchLatest(); 
				if(!empty($list)){
					foreach($list as $newsletter){
            ?>
                <p class="left_txt_1">
                	<?php echo "<a href='index.php?jpg=news&jID=".$newsletter->id."' title='".$newsletter->subject."'>".ucfirst($newsletter->subject)."</a>"; ?>                       
                </p>
			<?php
					}
				}
			?>
        </div>
        <div class="heading_news_rt"> </div>
	</div>
    <div class="aj" style="height:10px;"></div>
    
</div> <!--END of WRAPPER -->
<iframe id='ifrmPrint' src='#' style="width:0px; height:0px;"></iframe>