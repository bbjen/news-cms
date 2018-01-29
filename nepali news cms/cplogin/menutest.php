<?php
		//  Using MYSQL_FETCH_ROW()
		//  =======================
		
		//  we want to build an array of data from the tbl_mainmenu
		require_once "../includes/db_connection.php";
		//include("../classes/MainMenuDAO.class.php");
		//include("../classes/MainMenuVO.class.php");
		//$nvo = new MainMenuVO();
		$mdao = new MainMenuDAO();	
		$list=$mdao->Menu();
		//$sql = "SELECT cat_id, cat_title FROM tbl_category
//		 WHERE cat_parent=0";
//		$result = mysql_query( $sql,$conn );
//		while( $row=mysql_fetch_row($result) )
//		{
//		  $cat_titles[] = $row[1];
//		  //  do stuff with other column
//		  //  data if we want
//		}
		//mysql_free_result( $result );
		foreach($list as $v ){
		  echo " ".$v->menu_order;
		}
?>
