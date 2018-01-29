<?php
class NewsletterDAO extends BaseDAO
	{
		
		function __construct(){
			
		}
		
		function insert($vo){
			$currentdate=get_current_NST();	
			  $this->sql = "INSERT INTO tbl_newsletter VALUES 
							('','$vo->type',
							'$vo->breaking',
							'$vo->special',
							'$vo->normal',
							'$vo->flash',
							'$vo->name','$vo->subject',
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
			  $this->sql = "UPDATE tbl_newsletter SET 
			  					type = '$vo->type',
								breaking = '$vo->breaking',
								special = '$vo->special',
								normal = '$vo->normal',
								flash = '$vo->flash',
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
			$this->sql = "SELECT * FROM tbl_newsletter WHERE id = '$id'";
			$this->exec();
			
			$vo = new NewsletterVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
				$vo->id = $rows['id'];
				$vo->type = $rows['type'];
				$vo->breaking = $rows['breaking'];
				$vo->special = $rows['special'];
				$vo->normal = $rows['normal'];
				$vo->flash = $rows['flash'];
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
			$this->sql = "SELECT * FROM tbl_newsletter ORDER BY published_date DESC LIMIT $offset, $limit";
			
			$this->exec();
			
			$list = array();
			
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo = new NewsletterVO();
					
					$vo->id = $rows['id'];
					$vo->type = $rows['type'];
					$vo->breaking = $rows['breaking'];
					$vo->special = $rows['special'];
					$vo->normal = $rows['normal'];
					$vo->flash = $rows['flash'];
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
			$this->sql = "SELECT * FROM tbl_newsletter ORDER BY published_date DESC LIMIT 10";			
			$this->exec();			
			$list = array();
			
			if($this->result){
				while($rows = $this->fetch()){
					$vo = new NewsletterVO();
					
					$vo->id = $rows['id'];
					$vo->type = $rows['type'];
					$vo->breaking = $rows['breaking'];
					$vo->special = $rows['special'];
					$vo->normal = $rows['normal'];
					$vo->flash = $rows['flash'];
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
			
			
		function countNewsletter()
			{
			$this->sql = "SELECT count(*) as cnt FROM tbl_newsletter ORDER BY published_date";
			$this->exec();
			if($this->result)
				{
				$rows = $this->fetch();
				return $rows['cnt'];
				} 
			else
				return false;
			}
			
			
		function fetchNews(){
			$this->sql = "SELECT * FROM tbl_newsletter ORDER BY published_date DESC";
			$this->exec();
			
			$list = array();
			
			if($this->result){
				while($rows = $this->fetch()){
					$vo = new NewsletterVO();
					
					$vo->id = $rows['id'];
					$vo->type = $rows['type'];
					$vo->breaking = $rows['breaking'];
					$vo->special = $rows['special'];
					$vo->normal = $rows['normal'];
					$vo->flash = $rows['flash'];
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
			function fetchFlash(){
			$this->sql = "SELECT * FROM tbl_newsletter WHERE flash='1' ORDER BY published_date DESC LIMIT 1";
			$this->exec();
			
			$list = array();
			
			if($this->result){
				while($rows = $this->fetch()){
					$vo = new NewsletterVO();
					
					$vo->id = $rows['id'];
					$vo->type = $rows['type'];
					$vo->breaking = $rows['breaking'];
					$vo->special = $rows['special'];
					$vo->normal = $rows['normal'];
					$vo->flash = $rows['flash'];
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
				$this->sql = "DELETE FROM tbl_newsletter WHERE id = '$vo->id'";
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
			
				
			
			
			function fetchSlide(){
				$this->sql="Select * FROM tbl_newsletter WHERE files!='' AND special='1' ORDER BY published_date DESC LIMIT 10";	
				$this->exec();				
				$list = array();			
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new NewsletterVO();
						
						$vo->id = $rows['id'];
						$vo->type = $rows['type'];
						$vo->name = $rows['name'];
						$vo->subject = $rows['subject'];
						$vo->shortdescription = $rows['shortdescription'];
						$vo->description = $rows['description'];
						$vo->files = $rows['files'];
						
						$vo->formatFetchVariables();
						array_push($list, $vo);
						}
					}
				//print_r($list);
			return $list;
			}		

			function __destruct(){
			
			}
	}
?>