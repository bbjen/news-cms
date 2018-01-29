<?php
class SubMenuVO
	{
		public $id;
		public $mainmenu_id;
		public $title;
		public $menu_order;
		public $has_content;
		
		function __construct()
			{
			
			}
			
		function formatInsertVariables()
			{
			$this->id = intval($this->id);
			$this->mainmenu_id = intval($this->mainmenu_id);
			$this->title = addslashes(trim($this->title));
			$this->menu_order = intval($this->menu_order);
			$this->has_content = $this->has_content;
			}
			
		function formatFetchVariables()
			{
			$this->id = intval($this->id);
			$this->mainmenu_id = intval($this->mainmenu_id);
			$this->title = stripslashes(trim($this->title));
			$this->menu_order = intval($this->menu_order);
			$this->has_content = $this->has_content;
			//print_r($this);
			}
			
		function __destruct()
			{
			unset($this->id);
			unset($this->mainmenu_id);
			unset($this->title);
			unset($this->menu_order);
			unset($this->has_content);
			
			unset($this);
			}
	}
?>