<?php
class InterviewDAO extends BaseDAO
	{
		
		function __construct()
			{
			
			}
		
		function insert($vo)
			{
			$currentdate=get_current_NST();
			  $this->sql = "INSERT INTO tbl_interview VALUES 
							('','$vo->interviewee','$vo->name','$vo->subject',
							'$vo->shortdescription',
							'$vo->description',
							'$vo->files',
							'$currentdate',
							'$vo->is_archieve'
							)"; //exit;
							//echo mysql_insert_id();
			return $this->exec();
			}
			
		function update($vo)
			{
			$currentdate=get_current_NST();
			  $this->sql = "UPDATE tbl_interview SET 
			  					interviewee = '$vo->interviewee',
								name = '$vo->name',
								subject = '$vo->subject',
								shortdescription = '$vo->shortdescription',
								description = '$vo->description',
								files = '$vo->files',
								published_date ='$currentdate',
								is_archieve = '$vo->is_archieve'
								WHERE id = '$vo->id'";  
				//return mysql_query($this->sql) or die(mysql_error());								
			return $this->exec();
			}
		
		function fetchDetails($id)
			{
			$this->sql = "SELECT * FROM tbl_interview WHERE id = '$id'";
			$this->exec();
			
			$vo = new InterviewVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
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
			function fetchLatest(){
			$this->sql = "SELECT * FROM tbl_interview ORDER BY published_date DESC LIMIT 10";			
			$this->exec();			
			$list = array();
			
			if($this->result){
				while($rows = $this->fetch()){
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
			
			function countInterview()
			{
			$this->sql = "SELECT count(*) as cnt FROM tbl_interview ORDER BY published_date";
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
			
			function fetchAllSub()
			{
			$this->sql = "SELECT * FROM tbl_newslettersubscribers ORDER BY subscribed_date";
			$this->exec();
			
			$list = array();
			
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo = new NewsletterVO();
					
					echo $vo->id = $rows['subscriber_id'];
					$vo->email = $rows['email'];
					$vo->subscribed_date = $rows['subscribed_date'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
				//print_r($list);
			return $list;
			}
		
/*		function remove($id)
			{
			$vo = $this->fetchDetails($id);
			if($vo->id != 0)
				{
				$this->sql = "DELETE FROM tbl_newsletter WHERE id = '$vo->id'";
				$this->exec();
				if($this->result)
					return true;
				else
					return false;
				}
			else
				return false;
			}*/
			
			function countNewsletterfiles($id)
			{
			$this->sql = "SELECT COUNT(id) AS cnt FROM tbl_newsletter WHERE id = '$id'";
			$this->exec();
			if($this->result)
				{
				$rows = $this->fetch();
				return $rows['cnt'];
				} 
			else
				return false;
			}
			
			function remove($id)
			{
			$vo = $this->fetchDetails($id);
			if($vo->id != 0)
				{
				$this->sql = "DELETE FROM tbl_interview WHERE id = '$vo->id'";
				$this->exec();
				if($this->result)
					{
					$vo->removePicture($vo->files);
					return true;
					}
				else
					return false;
				}
			else
				return false;
			}
			
			
			function fetchSubDetails($id)
			{
			$this->sql = "SELECT * FROM tbl_newslettersubscribers WHERE subscriber_id = '$id'";
			$this->exec();
			
			$vo = new NewsletterVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
				$vo->id = $rows['subscriber_id'];
				$vo->email = $rows['email'];
				$vo->subscribed_date = $rows['subscribed_date'];
								
				$vo->formatFetchVariables();
				}
				
			return $vo;
			}
			
			function removeSuser($id)
			{
			$vo = $this->fetchSubDetails($id);
			if($vo->id != 0)
				{
				$this->sql = "DELETE FROM tbl_newslettersubscribers WHERE subscriber_id = '$vo->id'";
				$this->exec();
				if($this->result)
					{
					$vo->removePicture($vo->files);
					return true;
					}
				else
					return false;
				}
			else
				return false;
			}

		function __destruct()
			{
			
			}
	}
?>