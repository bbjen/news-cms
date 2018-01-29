<?php
class SubMenu1DAO extends BaseDAO{
		function __construct(){
		}			
		function insert($vo){
			 $this->sql = "INSERT INTO tbl_submenu1 
						VALUES('','$vo->submenu_id',
						'$vo->title','$vo->menu_order',
						'$vo->has_content')"; 
			return $this->exec();
		}
			
		function update($vo)
			{
			 $this->sql = "UPDATE tbl_submenu1 SET submenu_id = '$vo->submenu_id',title = '$vo->title', 
						  menu_order = '$vo->menu_order', has_content = '$vo->has_content' 
						  WHERE  id = '$vo->id'"; 
			return $this->exec();
			}
		function fetchAll($parent_id, $par="all")
			{
			$this->sql = "SELECT * FROM tbl_submenu1 WHERE submenu_id = '$parent_id' ORDER BY menu_order";
			if($par != "all")
				$this->sql = "SELECT * FROM tbl_submenu1 WHERE submenu_id = '$parent_id' AND has_content='yes' ORDER BY menu_order";
			
			$this->exec();//stores result in $this->result
			
			$list = array();
			if($this->result)
				{
				while($rows = $this->fetch())//fetch result stored in $this->result
					{
					$vo = new SubMenu1VO();
					
					$vo->id = $rows['id'];
					$vo->submenu_id = $rows['submenu_id'];
					$vo->title = $rows['title'];
					$vo->menu_order = $rows['menu_order'];
					$vo->has_content = $rows['has_content'];
					$vo->formatFetchVariables();

					array_push($list, $vo);
					}
				}
			return $list;
			}
		
		function fetchAllasd($sid){
			//echo "$sid";
				$this->sql = "SELECT * FROM tbl_submenu1 WHERE submenu_id = 'sid' ORDER BY menu_order";
			if($par != "all")
				$this->sql = "SELECT * FROM tbl_submenu1 WHERE submenu_id = '$sid' AND has_content='yes' ORDER BY menu_order";
				
				//print $this->sql;
				exit;
			
			$this->exec();//stores result in $this->result
			
			$list = array();
			if($this->result)
				{
				while($rows = $this->fetch())//fetch result stored in $this->result
					{
					$vo = new SubMenu1VO();
					
					$vo->id = $rows['id'];
					$vo->submenu_id = $rows['submenu_id'];
					$vo->title = $rows['title'];
					$vo->menu_order = $rows['menu_order'];
					$vo->has_content = $rows['has_content'];
					$vo->formatFetchVariables();

					array_push($list, $vo);
					}
				}
			return $list;
			}
		function fetchDetail($id)
			{
			 $this->sql = "SELECT * FROM tbl_submenu1 WHERE id = '$id'";
			$this->exec();//stores result in $this->result
			
			$vo = new SubMenuVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
				$vo->id = $rows['id'];
				$vo->submenu_id = $rows['submenu_id'];
				$vo->title = $rows['title'];
				$vo->menu_order = $rows['menu_order'];
				$vo->has_content = $rows['has_content'];
				
				$vo->formatFetchVariables();
				}
			return $vo;
			}
			
		function remove($id){
			$vo = $this->fetchDetail($id);			
			if($vo->id != 0){
				$this->sql = "DELETE FROM tbl_submenu1 WHERE id = '$vo->id'";
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
		
		function removeByParentId($pid)
			{
			$list = $this->fetchAll($pid);
			if(!empty($list))
				{
				$this->sql = "DELETE FROM tbl_submenu WHERE mainmenu_id = '$pid'";
				$this->exec();
				if($this->result)
					return true;
				else
					return false;
				}
			else
				return false;
			}
			function hasSubmenus($id)
		{
		$this->sql = "SELECT * FROM tbl_submenu WHERE mainmenu_id = '$id'";
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