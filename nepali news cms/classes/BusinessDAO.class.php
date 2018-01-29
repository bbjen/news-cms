<?php
class BusinessDAO extends BaseDAO{		
		function __construct(){			
		}
		
		function insert($vo){			
			$currentdate=get_current_NST();
			  $this->sql = "INSERT INTO tbl_business VALUES 
							('','$vo->name',
							'$vo->cat',
							'$vo->address',
							'$vo->location',
							'$vo->phone',
							'$vo->fax',
							'$vo->email',
							'$vo->url',
							'$vo->descs',
							'$vo->features',
							'$vo->files',
							'$currentdate',
							'$vo->is_archieve'
							)";	
			return $this->exec();			
		}
			
		function update($vo){
			$currentdate=get_current_NST();
			  $this->sql = "UPDATE tbl_business SET 
			  					name = '$vo->name',
								cat = '$vo->cat',
								address = '$vo->address',
								location = '$vo->location',
								phone = '$vo->phone',
								fax = '$vo->fax',
								email = '$vo->email',
								url = '$vo->url',
								descs = '$vo->descs',
								features = '$vo->features',
								files = '$vo->files',
								published_date ='$currentdate',
								is_archieve = '$vo->is_archieve'
								WHERE id = '$vo->id'";  
				//return mysql_query($this->sql) or die(mysql_error());								
			return $this->exec();
			}					
			
		function update1($vo){
			$currentdate=get_current_NST();
			  $this->sql = "UPDATE tbl_business SET 
			  					name = '$vo->name',								
								features = '$vo->features',
								published_date ='$currentdate',
								is_archieve = '$vo->is_archieve'
								WHERE id = '$vo->id'";  
				//return mysql_query($this->sql) or die(mysql_error());								
			return $this->exec();
			}
		
		function fetchDetails($id)
			{
			$this->sql = "SELECT * FROM tbl_business WHERE id = '$id'";
			$this->exec();
			
			$vo = new BusinessVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
				$vo->id = $rows['id'];
				$vo->name = $rows['name'];
				$vo->cat = $rows['cat'];
				$vo->address = $rows['address'];
				$vo->location = $rows['location'];
				$vo->phone = $rows['phone'];
				$vo->fax = $rows['fax'];
				$vo->email = $rows['email'];
				$vo->url = $rows['url'];
				$vo->descs = $rows['descs'];
				$vo->features = $rows['features'];
				$vo->files = $rows['files'];
				$vo->published_date = $currentdate;
				$vo->is_archieve = $rows['is_archieve'];
				
				$vo->formatFetchVariables();
				}
				
