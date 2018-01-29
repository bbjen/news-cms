<?php
class MainMenuVO
	{
	public $id;
	public $title;
	public $menu_order;
	public $location;
	public $has_content;
	
	function __construct()
		{
		
		}
		
	function formatInsertVariables()
		{
		$this->id = intval($this->id);
		$this->title = addslashes(trim($this->title));
		$this->menu_order = intval($this->menu_order);
		$this->location = $this->location;
		$this->has_content = $this->has_content;
		}
	
	function formatFetchVariables()
		{
		$this->id = intval($this->id);
		$this->title = stripslashes($this->title);
		$this->menu_order = intval($this->menu_order);
		$this->location = $this->location;
		$this->has_content = $this->has_content;
		}
		
	function __destruct()
		{
		unset($this->id);
		unset($this->title);
		unset($this->menu_order);
		unset($this->location);
		unset($this->has_content);
		
		unset($this);
		}
	}
?>