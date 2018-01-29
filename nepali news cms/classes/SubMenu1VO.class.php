<?php
class SubMenu1VO{
		public $id;
		public $submenu_id;
		public $title;
		public $menu_order;
		public $has_content;
		
		function __construct(){
			
		}
			
		function formatInsertVariables(){
			$this->id = intval($this->id);
			$this->submenu_id = intval($this->submenu_id);
			$this->title = addslashes(trim($this->title));
			$this->menu_order = intval($this->menu_order);
			$this->has_content = $this->has_content;
		}
			
		function formatFetchVariables(){
			$this->id = intval($this->id);
			$this->submenu_id = intval($this->submenu_id);
			$this->title = stripslashes(trim($this->title));
			$this->menu_order = intval($this->menu_order);
			$this->has_content = $this->has_content;
			//print_r($this);
		}
			
		function __destruct(){
			unset($this->id);
			unset($this->submenu_id);
			unset($this->title);
			unset($this->menu_order);
			unset($this->has_content);
			
			unset($this);
		}
	}
?>