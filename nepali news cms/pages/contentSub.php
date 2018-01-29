<div class="wrapper">	
	<div class="mainText" id="demoText">
<?php
	$id=$_GET['jID'];
	//echo $id;
	//exit;
	$sql="SELECT * FROM tbl_contents WHERE submenu_id='$id'";				
	$result=mysql_query($sql);	
	$num=mysql_num_rows($result);	
        if($num==0){
?>
           <h1>Under Construction!</h1>
            <p>This page is still under construction and this feature is not yet implemented. Sorry.
    Please check back again sometime.</p>
<?php
        }
        else{
            while($row=mysql_fetch_array($result)){
				echo "<h1>".$row['page_title']."</h1>";
                echo $row['content'];				
            }
        } //if and while loop ko end 
?>
	</div>
</div>