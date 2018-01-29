<?php
class ContentVO {
		public $id;
		public $submenu_id;
		public $menu_id;
		public $parent_menu_id;
		public $content;
		public $page_title;
		public $page_metatag;
		public $page_keywords;
		public $page_description;
		public $page_heading;
		public $updated_date;
		public $created_date;
		
		function __construct(){
			
		}
		
		function formatInsertVariables(){
			$this->id;
			$this->submenu_id = intval($this->submenu_id);
			$this->menu_id = intval($this->menu_id);
			$this->parent_menu_id = intval($this->parent_menu_id);
			$this->content = addslashes(trim($this->content));
			$this->page_title = addslashes(trim($this->page_title));
			$this->page_metatag = addslashes(trim($this->page_metatag));
			$this->page_keywords = addslashes(trim($this->page_keywords));
			$this->page_description = addslashes(trim($this->page_description));
			$this->page_heading = addslashes(trim($this->page_heading));
			$this->updated_date = $this->updated_date;
			$this->created_date = $this->created_date;
		}
		
		function formatFetchVariables(){
			$this->id = intval($this->id);
			$this->submenu_id = intval($this->submenu_id);
			$this->menu_id = intval($this->menu_id);
			$this->parent_menu_id = intval($this->parent_menu_id);
			$this->content = stripslashes(trim($this->content));
			$this->page_title = stripslashes(trim($this->page_title));
			$this->page_metatag = stripslashes(trim($this->page_metatag));
			$this->page_keywords = stripslashes(trim($this->page_keywords));
			$this->page_description = stripslashes(trim($this->page_description));
			$this->page_heading = stripslashes(trim($this->page_heading));
			$this->updated_date = $this->updated_date;
			$this->created_date = $this->created_date;
		}
		function __destruct(){
			unset($this->id);
			unset($this->submenu);
			unset($this->menu_id);
			unset($this->parent_menu_id);
			unset($this->content);
			unset($this->page_title);
			unset($this->page_metatag);
			unset($this->page_keywords);
			unset($this->page_description);
			unset($this->page_heading);
			unset($this->updated_date);
			unset($this->created_date);
		}
	}
?>