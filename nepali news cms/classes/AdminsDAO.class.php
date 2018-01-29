<?php
class AdminsDAO extends BaseDAO
	{
		
		function __construct()
			{
			
			}
		
		function insert($vo)
			{
			$this->sql = "INSERT INTO tbl_admins VALUES ('','$vo->login','$vo->password','$vo->permisson','$vo->status','$vo->email','$vo->type','$vo->last_login','$vo->updated_date','$vo->created_date')";
			return $this->exec();
			}
			
		function update($vo)
			{
			$this->sql = "UPDATE tbl_admins SET login = '$vo->login',
												password = '$vo->password',
												permission = '$vo->permission',
												status = '$vo->status',
												email = '$vo->email',
												type = '$vo->type',
												last_login = '$vo->last_login',
												updated_date = '$vo->updated_date'
												WHERE id = '$vo->id'";
				//return mysql_query($this->sql) or die(mysql_error());								
			return $this->exec();
			}
		
		function fetchDetails($id)
			{
			$this->sql = "SELECT * FROM tbl_admins WHERE id = '$id'";
			$this->exec();
			
			$vo = new AdminsVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
				$vo->id = $rows['id'];
				$vo->login = $rows['login'];
				$vo->password = $rows['password'];
				$vo->permission = $rows['permission'];
				$vo->status = $rows['status'];
				$vo->email = $rows['email'];
				$vo->type = $rows['type'];
				$vo->last_login = $rows['last_login'];
				$vo->updated_date = $rows['updated_date'];
				$vo->created_date = $rows['created_date'];
				
				$vo->formatFetchVariables();
				}
				
			return $vo;
			}
		
		function fetchAll()
			{
			$this->sql = "SELECT * FROM tbl_admins  ORDER BY created_date";
			$this->exec();
			
			$list = array();
			
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo = new AdminsVO();
					
					$vo->id = $rows['id'];
					$vo->login = $rows['login'];
					$vo->password = $rows['password'];
					$vo->permission = $rows['permission'];
					$vo->status = $rows['status'];
					$vo->email = $rows['email'];
					$vo->type = $rows['type'];
					$vo->last_login = $rows['last_login'];
					$vo->updated_date = $rows['updated_date'];
					$vo->created_date = $rows['created_date'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
				//print_r($list);
			return $list;
			}
		
		function authenticate($vo)
			{
			$this->sql = "SELECT * FROM tbl_admins WHERE login = '$vo->login' 
			COLLATE latin1_general_cs AND password = '$vo->password' AND status = 'active'";
			$this->exec();//stores result in $this->result
			
			if($this->result)
				{
				if($this->row_count($this->result)==1)
					{
					$rows = $this->fetch();
					$id = intval($rows['id']);
					if($id != 0)
						return $id;
					else
						return false;
					}
				else
					return false;
				}
			else
				return false;
			}
		
		
		function ActivateNdactivate($id, $publish)
			{
			$vo= $this->fetchDetails($id);
			if($vo->id != 0)
				{
				$this->sql = "UPDATE tbl_admins SET status = '$publish' WHERE id = '$vo->id'";
				$this->exec();
				if($this->result)
					return true;
				else
					return false;
				}
			else
				return false;
			}
		
		function remove($id)
			{
			$vo = $this->fetchDetails($id);
			if($vo->id != 0)
				{
				$this->sql = "DELETE FROM tbl_admins WHERE id = '$vo->id'";
				$this->exec();
				if($this->result)
					return true;
				else
					return false;
				}
			else
				return false;
			}
		
		function updateLastLogin($id, $logintime)
			{
			$vo = $this->fetchDetails($id);
			if($vo->id != 0)
				{
				$this->sql = "UPDATE tbl_admins SET last_login = '$logintime' WHERE id = '$vo->id'";
				$this->exec();
				if($this->result)
					return true;
				else
					return false;
				}
			return false;
			}
		
		function getLastLogin($id)
			{
			$vo = $this->fetchDetails($id);
			if($vo->id != 0)
				{
				$this->sql = "SELECT last_login FROM tbl_admins WHERE id = '$vo->id'";
				$this->exec();
				if($this->result)
					{
					$rows = $this->fetch();
					$lastlogin = $rows['last_login'];
					return $lastlogin;
					}
				else
					return "";
				}
			else
				return "";
			}
		
		
		function changePassword($password, $id)
			{
			$vo = $this->fetchDetails($id);
			if($vo->id != 0)
				{
				$this->sql = "UPDATE tbl_admins SET password = '$password' WHERE id = '$vo->id'";
				$this->exec();
				if($this->result)
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