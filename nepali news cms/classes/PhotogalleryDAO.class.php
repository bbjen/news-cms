<?php
class PhotogalleryDAO extends BaseDAO{
		
		function __construct(){
			
			}
		
		function insert($vo)
			{
			$currentdate=get_current_NST();
			  $this->sql = "INSERT INTO tbl_photogallery VALUES 
							('','$vo->subject',
							'$vo->cat',
							'$vo->pby',
							'$vo->shortdescription',
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
			  $this->sql = "UPDATE tbl_photogallery SET 
								subject = '$vo->subject',
								cat = '$vo->cat',
								pby = '$vo->pby',
								shortdescription = '$vo->shortdescription',
								files = '$vo->files',
								published_date ='$currentdate',
								is_archieve = '$vo->is_archieve'
								WHERE id = '$vo->id'";  
				//return mysql_query($this->sql) or die(mysql_error());								
			return $this->exec() or die(mysql_error());
			}
		
			function fetchDetails($id){
				$this->sql = "SELECT * FROM tbl_photogallery WHERE id = '$id'";
				$this->exec();
				
				$vo = new PhotogalleryVO();
				if($this->result){
					$rows = $this->fetch();
					
					$vo->id = $rows['id'];
					$vo->subject = $rows['subject'];
					$vo->cat = $rows['cat'];
					$vo->pby = $rows['pby'];
					$vo->shortdescription = $rows['shortdescription'];
					$vo->files = $rows['files'];
					$vo->published_date = $currentdate;
					$vo->is_archieve = $rows['is_archieve'];
					
					$vo->formatFetchVariables();
				}
					
				return $vo;
			}
			
			
			function fetchPhoto($id){
			$this->sql = "SELECT * FROM tbl_photogallery WHERE cat = '$id'";
			$this->exec();
			$list = array();
				
			if($this->result){
				while($rows = $this->fetch()){
					$vo = new PhotogalleryVO();
					
					$vo->id = $rows['id'];
					$vo->subject = $rows['subject'];
					$vo->cat = $rows['cat'];
					$vo->pby = $rows['pby'];
					$vo->shortdescription = $rows['shortdescription'];
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
		function fetchDis($id, $offset, $limit){
				
				if($id!=""){
				$this->sql = "SELECT * FROM tbl_photogallery WHERE cat ='$id' ORDER BY published_date DESC LIMIT $offset, $limit";
				}else{
				$this->sql = "SELECT * FROM tbl_photogallery WHERE cat !='0' ORDER BY published_date DESC LIMIT $offset, $limit";	
				}
				$this->exec();
				//print $this->sql;
//				exit;
				$list = array();
				
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new PhotogalleryVO();
					
					$vo->id = $rows['id'];
					$vo->subject = $rows['subject'];
					$vo->cat = $rows['cat'];
					$vo->pby = $rows['pby'];
					$vo->shortdescription = $rows['shortdescription'];
					$vo->files = $rows['files'];
					$vo->published_date = $currentdate;
					$vo->is_archieve = $rows['is_archieve'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
				return $list;
			}
			function fetchCat($offset, $limit){				
				$this->sql = "SELECT * FROM tbl_photogallery WHERE cat='0' ORDER BY published_date DESC LIMIT $offset, $limit";	
				$this->exec();
				$list = array();
				
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new PhotogalleryVO();
						
						
					$vo->id = $rows['id'];
					$vo->subject = $rows['subject'];
					$vo->cat = $rows['cat'];
					$vo->pby = $rows['pby'];
					$vo->shortdescription = $rows['shortdescription'];
					$vo->files = $rows['files'];
					$vo->published_date = $currentdate;
					$vo->is_archieve = $rows['is_archieve'];
						
						$vo->formatFetchVariables();
						array_push($list, $vo);
					}
				}
				return $list;
			}
			
		function fetchAll($id){
			$this->sql = "SELECT * FROM tbl_photogallery WHERE id = '$id'";
			$this->exec();			
			$list = array();
			
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo = new PhotogalleryVO();
					
					$vo->id = $rows['id'];
					$vo->subject = $rows['subject'];
					$vo->cat = $rows['cat'];
					$vo->pby = $rows['pby'];
					$vo->shortdescription = $rows['shortdescription'];
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
			function countPhoto()
			{
			$this->sql = "SELECT count(*) as cnt FROM tbl_photogallery ORDER BY published_date";
			$this->exec();
			if($this->result)
				{
				$rows = $this->fetch();
				return $rows['cnt'];
				} 
			else
				return false;
			}
			function countPhotos($id){
			if($id!=""){
				$this->sql = "SELECT count(*) as cnt FROM tbl_photogallery WHERE cat='".$id."' ORDER BY published_date";
			}
			else{
				$this->sql = "SELECT count(*) as cnt FROM tbl_photogallery WHERE cat!='0' ORDER BY published_date";
			}
			$this->exec();		

			if($this->result){
				$rows = $this->fetch();
				return $rows['cnt'];
			} 
			else
				return false;
			}
			
			function fetchSub(){
					
			$this->sql = "SELECT * FROM tbl_photogallery WHERE cat='0' ORDER BY published_date";
			$this->exec();
			
			$list = array();
			
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo = new PhotogalleryVO();
					
					 $vo->id = $rows['id'];
					 $vo->subject = $rows['subject'];
					$vo->cat = $rows['cat'];
					$vo->pby = $rows['pby'];
					$vo->shortdescription = $rows['shortdescription'];
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
			$this->sql = "SELECT COUNT(id) AS cnt FROM tbl_photogallery WHERE id = '$id'";
			$this->exec();
			if($this->result)
				{
				$rows = $this->fetch();
				return $rows['cnt'];
				} 
			else
				return false;
			}
			
			
			function deleteit($id){
			$vo = $this->fetchDetails($id);
			if($vo->id!=0){
				$this->sql = "DELETE FROM tbl_photogallery WHERE id = '$vo->id'";
					$this->exec() or die("ERROR:".mysql_error());
				if($this->result){
					$vo->removePicture($vo->files);
					return true;
				}
				else
					return false;
				}
			else
				return false;
			}
			
			function removeCat($id){
			$vo = $this->fetchDetails($id);
			if($vo->id != 0){
				$this->sql = "DELETE FROM tbl_photogallery WHERE id = '$vo->id'";
				$this->exec();
				if($this->result){
					$smenuDAO = new PhotogalleryDAO();
					$smenuDAO->removeByParentId($vo->id);
					return true;
				}
				else
					return false;
				}
			else
				return false;
			}
			function removeByParentId($pid){	
			
				$vo = $this->fetchAll1($pid);
				
			
				if(!empty($vo)){
					$this->sql = "DELETE FROM tbl_photogallery WHERE cat = '$pid'";
					$this->exec();
					if($this->result){
						$vo1 = new PhotogalleryVO();
						foreach($vo as $lst){
						$vo1->removePicture($lst->files); 
						}
						
						return true;
					}
					else
						return false;
					}
				else
					return false;
			}
			
			function fetchAll1($pid){
				$this->sql = "SELECT * FROM tbl_photogallery WHERE cat ='$pid'";
				$this->exec();
				$list = array();				
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new PhotogalleryVO();
						
						$vo->id = $rows['id'];
						$vo->subject = $rows['subject'];
						$vo->cat = $rows['cat'];
						$vo->pby = $rows['pby'];
						$vo->shortdescription = $rows['shortdescription'];
						$vo->files = $rows['files'];
						$vo->published_date = $currentdate;
						$vo->is_archieve = $rows['is_archieve'];
						
						$vo->formatFetchVariables();
						array_push($list, $vo);
					}
				}
				
				return $list;
			}
		function countit($cat)
		{
		$this->sql = "SELECT COUNT(*) FROM tbl_photogallery WHERE id = '$cat'";
		$this->exec();
		if($this->result)
			{
			if($this->row_count($this->result)>0)
				return true;
			else
				return false;
			}
		else
			return false;
		}
			function countCategor(){
			
			$this->sql = "SELECT count(*) as cnt FROM tbl_photogallery WHERE cat=='0' ORDER BY published_date";
						
			$this->exec();		

			if($this->result){
				$rows = $this->fetch();
				return $rows['cnt'];
			} 
			else
				return false;
			}
			function countCategory($id){			
			$this->sql = "SELECT count(*) as cnt FROM tbl_photogallery WHERE cat='$id'";						
			$this->exec();		

			if($this->result){
				$rows = $this->fetch();
				return $rows['cnt'];
			} 
			else
				return false;
			}		
			
		function hasdata($cat)
		{
		$this->sql = "SELECT * FROM tbl_photogallery WHERE cat = '$cat'";
		$this->exec();
		if($this->result)
			{
			if($this->row_count($this->result)>0)
				return true;
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