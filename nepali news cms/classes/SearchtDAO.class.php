<?php
class AdvertisementDAO extends BaseDAO
	{
		
		function __construct(){			
		}		
		
		function fetchDetails($id)
			{
			$this->sql = "SELECT * FROM tbl_advertisement WHERE id = '$id'";
			$this->exec();
			
			$vo = new AdvertisementVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
				$vo->id = $rows['id'];
				$vo->name = $rows['name'];
				$vo->url = $rows['url'];
				$vo->files = $rows['files'];
				$vo->published_date = $currentdate;
				$vo->location = $rows['location'];
				$vo->is_archieve = $rows['is_archieve'];
								
				$vo->formatFetchVariables();
				}
				
			return $vo;
			}
		
		function fetchAll($offset, $limit)
			{
			$this->sql = "SELECT * FROM tbl_advertisement ORDER BY published_date DESC LIMIT $offset, $limit";
			$this->exec();
			
			$list = array();
			
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo = new AdvertisementVO();
					
					$vo->id = $rows['id'];
					$vo->name = $rows['name'];
					$vo->url = $rows['url'];
					$vo->files = $rows['files'];
					$vo->published_date = $currentdate;
					$vo->location = $rows['location'];
					$vo->is_archieve = $rows['is_archieve'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
				//print_r($list);
			return $list;
			}
			function countAdvertisement()
			{
			$this->sql = "SELECT count(*) as cnt FROM tbl_advertisement ORDER BY published_date";
			$this->exec();
			if($this->result)
				{
				$rows = $this->fetch();
				return $rows['cnt'];
				} 
			else
				return false;
			}
			
			
		function __destruct(){			
		}
	}
?>