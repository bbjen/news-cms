<?php
class HoroscopeVO{
		public $id;
		public $name;
		public $descs;
		public $stars;
		public $dates;	
		
		function __construct(){			
		}
		
		function formatFetchVariables(){
			$this->id = intval($this->id);
			$this->name = $this->name;
			$this->descs = $this->descs;
			$this->stars = $this->stars;
			$this->dates = $this->dates;
		}
		
		function formatInsertVariables(){
			$this->id = intval($this->id);
			$this->name = $this->name;
			$this->descs = $this->descs;
			$this->stars = $this->stars;
			$this->dates = $this->dates;
		}
			
			
		
		function __destruct(){
			
			unset($this->id);
			unset($this->name);
			unset($this->descs);
			unset($this->stars);
			unset($this->dates);
		
			unset($this);
			}	
	}
?>