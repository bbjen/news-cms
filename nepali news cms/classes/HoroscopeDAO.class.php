<?php
class HoroscopeDAO extends BaseDAO{		
		function __construct(){			
		}		
		function insert($vo){
			$currentdate=get_current_NST();
			  $this->sql = "INSERT INTO tbl_horoscope VALUES 
							('','$vo->name',
							'$vo->descs',
							'$vo->stars',
							'$currentdate'							
							)"; //exit;
							//echo mysql_insert_id();
			return $this->exec();
			}
			
		function update($vo){
			//echo "hello";
		    $this->sql = "UPDATE tbl_horoscope SET name = '$vo->name', 
												   descs = '$vo->descs', 
												   stars = '$vo->stars' 
												   WHERE id = '$vo->id'";
			return $this->exec();
			}
		
		function fetchDetails($id)
			{
			$this->sql = "SELECT * FROM tbl_horoscope WHERE id = '$id'";
			$this->exec();
			
			$vo = new BusinessVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
					$vo->id = $rows['id'];
					$vo->name = $rows['name'];
					$vo->descs = $rows['descs'];
					$vo->stars = $rows['stars'];
					$vo->dates = $rows['dates'];
				
				$vo->formatFetchVariables();
				}
				
			return $vo;
			}
		
		function fetchAll($offset, $limit){
			$this->sql = "SELECT * FROM tbl_horoscope WHERE stars!='0'  ORDER BY dates DESC LIMIT $offset, $limit";
			//echo "called";
			$this->exec();
			
			$list = array();			
			if($this->result){
				while($rows = $this->fetch()){
					
					$vo = new HoroscopeVO();
					
					$vo->id = $rows['id'];
					$vo->name = $rows['name'];
					$vo->descs = $rows['descs'];
					$vo->stars = $rows['stars'];
					$vo->dates = $rows['dates'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
				//print_r($list);
			return $list;
			}
			function countHoro()
			{
			$this->sql = "SELECT count(*) as cnt FROM tbl_horoscope WHERE stars!='0'";
			$this->exec();
			if($this->result)
				{
				$rows = $this->fetch();
				return $rows['cnt'];
				} 
			else
				return false;
			}
			
			function fetchSub(){
			$this->sql = "SELECT name FROM tbl_horoscope WHERE stars='0' ORDER BY id";			
			$this->exec();			
			$list = array();
						
			if($this->result){
				while($rows = $this->fetch()){
					$vo = new HoroscopeVO();
					
					$vo->name = $rows['name'];		
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
			return $list;
			}
		function fetchHoro(){
			$this->sql = "SELECT * FROM tbl_horoscope WHERE stars!='0' ORDER BY dates DESC LIMIT 12";
			//echo "called";
			$this->exec();
			
			$list = array();			
			if($this->result){
				while($rows = $this->fetch()){
					
					$vo = new HoroscopeVO();
					
					$vo->id = $rows['id'];
					$vo->name = $rows['name'];
					$vo->descs = $rows['descs'];
					$vo->stars = $rows['stars'];
					$vo->dates = $rows['dates'];
					
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
				$this->sql = "DELETE FROM tbl_horoscope WHERE id = '$vo->id'";
				$this->exec();
				if($this->result)
					{
					//$vo->removePicture($vo->files);
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