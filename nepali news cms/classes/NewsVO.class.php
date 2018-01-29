<?php
class NewsVO
	{
		public $id;
		public $title_en;
		public $brief_description_en;
		public $detail_description_en;
		public $title_de;
		public $brief_description_de;
		public $detail_description_de;
		public $publish;
		public $home_display;
		public $disp_order;
		public $posted_date;
		public $updated_date;
	
	function __construct()
		{
		
		}
		
	function formatInsertVariables()
		{
		$this->id;
		$this->title_en = addslashes(trim($this->title_en));
		$this->brief_description_en = addslashes(trim($this->brief_description_en));
		$this->detail_description_en = addslashes(trim($this->detail_description_en));
		$this->title_de = addslashes(trim($this->title_de));
		$this->brief_description_de = addslashes(trim($this->brief_description_de));
		$this->detail_description_de = addslashes(trim($this->detail_description_de));
		$this->publish = $this->publish;
		$this->home_display = $this->home_display;
		$this->disp_order = $this->disp_order;
		$this->posted_date = $this->posted_date;
		$this->updated_date = $this->updated_date;
		}
	
	function formatFetchVariables()
		{
		$this->id;
		$this->title_en = stripslashes(trim($this->title_en));
		$this->brief_description_en = stripslashes(trim($this->brief_description_en));
		$this->detail_description_en = stripslashes(trim($this->detail_description_en));
		$this->title_de = stripslashes(trim($this->title_de));
		$this->brief_description_de = stripslashes(trim($this->brief_description_de));
		$this->detail_description_de = stripslashes(trim($this->detail_description_de));
		$this->publish = $this->publish;
		$this->home_display = $this->home_display;
		$this->disp_order = $this->disp_order;
		$this->posted_date = $this->posted_date;
		$this->updated_date = $this->updated_date;
		}
	
	function getPostVars($array)
		{
		$this->id = $array['id'];
		$this->title_en = $array['title_en'];
		$this->brief_description_en = $array['brief_description_en'];
		$this->detail_description_en = $array['detail_description_en'];
		$this->title_de = $array['title_de'];
		$this->brief_description_de = $array['brief_description_de'];
		$this->detail_description_de = $array['detail_description_de'];
		$this->publish = $array['publish'];
		$this->home_display = $array['home_display'];
		$this->disp_order = $array['disp_order'];
		$this->posted_date = date("Y-m-d");
		$this->updated_date = date("Y-m-d");
		}
		
	function __destruct()
		{
		unset($this->id);
		unset($this->title_en);
		unset($this->brief_description_en);
		unset($this->detail_description_en);
		unset($this->title_de);
		unset($this->brief_description_de);
		unset($this->detail_description_de);
		unset($this->publish);
		unset($this->home_display);
		unset($this->disp_order);
		unset($this->posted_date);
		unset($this->updated_date);
		
		unset($this);
		}
	}
?>