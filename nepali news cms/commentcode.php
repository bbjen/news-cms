<?php	include_once "includes/db_connection.php";		
			
		$vo = new CommentVO();
		$dao = new CommentDAO();	
	
		
		$vo->article_id = $_POST['article_id'];
		$vo->type = $_POST['type'];
		$vo->name = $_POST['name'];
		$vo->email = $_POST['email'];
		$vo->address = $_POST['address'];
		$vo->comment = $_POST['tcomment'];
		$vo->published_date = date("Y-m-d h-i-s");
		
		$vo->formatInsertVariables();
		
		if($vo->id == 0){
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
		//header("Location: index.php?jpg=".$page."&jID=".$id."&msg=".$msg);
?>