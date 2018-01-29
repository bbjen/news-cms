<?php
class AdminsVO
	{
		public $id;
		public $login;
		public $password;
		public $permission;
		public $status;
		public $email;
		public $type;
		public $last_login;
		public $updated_date;
		public $created_date;
		
		function __construct()
			{
			
			}
		
		function formatFetchVariables()
			{
			$this->id = intval($this->id);
			$this->login = stripslashes(trim($this->login));
			$this->password = $this->password;
			$this->permission = $this->permission;
			$this->status = $this->status;
			$this->email = trim($this->email);
			$this->type = $this->type;
			$this->last_login = $this->last_login;
			$this->updated_date = $this->updated_date;
			$this->created_date = $this->created_date;
			}
		
		function formatInsertVariables()
			{
			$this->id = intval($this->id);
			$this->login = addslashes(trim($this->login));
			$this->password = trim($this->password);
			$this->permission = $this->permission;
			$this->status = $this->status;
			$this->email = trim($this->email);
			$this->type = $this->type;
			$this->last_login = $this->last_login;
			$this->updated_date = $this->updated_date;
			$this->created_date = $this->created_date;
			}
		
		function __destruct()
			{
			unset($this->id);
			unset($this->login);
			unset($this->password);
			unset($this->permission);
			unset($this->status);
			unset($this->email);
			unset($this->type);
			unset($this->last_login);
			unset($this->updated_date);
			unset($this->created_date);
			
			unset($this);
			}
		
	}
?>