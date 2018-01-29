<?php
class AdvertisementDAO extends BaseDAO
	{
		
		function __construct(){
			
		}
		
		function insert($vo){
			$currentdate=get_current_NST();
			  $this->sql = "INSERT INTO tbl_advertisement VALUES 
							('','$vo->name','$vo->url',
							'$vo->files',
							'$currentdate',
							'$vo->location',
							'$vo->is_archieve'							
							)"; //exit;
							//echo mysql_insert_id();
			return $this->exec();
			}
			
		function update($vo)
			{
			$currentdate=get_current_NST();
			  $this->sql = "UPDATE tbl_advertisement SET 
								name = '$vo->name',
								url = '$vo->url',
								files = '$vo->files',
								published_date ='$currentdate',
								location='$vo->location',
								is_archieve = '$vo->is_archieve'
								WHERE id = '$vo->id'";  
				//return mysql_query($this->sql) or die(mysql_error());								
			return $this->exec();
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
			
			function fetchAd(){
				$this->sql="Select * FROM tbl_advertisement  WHERE location ='Middle' AND  is_archieve='1' ORDER BY RAND() AND published_date DESC LIMIT  3";	
				$this->exec();
				
				$list = array();			
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new AdvertisementVO();
						
						$vo->id = $rows['id'];
						$vo->name = $rows['name'];
						$vo->url = $rows['url'];
						$vo->files = $rows['files'];
						$vo->location = $rows['location'];
						$vo->formatFetchVariables();
						array_push($list, $vo);
						}
					}
				//print_r($list);
			return $list;
			}
			function fetchAdLeft(){
				$this->sql="SELECT * FROM tbl_advertisement WHERE location ='Left-Top'  AND is_archieve='1' ORDER BY RAND() LIMIT  1";	
				$this->exec();
				
				$list = array();			
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new AdvertisementVO();
						
						$vo->id = $rows['id'];
						$vo->name = $rows['name'];
						$vo->url = $rows['url'];
						$vo->files = $rows['files'];
						$vo->location = $rows['location'];
						$vo->formatFetchVariables();
						array_push($list, $vo);
						}
					}
				//print_r($list);
			return $list;
			}
			
			function fetchAdLeftMiddle(){
				$this->sql="SELECT * FROM tbl_advertisement WHERE location ='Left-Middle'  AND is_archieve='1' ORDER BY RAND() LIMIT  1";	
				$this->exec();
				
				$list = array();			
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new AdvertisementVO();
						
						$vo->id = $rows['id'];
						$vo->name = $rows['name'];
						$vo->url = $rows['url'];
						$vo->files = $rows['files'];
						$vo->location = $rows['location'];
						$vo->formatFetchVariables();
						array_push($list, $vo);
						}
					}
				//print_r($list);
			return $list;
			}
			
			function fetchAdLeftBottom(){
				$this->sql="SELECT * FROM tbl_advertisement WHERE location ='Left-Bottom'  AND is_archieve='1' ORDER BY RAND() LIMIT  1";	
				$this->exec();
				
				$list = array();			
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new AdvertisementVO();
						
						$vo->id = $rows['id'];
						$vo->name = $rows['name'];
						$vo->url = $rows['url'];
						$vo->files = $rows['files'];
						$vo->location = $rows['location'];
						$vo->formatFetchVariables();
						array_push($list, $vo);
						}
					}
				//print_r($list);
			return $list;
			}
			function fetchAdRightTop(){
				$this->sql="SELECT * FROM tbl_advertisement WHERE location ='Right-Top'  AND is_archieve='1' ORDER BY RAND() LIMIT  1";	
				$this->exec();
				
				$list = array();			
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new AdvertisementVO();
						
						$vo->id = $rows['id'];
						$vo->name = $rows['name'];
						$vo->url = $rows['url'];
						$vo->files = $rows['files'];
						$vo->location = $rows['location'];
						$vo->formatFetchVariables();
						array_push($list, $vo);
						}
					}
				//print_r($list);
			return $list;
			}
			function fetchAdRightMiddle(){
				$this->sql="SELECT * FROM tbl_advertisement WHERE location ='Right-Middle'  AND is_archieve='1' ORDER BY RAND() LIMIT  1";	
				$this->exec();
				
				$list = array();			
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new AdvertisementVO();
						
						$vo->id = $rows['id'];
						$vo->name = $rows['name'];
						$vo->url = $rows['url'];
						$vo->files = $rows['files'];
						$vo->location = $rows['location'];
						$vo->formatFetchVariables();
						array_push($list, $vo);
						}
					}
				//print_r($list);
			return $list;
			}
			function fetchAdRightBottom(){
				$this->sql="SELECT * FROM tbl_advertisement WHERE location ='Right-Bottom'  AND is_archieve='1' ORDER BY RAND()";	
				$this->exec();
				
				$list = array();			
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new AdvertisementVO();
						
						$vo->id = $rows['id'];
						$vo->name = $rows['name'];
						$vo->url = $rows['url'];
						$vo->files = $rows['files'];
						$vo->location = $rows['location'];
						$vo->formatFetchVariables();
						array_push($list, $vo);
						}
					}
				//print_r($list);
			return $list;
			}
			function fetchAdBottom(){
				$this->sql="SELECT * FROM tbl_advertisement WHERE location ='Bottom' AND is_archieve='1' ORDER BY RAND() LIMIT 1";	
				$this->exec();
				
				$listbtn = array();			
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new AdvertisementVO();
						
						$vo->id = $rows['id'];
						$vo->name = $rows['name'];
						$vo->url = $rows['url'];
						$vo->files = $rows['files'];
						$vo->location = $rows['location'];
						$vo->formatFetchVariables();
						array_push($listbtn, $vo);
						}
					}
				//print_r($list);
			return $listbtn;
			}
			function fetchAd1(){
				$this->sql="Select * FROM tbl_advertisement ORDER BY RAND() LIMIT  1";	
				$this->exec();
				
				$list = array();			
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new AdvertisementVO();
						
						$vo->id = $rows['id'];
						$vo->name = $rows['name'];
						$vo->url = $rows['url'];
						$vo->files = $rows['files'];
						$vo->location = $rows['location'];
						
						$vo->formatFetchVariables();
						array_push($list, $vo);
						}
					}
				//print_r($list);
			return $list;
			}
			
			function fetchAllSub(){
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
			$this->sql = "SELECT COUNT(id) AS cnt FROM tbl_advertisement WHERE id = '$id'";
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
				$this->sql = "DELETE FROM tbl_advertisement WHERE id = '$vo->id'";
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