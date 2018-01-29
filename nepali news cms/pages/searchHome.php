<?php
	$txt=$_POST['searcha'];
	echo $txt;

	if($txt=="&#2326;&#2379;&#2332;&#2368;"){
		$search = new SearchDAO();
		$list = $search->fetchAll();
		echo "Enter Keyword";	
	}
	else{
		echo $txt."test";
	}
?>