			return $vo;
			}	
			function fetchAll($offset, $limit){
				$this->sql = "SELECT * FROM tbl_business WHERE cat !='0' ORDER BY published_date DESC LIMIT $offset, $limit";
				$this->exec();
				//print $this->sql;
				//exit;
				$lista = array();
				
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new BusinessVO();
						
						$vo->id = $rows['id'];
						$vo->name = $rows['name'];
						$vo->address = $rows['address'];
						$vo->location = $rows['location'];
						$vo->phone = $rows['phone'];
						$vo->fax = $rows['fax'];
						$vo->email = $rows['email'];
						$vo->url = $rows['url'];
						$vo->descs = $rows['descs'];
						$vo->features = $rows['features'];
						$vo->files = $rows['files'];
						
						$vo->formatFetchVariables();
						array_push($lista, $vo);
					}
				}
				return $lista;
			}
			function fetchBizCat($offset, $limit){
				$this->sql = "SELECT * FROM tbl_business WHERE cat='0' ORDER BY published_date DESC LIMIT $offset, $limit";
				$this->exec();
				//print $this->sql;
				//exit;
				$lista = array();
				
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new BusinessVO();
						
						$vo->id = $rows['id'];
						$vo->name = $rows['name'];
						$vo->address = $rows['address'];
						$vo->location = $rows['location'];
						$vo->phone = $rows['phone'];
						$vo->fax = $rows['fax'];
						$vo->email = $rows['email'];
						$vo->url = $rows['url'];
						$vo->descs = $rows['descs'];
						$vo->features = $rows['features'];
						$vo->files = $rows['files'];
						
						$vo->formatFetchVariables();
						array_push($lista, $vo);
					}
				}
				return $lista;
			}
		
			function fetchDis($id, $offset, $limit){				
				if($id!=""){
				$this->sql = "SELECT * FROM tbl_business WHERE cat ='$id' ORDER BY published_date DESC LIMIT $offset, $limit";
				}else{
				$this->sql = "SELECT * FROM tbl_business WHERE cat !='0' ORDER BY published_date DESC LIMIT $offset, $limit";	
				}
				$this->exec();
				//print $this->sql;
//				exit;
				$list = array();
				
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new BusinessVO();
						
						$vo->id = $rows['id'];
						$vo->name = $rows['name'];
						$vo->address = $rows['address'];
						$vo->location = $rows['location'];
						$vo->phone = $rows['phone'];
						$vo->fax = $rows['fax'];
						$vo->email = $rows['email'];
						$vo->url = $rows['url'];
						$vo->descs = $rows['descs'];
						$vo->features = $rows['features'];
						$vo->files = $rows['files'];
						
						$vo->formatFetchVariables();
						array_push($list, $vo);
					}
				}
				return $list;
			}
			
			function fetchCat($offset, $limit){				
				$this->sql = "SELECT * FROM tbl_business WHERE cat='0' ORDER BY published_date DESC LIMIT $offset, $limit";	
				$this->exec();
				$list = array();
				
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new BusinessVO();
						
						$vo->id = $rows['id'];
						$vo->name = $rows['name'];
						$vo->address = $rows['address'];
						$vo->location = $rows['location'];
						$vo->phone = $rows['phone'];
						$vo->fax = $rows['fax'];
						$vo->email = $rows['email'];
						$vo->url = $rows['url'];
						$vo->descs = $rows['descs'];
						$vo->features = $rows['features'];
						$vo->files = $rows['files'];
						
						$vo->formatFetchVariables();
						array_push($list, $vo);
					}
				}
				return $list;
			}
			
			function fetchDir($id,$offset, $limit){
				echo $id;
				if($data=="" and $alpha==""){
					$this->sql="SELECT * FROM tbl_business WHERE  cat='$id'";
					$this->exec();
					//$num_rows = mysql_num_rows($result);
				}
				if($id=="" && $data==""){
					$this->sql="SELECT * FROM tbl_business WHERE cat='0' AND name LIKE '$alpha%'";
					$this->exec();
					//$num_rows = mysql_num_rows($result);
				}	
				if($id=="" && $alpha==""){
					if($loc!="All"){	
						$this->sql="SELECT * FROM tbl_business WHERE location='$loc' AND cat!='0' AND name LIKE '%$data%'";
					}
					else{
						$this->sql="SELECT * FROM tbl_business WHERE  name LIKE '%$data%'";				
					}
					$this->exec();
					//$num_rows = mysql_num_rows($result);
				}
		
				//$this->sql = "SELECT * FROM tbl_business WHERE cat='0' ORDER BY published_date DESC LIMIT $offset, $limit";	
				//$this->exec();
				$list = array();
				
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new BusinessVO();
						
						$vo->id = $rows['id'];
						$vo->name = $rows['name'];
						$vo->address = $rows['address'];
						$vo->location = $rows['location'];
						$vo->phone = $rows['phone'];
						$vo->fax = $rows['fax'];
						$vo->email = $rows['email'];
						$vo->url = $rows['url'];
						$vo->descs = $rows['descs'];
						$vo->features = $rows['features'];
						$vo->files = $rows['files'];
						
						$vo->formatFetchVariables();
						array_push($list, $vo);
					}
				}
				return $list;
			}
			
			function fetchAll1($pid){
				$this->sql = "SELECT * FROM tbl_business WHERE cat ='$pid'";
				$this->exec();
				$list = array();				
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new BusinessVO();
						
						$vo->id = $rows['id'];
						$vo->name = $rows['name'];
						$vo->address = $rows['address'];
						$vo->location = $rows['location'];
						$vo->phone = $rows['phone'];
						$vo->fax = $rows['fax'];
						$vo->email = $rows['email'];
						$vo->url = $rows['url'];
						$vo->descs = $rows['descs'];
						$vo->features = $rows['features'];
						$vo->files = $rows['files'];
						
						$vo->formatFetchVariables();
						array_push($list, $vo);
					}
				}
				return $list;
			}
			function fetchCategory(){
			$this->sql = "SELECT * FROM tbl_business WHERE cat='0' ORDER BY published_date DESC";
			$this->exec();
			
			$list = array();
			
			if($this->result){
				while($rows = $this->fetch()){
					$vo = new BusinessVO();
					
					$vo->id = $rows['id'];
					$vo->name = $rows['name'];
					$vo->cat = $rows['cat'];
					$vo->address = $rows['address'];
					$vo->location = $rows['location'];
					$vo->phone = $rows['phone'];
					$v0->fax = $rows['fax'];
					$vo->email = $rows['email'];
					$vo->url = $rows['url'];
					$vo->descs = $rows['descs'];
					$vo->features = $rows['features'];
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
			function fetchLoc(){
			$this->sql = "SELECT DISTINCT(location) FROM tbl_business WHERE cat!=0 ORDER BY location ASC";
			$this->exec();
			
			$list = array();
			
			if($this->result){
				while($rows = $this->fetch()){
					$vo = new BusinessVO();
					
					$vo->id = $rows['id'];
					$vo->name = $rows['name'];
					$vo->cat = $rows['cat'];
					$vo->address = $rows['address'];
					$vo->location = $rows['location'];
					$vo->phone = $rows['phone'];
					$vo->email = $rows['email'];
					$vo->url = $rows['url'];
					$vo->features = $rows['features'];
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
			
			function countBusiness($id){
			if($id!=""){
				$this->sql = "SELECT count(*) as cnt FROM tbl_business WHERE cat='".$id."' ORDER BY published_date";
			}
			else{
				$this->sql = "SELECT count(*) as cnt FROM tbl_business WHERE cat!='0' ORDER BY published_date";
				//echo "hello";
			}
			$this->exec();		

			if($this->result){
				$rows = $this->fetch();
				return $rows['cnt'];
			} 
			else
				return false;
			}
			
			function countDir($id){				
				$this->sql = "SELECT count(*) as cnt FROM tbl_business WHERE cat='".$id."' ORDER BY published_date";
				
				$this->exec();		

			if($this->result){
				$rows = $this->fetch();
				return $rows['cnt'];
			} 
			else
				return false;
			}
			
			function countBizCat()
			{
			$this->sql = "SELECT count(*) as cnt FROM tbl_business WHERE cat='0' ORDER BY published_date";
			$this->exec();
			if($this->result)
				{
				$rows = $this->fetch();
				return $rows['cnt'];
				} 
			else
				return false;
			}
			
			function countCategory(){
			
			$this->sql = "SELECT count(*) as cnt FROM tbl_business WHERE cat=='0' ORDER BY published_date";
						
			$this->exec();		

			if($this->result){
				$rows = $this->fetch();
				return $rows['cnt'];
			} 
			else
				return false;
			}
			
			
			function fetchSub(){						
			$this->sql = "SELECT * FROM tbl_business WHERE cat='0' ORDER BY published_date";
			//echo "SELECT * FROM tbl_photogallery";
			//exit;
			$this->exec();			
			$list = array();
			
			if($this->result){
				while($rows = $this->fetch()){
					$vo = new PhotogalleryVO();
					
					 $vo->id = $rows['id'];
					 $vo->name = $rows['name'];
					$vo->cat = $rows['cat'];
					$vo->address = $rows['address'];
					$vo->email = $rows['email'];
					$vo->url = $rows['url'];
					$vo->features = $rows['features'];
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
			if($vo->id != 0){
				$this->sql = "DELETE FROM tbl_business WHERE id = '$vo->id'";
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
			
			function removeCat($id){
			$vo = $this->fetchDetails($id);
			if($vo->id != 0){
				$this->sql = "DELETE FROM tbl_business WHERE id = '$vo->id'";
				$this->exec();
				if($this->result){
					$smenuDAO = new BusinessDAO();
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
			$list = $this->fetchAll1($pid);
			if(!empty($list)){
				$this->sql = "DELETE FROM tbl_business WHERE cat = '$pid'";
				$this->exec();
				if($this->result)
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