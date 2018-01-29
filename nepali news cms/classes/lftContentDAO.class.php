<?php
class lftContentDAO extends BaseDAO{
		function __construct(){			
		}
		
		function insert($vo){
		$currentdate=get_current_NST();
			 $this->sql = "INSERT INTO tbl_leftmenu 
						 VALUES ('','$vo->lftmenu',
						'$vo->slted',								 
						'$vo->title',
						'$vo->name',
						'$vo->email',
						'$vo->short_descs',
						'$vo->description',
						'$vo->files',
						'$currentdate',
						'0000-00-00 00:00:00',
						'$vo->is_archieve')"; 
			//echo $this->sql;
			//exit;
			return $this->exec();
		}
		
		function update($vo){
			$currentdate=get_current_NST();
			if($vo->files != ""){
	 			$this->sql = "UPDATE tbl_leftmenu SET lftmenu = '$vo->lftmenu', 
												  slted = '$vo->slted',
												  title = '$vo->title',
												  name = '$vo->name',
												  email = '$vo->email',
												  short_descs = '$vo->short_descs',
												  description = '$vo->description',
												  files  = '$vo->files',
												  update_date = '$currentdate',
												  is_archieve = '$vo->is_archieve'
												  WHERE id = '$vo->id'"; 
			}
			else{				
				$this->sql = "UPDATE tbl_leftmenu SET lftmenu = '$vo->lftmenu', 
												  slted = '$vo->slted',	
												  title = '$vo->title',
												  name = '$vo->name',
												  email = '$vo->email',
												  short_descs = '$vo->short_descs',
												  description = '$vo->description',
												  update_date = '$currentdate',
												  is_archieve = '$vo->is_archieve'
												  WHERE id = '$vo->id'"; 
			}
			return $this->exec();
			}
			
