<?php
class ContentDAO extends BaseDAO{
		function __construct(){			
		}
		
		function insert($vo){
			 $this->sql = "INSERT INTO tbl_contents 
						 VALUES ('','$vo->submenu_id',
						'$vo->menu_id',
						'$vo->parent_menu_id',
						'$vo->content',
						'$vo->page_title',
						'$vo->page_metatag',
						'$vo->page_keywords',
						'$vo->page_description',
						'',
						'$vo->updated_date',
						'$vo->created_date')"; 
			//print $this->sql;
			return $this->exec();
			}
		
		function update($vo)
			{
			 $this->sql = "UPDATE tbl_contents SET submenu_id = '$vo->submenu_id', 
			 									  menu_id = '$vo->menu_id', 
												  parent_menu_id = '$vo->parent_menu_id', 
												  content = '$vo->content',
												  page_title = '$vo->page_title',
												  page_metatag = '$vo->page_metatag',
												  page_keywords = '$vo->page_keywords',
												  page_description = '$vo->page_description',
												  page_heading = '$vo->page_heading',
												  updated_date = '$today',
												  created_date = '$vo->created_date'
												  WHERE id = '$vo->id'"; 

			return $this->exec();
			}
		
		function fetchDetails($id)
			{
			$this->sql = "SELECT * FROM tbl_contents WHERE id = '$id'";
			$this->exec();
			
			$vo = new ContentVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
				$vo->id = $rows['id'];
				$vo->menu_id = $rows['menu_id'];
				$vo->parent_menu_id = $rows['parent_menu_id']; 
				$vo->content = $rows['content'];
				$vo->page_title = $rows['page_title'];
				$vo->page_metatag = $rows['page_metatag'];
				$vo->page_keywords = $rows['page_keywords'];
				$vo->page_description = $rows['page_description'];
				$vo->page_heading = $rows['page_heading'];
				$vo->updated_date = $rows['updated_date'];
				$vo->created_date = $rows['created_date'];
				
				$vo->formatFetchVariables();
				}
			
			return $vo;
			}
		
		function fetchByMenuIds($sid, $id, $pid){

			$this->sql = "SELECT * FROM tbl_contents WHERE submenu_id='$sid' AND menu_id = '$id' AND parent_menu_id = '$pid'";
			
			$this->exec();
			
			$vo = new ContentVO();
			if($this->result){
				$rows = $this->fetch();
				
				$vo->id = $rows['id'];
				$vo->submenu_id = $rows['submenu_id'];
				$vo->menu_id = $rows['menu_id'];
				$vo->parent_menu_id = $rows['parent_menu_id']; 
				$vo->content = $rows['content'];
				$vo->page_title = $rows['page_title'];
				$vo->page_metatag = $rows['page_metatag'];
				$vo->page_keywords = $rows['page_keywords'];
				$vo->page_description = $rows['page_description'];
				$vo->page_heading = $rows['page_heading'];
				$vo->updated_date = $rows['updated_date'];
				$vo->created_date = $rows['created_date'];
				
				$vo->formatFetchVariables();
				}
			
			return $vo;
			}
			
			function fetchByContentIds($sid,$pid)
			{
			$this->sql = "SELECT * FROM tbl_contents,tbl_submenu WHERE 
			tbl_contents.parent_menu_id=tbl_submenu.mainmenu_id 
			AND tbl_contents.menu_id ='$sid' AND tbl_contents.parent_menu_id='$pid'";
			$this->exec();
			
			$vo = new ContentVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
				$vo->id = $rows['id'];
				$vo->menu_id = $rows['menu_id'];
				$vo->parent_menu_id = $rows['parent_menu_id']; 
				$vo->content = $rows['content'];
				$vo->page_title = $rows['page_title'];
				$vo->page_metatag = $rows['page_metatag'];
				$vo->page_keywords = $rows['page_keywords'];
				$vo->page_description = $rows['page_description'];
				$vo->page_heading = $rows['page_heading'];
				$vo->updated_date = $rows['updated_date'];
				$vo->created_date = $rows['created_date'];
				$vo->title = $rows['title'];
				
				$vo->formatFetchVariables();
				}
			
			return $vo;
			}
			
		function delete($id)
			{
			$vo = $this->fetchDetails($id);
			
			if($vo->id != 0)
				{
				$this->sql = "DELETE FROM tbl_contents WHERE id = '$vo->id'";
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
			$this->sql = "SELECT DISTINCT * FROM tbl_contents WHERE menu_id = '$mid' OR parent_menu_id = '$mid'";
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
					$vo->page_title = $rows['page_title'];
					$vo->page_metatag = $rows['page_metatag'];
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
			$this->sql = "SELECT * FROM tbl_contents WHERE menu_id = '$sid'";
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
					$vo->page_title = $rows['page_title'];
					$vo->page_metatag = $rows['page_metatag'];
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
			//$this->sql = "SELECT * FROM tbl_contents WHERE menu_id = '$id' AND parent_menu_id = '$pid'"
			$this->sql = "SELECT * FROM tbl_contents WHERE menu_id = '$id' AND parent_menu_id = '$pid'";;
			$this->exec();
			
			$vo = new ContentVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
				$vo->id = $rows['id'];
				$vo->menu_id = $rows['menu_id'];
				$vo->parent_menu_id = $rows['parent_menu_id']; 
				$vo->content = $rows['content'];
				$vo->page_title = $rows['page_title'];
				$vo->page_metatag = $rows['page_metatag'];
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
				$this->sql = "DELETE FROM tbl_contents WHERE menu_id = '$mid' OR parent_menu_id = '$mid'";
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
				$this->sql = "DELETE FROM tbl_contents WHERE menu_id = '$sid'";
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