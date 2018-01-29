<?php	include_once "../includes/db_connection.php";		
			
		$vo = new CommentVO();
		$dao = new CommentDAO();	
		$page=$_GET['p'];
	
		
		$vo->article_id = $_POST['article_id'];
		$vo->is_archieve = $_POST['is_archieve'];		
		
		$vo->formatInsertVariables();
		
		if($vo->id != 0){
			if($dao->insert($vo))
				echo "Thank You for your comment. Pending for approval.";
			else
				echo  "Some error prevented new comment from being saved.";
		}
		else{
			if($dao->update($vo))
				echo "Selected comment has been successfully updated.";
			else
				echo  "Some error prevented comment from being updated.";			
		}
		header("Location: index.php?p=".$page."&nId=".$id."&msg=".$msg);
?>