			function fetchOne(){
				//echo "called";
				$this->sql = "SELECT DISTINCT slted FROM tbl_leftmenu WHERE lftmenu='Sahitya' ORDER BY id DESC";
				$this->exec();
				$list = array();				
				if($this->result){
					while($rows = $this->fetch()){
						$vo = new lftContentVO();
						
						$vo->id = $rows['id'];
						$vo->lftmenu = $rows['lftmenu'];
						$vo->slted = $rows['slted'];						
						
						$vo->formatFetchVariables();
						array_push($list, $vo);
					}
				}
				return $list;
			}
		function fetchLatest(){
			$this->sql = "SELECT * FROM tbl_leftmenu ORDER BY published_date DESC LIMIT 10";			
			$this->exec();			
			$list = array();
			
			if($this->result){
				while($rows = $this->fetch()){
					$vo = new lftContentVO();
					
					$vo->id = $rows['id'];
					$vo->lftmenu = $rows['lftmenu'];
					$vo->slted = $rows['slted'];
					$vo->title = $rows['title'];
					$vo->name = $rows['name'];
					$vo->email = $rows['email'];
					$vo->short_descs = $rows['short_descs'];
					$vo->description = $rows['description'];
					$vo->files = $rows['files'];
					$vo->published_date = $rows['published_date'];
					$vo->update_date = $rows['update_date'];
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
				//print_r($list);
			return $list;
			}
		function fetchAll($offset, $limit){
			//echo $read;
			$this->sql = "SELECT * FROM tbl_leftmenu ORDER BY published_date DESC LIMIT $offset, $limit";
			$this->exec();
			
			$list = array();
			
			if($this->result){
				while($rows = $this->fetch()){
					$vo = new lftContentVO();
					
					$vo->id = $rows['id'];
					$vo->lftmenu = $rows['lftmenu'];
					$vo->slted = $rows['slted'];
					$vo->title = $rows['title'];
					$vo->name = $rows['name'];
					$vo->email = $rows['email'];
					$vo->short_descs = $rows['short_descs'];
					$vo->description = $rows['description'];
					$vo->files = $rows['files'];
					$vo->published_date = $rows['published_date'];
					$vo->update_date = $rows['update_date'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
				//print_r($list);
			return $list;
			}
			function fetchAll1($offset, $limit, $read, $sect){
			//echo $sect;
			if($sect==""){
				$this->sql = "SELECT * FROM tbl_leftmenu WHERE lftmenu='$read' ORDER BY published_date DESC LIMIT $offset, $limit";
			}
			else{
				$this->sql = "SELECT * FROM tbl_leftmenu WHERE lftmenu='$read' AND slted='$sect' ORDER BY published_date DESC LIMIT $offset, $limit";
			
			}
			$this->exec();
			
			$list = array();
			
			if($this->result){
				while($rows = $this->fetch()){
					$vo = new lftContentVO();
					
					$vo->id = $rows['id'];
					$vo->lftmenu = $rows['lftmenu'];
					$vo->slted = $rows['slted'];
					$vo->title = $rows['title'];
					$vo->name = $rows['name'];
					$vo->email = $rows['email'];
					$vo->short_descs = $rows['short_descs'];
					$vo->description = $rows['description'];
					$vo->files = $rows['files'];
					$vo->published_date = $rows['published_date'];
					$vo->update_date = $rows['update_date'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
				//print_r($list);
			return $list;
			}
		
		function countMenu()
			{
			$this->sql = "SELECT count(*) as cnt FROM tbl_leftmenu ORDER BY published_date ";
			$this->exec();
			if($this->result)
				{
				$rows = $this->fetch();
				return $rows['cnt'];
				} 
			else
				return false;
		}
		function countTotal($read, $sect){
			if($sect==""){
				$this->sql = "SELECT count(*) as cnt FROM tbl_leftmenu WHERE lftmenu='$read' ORDER BY published_date ";
			}
			else{
				$this->sql = "SELECT count(*) as cnt FROM tbl_leftmenu WHERE lftmenu='$read' AND slted='$sect' ORDER BY published_date ";
			}
			$this->exec();
			if($this->result)
				{
				$rows = $this->fetch();
				return $rows['cnt'];
				} 
			else
				return false;
		}
		function fetchDetails($id){
			$this->sql = "SELECT * FROM tbl_leftmenu WHERE id = '$id'";
			$this->exec();
			
			$vo = new lftContentVO();
			if($this->result){
				$rows = $this->fetch();
				
					$vo->id = $rows['id'];
					$vo->lftmenu = $rows['lftmenu'];
					$vo->slted = $rows['slted'];
					$vo->title = $rows['title'];
					$vo->name = $rows['name'];
					$vo->email = $rows['email'];
					$vo->short_descs = $rows['short_descs'];
					$vo->description = $rows['description'];
					$vo->files = $rows['files'];
					$vo->published_date = $rows['published_date'];
					$vo->update_date = $rows['update_date'];
					$vo->is_archieve = $rows['is_archieve'];
				
				$vo->formatFetchVariables();
			}
			
			return $vo;
		}
		function remove($id)
			{
			$vo = $this->fetchDetails($id);
			if($vo->id != 0)
				{
				$this->sql = "DELETE FROM tbl_leftmenu WHERE id = '$vo->id'";
				$this->exec();
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
			
		function delete($id)
			{
			$vo = $this->fetchDetails($id);
			
			if($vo->id != 0)
				{
				$this->sql = "DELETE FROM tbl_leftmenu WHERE id = '$vo->id'";
				$this->exec();
				if($this->result)
					return true;
				else
					return false;
				}
			else
				return false;
			}
			
		function fetchByMainMenuId($mid)
			{
			$this->sql = "SELECT DISTINCT * FROM tbl_leftmenu WHERE menu_id = '$mid' OR parent_menu_id = '$mid'";
			$this->exec();
			$list = array();
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo->id = $rows['id'];
					$vo->menu_id = $rows['menu_id'];
					$vo->parent_menu_id = $rows['parent_menu_id']; 
					$vo->content = $rows['content'];
					$vo->title = $rows['title'];
					$vo->name = $rows['name'];
					$vo->page_keywords = $rows['page_keywords'];
					$vo->page_description = $rows['page_description'];
					$vo->page_heading = $rows['page_heading'];
					$vo->updated_date = $rows['updated_date'];
					$vo->created_date = $rows['created_date'];
				
					$vo->formatFetchVariables();
					
					array_push($list, $vo);
					}
				}
			return $list;
			}
		
		
		function fetchBySubMenuId($sid)
			{
			$this->sql = "SELECT * FROM tbl_leftmenu WHERE menu_id = '$sid'";
			$this->exec();
			$list = array();
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo->id = $rows['id'];
					$vo->menu_id = $rows['menu_id'];
					$vo->parent_menu_id = $rows['parent_menu_id']; 
					$vo->content = $rows['content'];
					$vo->title = $rows['title'];
					$vo->name = $rows['name'];
					$vo->page_keywords = $rows['page_keywords'];
					$vo->page_description = $rows['page_description'];
					$vo->page_heading = $rows['page_heading'];
					$vo->updated_date = $rows['updated_date'];
					$vo->created_date = $rows['created_date'];
				
					$vo->formatFetchVariables();
					
					array_push($list, $vo);
					}
				}
			return $list;
			}
		
		
		function fetchByAMenuIds()
			{
			$id=$_GET['id'];
			$title=$_GET['page'];
			//SELECT * FROM contents WHERE id ='".$cid."' AND title='".$title."'
			//$this->sql = "SELECT * FROM tbl_leftmenu WHERE menu_id = '$id' AND parent_menu_id = '$pid'"
			$this->sql = "SELECT * FROM tbl_leftmenu WHERE menu_id = '$id' AND parent_menu_id = '$pid'";;
			$this->exec();
			
			$vo = new ContentVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
				$vo->id = $rows['id'];
				$vo->menu_id = $rows['menu_id'];
				$vo->parent_menu_id = $rows['parent_menu_id']; 
				$vo->content = $rows['content'];
				$vo->title = $rows['title'];
				$vo->name = $rows['name'];
				$vo->page_keywords = $rows['page_keywords'];
				$vo->page_description = $rows['page_description'];
				$vo->page_heading = $rows['page_heading'];
				$vo->updated_date = $rows['updated_date'];
				$vo->created_date = $rows['created_date'];
				
				$vo->formatFetchVariables();
				}
			
			return $vo;
			}
			
		function removeByMainMenuId($mid)
			{
			$list = $this->fetchByMainMenuId($mid);
			if(!empty($list))
				{
				$this->sql = "DELETE FROM tbl_leftmenu WHERE menu_id = '$mid' OR parent_menu_id = '$mid'";
				$this->exec();
				if($this->result)
					return true;
				else
					return false;
				}
			else
				return false;
			}
		
		function removeBySubMenuId($sid)
			{
			$list = $this->fetchBySubMenuId($sid);
			if(!empty($list))
				{
				$this->sql = "DELETE FROM tbl_leftmenu WHERE menu_id = '$sid'";
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