<?php
class MainMenuDAO extends BaseDAO{
		function __construct(){
			
		}
		function Menu(){
			$this->sql = "SELECT DISTINCT id,
										title,
										menu_order,
										has_content FROM tbl_mainmenu WHERE location ='Header'  
										ORDER BY menu_order,id ";
			$this->exec();
			$list = array();
			if($this->result){
				while($row=$this->fetch()){
				$vo=new MainMenuVO();
							
				 $vo->id=$row['id'];	
				 $vo->title = $row['title'];	
			 	 $vo->menu_order = $row['menu_order'];
				 $vo->location = $row['location'];
				 $vo->has_content= $row['has_content'];
					 
					$vo->formatFetchVariables();
					array_push($list, $vo);			
				}				
			}
			return $list;
		}
		function MenuLeft(){
			$this->sql = "SELECT DISTINCT id,title,menu_order,has_content FROM tbl_mainmenu WHERE location ='Left'  ORDER BY menu_order,id ";
			$this->exec();
			$list = array();
			if($this->result){
				while($row=$this->fetch()){
				$vo=new MainMenuVO();
							
				 $vo->id=$row['id'];	
				 $vo->title = $row['title'];	
			 	 $vo->menu_order = $row['menu_order'];
				 $vo->location = $row['location'];
				 $vo->has_content= $row['has_content'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);			
				}				
			}
			return $list;
		}
		
	function insert($vo){
		$this->sql = "INSERT INTO tbl_mainmenu 
		VALUES('','$vo->title',
		'$vo->menu_order',
		'$vo->location',
		'$vo->has_content')";
		return $this->exec();		
	}
		
	function fetchAll($par="all"){
		$this->sql = "SELECT * FROM tbl_mainmenu ORDER BY menu_order ASC";
		if($par != "all")
			$this->sql = "SELECT * FROM 
						tbl_mainmenu WHERE
			 			has_content = 'yes'
			 			ORDER BY menu_order";
		$this->exec();//stores result in $this->result
		
		$list = array();
		if($this->result){
				while($rows = $this->fetch()){
					$vo = new MainMenuVO();
					$vo->id = $rows['id'];
					$vo->title = $rows['title'];
					$vo->menu_order = $rows['menu_order'];
					$vo->location = $rows['location'];
					$vo->has_content = $rows['has_content'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
				}
		}
		return $list;
		}

	
	function update($vo){
		$this->sql = "UPDATE tbl_mainmenu
		 SET title = '$vo->title', 
		 menu_order = '$vo->menu_order', 
		 location='$vo->location',
		 has_content = '$vo->has_content' 
		 WHERE id = '$vo->id'";
		return $this->exec();
		}
		function hassmenu($id){
				$this->sql = "SELECT * FROM tbl_submenu WHERE mainmenu_id = '$id'";
				$this->exec();
				if($this->result){
					if($this->row_count($this->result)>0)
						return true;
					else
						return false;
				}
				else
					return false;
		}		

	function fetchDetail($id)
			{
			$this->sql = "SELECT * FROM tbl_mainmenu WHERE id = '$id' ORDER BY title ASC";
			$this->exec();//stores result in $this->result
			
			$vo = new MainMenuVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
				$vo->id = $rows['id'];
				$vo->title = $rows['title'];
				$vo->menu_order = $rows['menu_order'];
				$vo->location = $rows['location'];
				$vo->has_content = $rows['has_content'];
				
				$vo->formatFetchVariables();
				}
			return $vo;
		}
			
			
	function remove($id)
			{
			$vo = $this->fetchDetail($id);
			
			if($vo->id != 0)
				{
				$this->sql = "DELETE FROM tbl_mainmenu WHERE id = '$vo->id'";
				$this->exec();
				if($this->result)
					{
					$smenuDAO = new SubMenuDAO();
					$smenuDAO->removeByParentId($vo->id);
					
					$contentDAO = new ContentDAO();
					$contentDAO->removeByMainMenuId($vo->id);
					
					return true;
					}
				else
					return false;
				}
			else
				return false;
			}
	
	function hasSubmenus($id){
		$this->sql = "SELECT * FROM tbl_submenu WHERE mainmenu_id = '$id'";
		$this->exec();
		if($this->result){
			if($this->row_count($this->result)>0)
				return true;
			else
				return false;
		}
		else
			return false;
	}	
		
		function hasSubmenus1($sid){
		$this->sql = "SELECT * FROM tbl_submenu1 WHERE submenu_id = '$sid'";
		//print $this->sql;
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
		
	function __destruct(){
		
		}
	} 
?>