<?php
class CommentDAO extends BaseDAO{		
		function __construct(){
			
		}
		
		function insert($vo){
			//$currentdate=get_current_NST();
			  $this->sql = "INSERT INTO tbl_comment VALUES 
							('','$vo->article_id',
							 '$vo->type',
							 '$vo->name',
							'$vo->email',
							'$vo->address',
							'$vo->comment',
							'$vo->published_date',
							'0'
							)"; //exit;
							//echo mysql_insert_id();
			return $this->exec();
			}
			
		function update($vo){		

			  $this->sql = "UPDATE tbl_comment SET is_archieve = '1' WHERE id = '$vo->id'";  
				//return mysql_query($this->sql) or die(mysql_error());								
			return $this->exec();
			print $this->sql;
			exit;
			}
			function setArchieve($id){
			//echo $id;
			$vo = $this->fetchDetails($id);
			
			if($vo->is_archieve==0){
			  		$this->sql = "UPDATE tbl_comment SET is_archieve = '1' WHERE id = '$vo->id'";  
					return $this->exec();
			}
			else{
				$this->sql = "UPDATE tbl_comment SET is_archieve = '0' WHERE id = '$vo->id'";  
					return $this->exec();
			}
			print $this->sql;
			exit;
			}
		
		function fetchDetails($id)
			{
			$this->sql = "SELECT * FROM tbl_comment WHERE id = '$id'";
			$this->exec();
			
			$vo = new InterviewVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
					$vo->id = $rows['id'];
					$vo->article_id = $rows['article_id'];
					$vo->name = $rows['name'];
					$vo->email = $rows['email'];
					$vo->address = $rows['address'];
					$vo->comment = $rows['comment'];
					$vo->type = $rows['type'];
					$vo->published_date = $rows['published_date'];
					$vo->is_archieve = $rows['is_archieve'];
				
				$vo->formatFetchVariables();
				}
				
			return $vo;
			}
		
		function fetchAll($offset, $limit)
			{
			$this->sql = "SELECT * FROM tbl_interview ORDER BY published_date DESC LIMIT $offset, $limit";
			$this->exec();
			
			$list = array();
			
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo = new InterviewVO();
					
					$vo->id = $rows['id'];
					$vo->interviewee = $rows['interviewee'];
					$vo->name = $rows['name'];
					$vo->subject = $rows['subject'];
					$vo->shortdescription = $rows['shortdescription'];
					$vo->description = $rows['description'];
					$vo->files = $rows['files'];
					$vo->published_date = $rows['published_date'];
					$vo->is_archieve = $rows['is_archieve'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
				//print_r($list);
			return $list;
			}
			function fetchTotal($offset, $limit)
			{
			$this->sql = "SELECT * FROM tbl_comment ORDER BY published_date DESC LIMIT $offset, $limit";
			$this->exec();
			
			$list = array();
			
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo = new CommentVO();
					
					$vo->id = $rows['id'];
					$vo->article_id = $rows['article_id'];
					$vo->name = $rows['name'];
					$vo->email = $rows['email'];
					$vo->address = $rows['address'];
					$vo->comment = $rows['comment'];
					$vo->type = $rows['type'];
					$vo->published_date = $rows['published_date'];
					$vo->is_archieve = $rows['is_archieve'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
				//print_r($list);
			return $list;
			}

			function fetchComment($id, $page){
			$this->sql = "SELECT * FROM tbl_comment WHERE article_id='".$id."' AND type='".$page."' AND is_archieve='1' ORDER BY published_date DESC";
			//print $this->sql;
//			exit;
			$this->exec();
			
			$list = array();
			
			if($this->result){
				while($rows = $this->fetch()){
					
					$vo = new CommentVO();		
					
					$vo->id = $rows['id'];
					$vo->article_id = $rows['article_id'];
					$vo->name = $rows['name'];
					$vo->email = $rows['email'];
					$vo->address = $rows['address'];
					$vo->comment = $rows['comment'];
					$vo->type = $rows['type'];
					$vo->published_date = $rows['published_date'];
					$vo->is_archieve = $rows['is_archieve'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
				//print_r($list);
			return $list;
			}
			function countArticle($id)
			{
			$this->sql = "SELECT count(*) as cnt FROM tbl_comment WHERE article_id=".$id." AND is_archieve='1'";
			$this->exec();
			if($this->result)
				{
				$rows = $this->fetch();
				return $rows['cnt'];
				} 
			else
				return false;
			}
			function countAll()
			{
			$this->sql = "SELECT count(*) as cnt FROM tbl_comment WHERE is_archieve='0'";
			$this->exec();
			if($this->result)
				{
				$rows = $this->fetch();
				return $rows['cnt'];
				} 
			else
				return false;
			}
			function countTotal()
			{
			$this->sql = "SELECT count(*) as cnt FROM tbl_comment";
			$this->exec();
			if($this->result)
				{
				$rows = $this->fetch();
				return $rows['cnt'];
				} 
			else
				return false;
			}
			
			function fetchInterview(){
			$this->sql = "SELECT * FROM tbl_interview ORDER BY published_date DESC";
			$this->exec();
			
			$list = array();
			
			if($this->result)
				{
				while($rows = $this->fetch()){
					$vo = new InterviewVO();
					
					$vo->id = $rows['id'];
					$vo->interviewee = $rows['interviewee'];
					$vo->name = $rows['name'];
					$vo->subject = $rows['subject'];
					$vo->shortdescription = $rows['shortdescription'];
					$vo->description = $rows['description'];
					$vo->files = $rows['files'];
					$vo->published_date = $currentdate;
					$vo->is_archieve = $rows['is_archieve'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
				//print_r($list);
			return $list;
			}
			
			
			function remove($id){
				$vo = $this->fetchDetails($id);
				//echo $vo;				
				if($vo->id != 0){
					$this->sql = "DELETE FROM tbl_comment WHERE id = '$vo->id'";
					$this->exec();	
					if($this->result){
							return true;
					}
					else
						return false;
					}
				else
					return false;
			}
			function __destruct(){
			
			}
	}
?>