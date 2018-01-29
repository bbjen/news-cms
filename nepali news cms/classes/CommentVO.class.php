<?php
class CommentVO{
	public $id;
	public $article_id;
	public $type;
	public $name;
	public $email;
	public $address;
	public $comment;
	public $published_date;
	public $is_archieve;
	
	function __construct(){
		
		}
		
	function formatInsertVariables(){
		$this->id = $this->id;
		$this->article_id = $this->article_id;
		$this->type = $this->type;
		$this->name = $this->name;
		$this->email = $this->email;
		$this->address = $this->address;
		$this->comment = $this->comment;
		$this->published_date= $this->published_date;
		$this->is_archieve = $this->is_archieve;
	}
	
	function formatFetchVariables(){		
		$this->id = $this->id;
		$this->article_id = $this->article_id;
		$this->type = $this->type;
		$this->name = $this->name;
		$this->email = $this->email;
		$this->address = $this->address;
		$this->comment = $this->comment;
		$this->published_date= $this->published_date;
		$this->is_archieve = $this->is_archieve;		
	
		}
		
	function __destruct()
		{
		unset($this->id);
		unset($this->article_id);
		unset($this->type);
		unset($this->name);
		unset($this->email);
		unset($this->address);
		unset($this->comment);
		unset($this->published_date);
		unset($this->is_archieve);
		
		unset($this);
		}
	}
?>