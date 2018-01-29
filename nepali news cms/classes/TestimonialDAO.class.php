<?php
class TestimonialDAO extends BaseDAO
	{
		
		function __construct()
			{
			
			}
		
		function insert($vo)
			{
			$currentdate=get_current_NST();
			 $this->sql = "INSERT INTO tbl_testimonial VALUES 
							('','$vo->test_name',
							'$vo->test_message',
							'$vo->test_image',
							'$vo->test_detail',
							'$currentdate',
							'$vo->is_archieve'
							)"; //exit;
							//echo mysql_insert_id();
			return $this->exec();
			}
			
		function update($vo)
			{
			$currentdate=get_current_NST();
			  $this->sql = "UPDATE tbl_testimonial SET 
								test_name = '$vo->test_name',
								test_message = '$vo->test_message',
								test_image = '$vo->test_image',
								test_detail = '$vo->test_detail',
								published_date ='$currentdate',
								is_archieve = '$vo->is_archieve'
								WHERE id = '$vo->id'";  
				//return mysql_query($this->sql) or die(mysql_error());								
			return $this->exec();
			}
		
		function fetchDetails($id)
			{
			$this->sql = "SELECT * FROM tbl_testimonial WHERE id = '$id'";
			$this->exec();
			
			$vo = new TestimonialVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
				$vo->id = $rows['id'];
				$vo->test_name = $rows['test_name'];
				$vo->test_message = $rows['test_message'];
				$vo->test_image = $rows['test_image'];
				$vo->test_detail = $rows['test_detail'];
				$vo->published_date = $currentdate;
				$vo->is_archieve = $rows['is_archieve'];
				
				$vo->formatFetchVariables();
				}
				
			return $vo;
			}
		
		function fetchAll()
			{
			$this->sql = "SELECT * FROM tbl_testimonial  ORDER BY published_date";
			$this->exec();
			
			$list = array();
			
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo = new TestimonialVO();
					
					$vo->id = $rows['id'];
					$vo->test_name = $rows['test_name'];
					$vo->test_message = $rows['test_message'];
					$vo->test_image = $rows['test_image'];
					$vo->test_detail = $rows['test_detail'];
					$vo->published_date = $currentdate;
					$vo->is_archieve = $rows['is_archieve'];
					
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
				$this->sql = "DELETE FROM tbl_testimonial WHERE id = '$vo->id'";
				$this->exec();
				if($this->result)
					return true;
				else
					return false;
				}
			else
				return false;
			}*/
			
	function fetchLimited($page, $perpage, $par="all")
		{
		$from = ($page-1)*$perpage;
		if($par != "all")
			$this->sql = "SELECT * FROM tbl_testimonial WHERE is_archieve = '1' ORDER BY rand() LIMIT $from, $perpage";
		else
			$this->sql = "SELECT * FROM tbl_testimonial ORDER BY rand() LIMIT $from, $perpage";
		
		$this->exec();
		$list = array();
		
		if($this->result)
			{
			while($rows = $this->fetch())
				{
				$vo = new TestimonialVO();
				
				$vo->id = $rows['id'];
				$vo->test_name = $rows['test_name'];
				$vo->test_message = $rows['test_message'];
				$vo->test_image = $rows['test_image'];
				$vo->test_detail = $rows['test_detail'];
				$vo->published_date  = $rows['published_date'];
				$vo->is_archieve = $rows['is_archieve'];
					
				$vo->formatFetchVariables();
				array_push($list, $vo);
				}
			}
		
		return $list;
		}
		
		function fetchAllTest()
			{
			$this->sql = "SELECT * FROM tbl_testimonial WHERE is_archieve = '1' ORDER BY rand() LIMIT 1";
			$this->exec();
			
			$list = array();
			
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo = new TestimonialVO();
				
				$vo->id = $rows['id'];
				$vo->test_name = $rows['test_name'];
				$vo->test_message = $rows['test_message'];
				$vo->test_image = $rows['test_image'];
				$vo->test_detail = $rows['test_detail'];
				$vo->published_date  = $rows['published_date'];
				$vo->is_archieve = $rows['is_archieve'];
					
				$vo->formatFetchVariables();
				array_push($list, $vo);
					}
				}
				//print_r($list);
			return $list;
			}
			
			function remove($id)
			{
			$vo = $this->fetchDetails($id);
			if($vo->id != 0)
				{
				$this->sql = "DELETE FROM tbl_testimonial WHERE id = '$vo->id'";
				$this->exec();
				if($this->result)
					{
					$vo->removePicture($vo->test_image);
					return true;
					}
				else
					return false;
				}
			else
				return false;
			}
		
		function updateLastLogin($id, $logintime)
			{
			$vo = $this->fetchDetails($id);
			if($vo->id != 0)
				{
				$this->sql = "UPDATE tbl_testimonial SET last_login = '$logintime' WHERE id = '$vo->id'";
				$this->exec();
				if($this->result)
					return true;
				else
					return false;
				}
			return false;
			}
		

		function __destruct()
			{
			
			}
	}
?>