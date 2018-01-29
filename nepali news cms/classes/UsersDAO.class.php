<?php
class UsersDAO extends BaseDAO
	{
		
		function __construct()
			{
			
			}
		
		function insert($vo)
			{
			$currentdate=get_current_NST();
			     $this->sql = "INSERT INTO tbl_users VALUES 
							('',
							'$vo->usertype',
							'$vo->company',
							'$vo->occupation',
							'$vo->city',
							'$vo->state',
							'$vo->gender',
							'$vo->fname',
							'$vo->lname',
							'$vo->username',
							'$vo->email',
							'$vo->password',
							'$vo->zipcode',
							'$vo->country',
							'$vo->address',
							'$vo->phone',
							'$vo->mobile',
							'$vo->fax',
							'$vo->image',
							'$vo->profiles',
							'$vo->courses',
							'$vo->customer_review',
							'$vo->education',
							'$vo->keynotes_topics',
							'$vo->business_topics',
							'$vo->executive_topics',
							'$vo->public_topics',
							'$currentdate',
							'$currentdate',
							'$vo->status'
							)"; 
					return $this->exec();		
			}
			
		function update($vo)
			{
			  $currentdate=get_current_NST();
			      $this->sql = "UPDATE tbl_users SET 
			 					usertype = '$vo->usertype',
								company = '$vo->company',
								occupation = '$vo->occupation',
								city = '$vo->city',
								state = '$vo->state',
								gender = '$vo->gender',
								fname = '$vo->fname',
								lname = '$vo->lname',
								username = '$vo->username',
								email = '$vo->email',
								password = '$vo->password',
								zipcode = '$vo->zipcode',
								country = '$vo->country',
								address = '$vo->address',
								phone = '$vo->phone',
								mobile = '$vo->mobile',
								fax = '$vo->fax',
								image = '$vo->image',
								profiles = '$vo->profiles',
								courses = '$vo->courses',
								customer_review = '$vo->customer_review',
								education = '$vo->education',
								keynotes_topics = '$vo->keynotes_topics',
								business_training_topics = '$vo->business_topics',
								executive_coaching_topics = '$vo->executive_topics',
								public_speaking_topics = '$vo->public_topics',
								registerDate = '$currentdate',
								lastvisitDate = '$currentdate',
								status = '$vo->status'
								WHERE id = '$vo->id'"; //exit;
				//return mysql_query($this->sql) or die(mysql_error());								
			return $this->exec();
			}
			
			function updateKeynotesTopics($vo)
			{
			   $this->sql = "UPDATE tbl_users SET 
			 					keynotes_topics = '$vo->keynotes_topics'
								WHERE id = '$vo->id'"; //exit;
				//return mysql_query($this->sql) or die(mysql_error());								
			return $this->exec();
			}
			function updateBusinessTopics($vo)
			{
			   $this->sql = "UPDATE tbl_users SET 
			 					business_training_topics = '$vo->business_topics'
								WHERE id = '$vo->id'"; //exit;
				//return mysql_query($this->sql) or die(mysql_error());								
			return $this->exec();
			}
			function updateExecutiveTopics($vo)
			{
			   $this->sql = "UPDATE tbl_users SET 
			 					executive_coaching_topics = '$vo->executive_topics'
								WHERE id = '$vo->id'"; //exit;
				//return mysql_query($this->sql) or die(mysql_error());								
			return $this->exec();
			}
			function updatePublicSeminars($vo)
			{
			   $this->sql = "UPDATE tbl_users SET 
			 					public_speaking_topics = '$vo->public_topics'
								WHERE id = '$vo->id'"; //exit;
				//return mysql_query($this->sql) or die(mysql_error());								
			return $this->exec();
			}
			
			function updatepProfiles($vo)
			{
			   $this->sql = "UPDATE tbl_users SET 
			 					profiles = '$vo->profiles'
								WHERE id = '$vo->id'"; //exit;
				//return mysql_query($this->sql) or die(mysql_error());								
			return $this->exec();
			}
			function updatepCourses($vo)
			{
			   $this->sql = "UPDATE tbl_users SET 
			 					courses = '$vo->courses'
								WHERE id = '$vo->id'"; //exit;
				//return mysql_query($this->sql) or die(mysql_error());								
			return $this->exec();
			}
			function updatepCreview($vo)
			{
			   $this->sql = "UPDATE tbl_users SET 
			 					customer_review = '$vo->customer_review'
								WHERE id = '$vo->id'"; //exit;
				//return mysql_query($this->sql) or die(mysql_error());								
			return $this->exec();
			}
			function updatepEducation($vo)
			{
			   $this->sql = "UPDATE tbl_users SET 
			 					education = '$vo->education'
								WHERE id = '$vo->id'"; //exit;
				//return mysql_query($this->sql) or die(mysql_error());								
			return $this->exec();
			}
		function fetchDetails($id)
			{
			$this->sql = "SELECT * FROM tbl_users WHERE id = '$id'";
			$this->exec();
			
			$vo = new UsersVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
				$vo->id = $rows['id'];
				$vo->usertype = $rows['usertype'];
				$vo->company = $rows['company'];
				$vo->occupation = $rows['occupation'];
				$vo->city = $rows['city'];
				$vo->state = $rows['state'];
				
				$vo->gender = $rows['gender'];
				$vo->fname = $rows['fname'];
				$vo->lname = $rows['lname'];
				$vo->username = $rows['username'];
				$vo->email = $rows['email'];
				$vo->password = $rows['password'];
				$vo->zipcode = $rows['zipcode'];
				$vo->country = $rows['country'];
				$vo->address = $rows['address'];
				$vo->phone = $rows['phone'];
				$vo->mobile = $rows['mobile'];
				$vo->fax = $rows['fax'];
				$vo->image = $rows['image'];
				
				$vo->profiles = $rows['profiles'];
				$vo->courses = $rows['courses'];
				$vo->customer_review = $rows['customer_review'];
				$vo->education = $rows['education'];
				$vo->keynotes_topics = $rows['keynotes_topics'];
				$vo->business_training_topics = $rows['business_training_topics'];
				$vo->executive_coaching_topics = $rows['executive_coaching_topics'];
				$vo->public_speaking_topics = $rows['public_speaking_topics'];
				$vo->registerDate = $rows['registerDate'];
				$vo->lastvisitDate = $rows['lastvisitDate'];
				$vo->status = $rows['status'];
				$vo->formatFetchVariables();
				}
				
			return $vo;
			}
			
			
			function checkLoginDetails($email,$username)
			{
			$this->sql = "SELECT * FROM tbl_users WHERE email='$email' OR username='$username'";
			$this->exec();
			
			$vo = new UsersVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
				$vo->id = $rows['id'];
				$vo->usertype = $rows['usertype'];
				$vo->company = $rows['company'];
				$vo->occupation = $rows['occupation'];
				$vo->city = $rows['city'];
				$vo->state = $rows['state'];
				
				$vo->gender = $rows['gender'];
				$vo->fname = $rows['fname'];
				$vo->lname = $rows['lname'];
				$vo->username = $rows['username'];
				$vo->email = $rows['email'];
				$vo->password = $rows['password'];
				$vo->zipcode = $rows['zipcode'];
				$vo->country = $rows['country'];
				$vo->address = $rows['address'];
				$vo->phone = $rows['phone'];
				$vo->mobile = $rows['mobile'];
				$vo->fax = $rows['fax'];
				$vo->image = $rows['image'];
				
				$vo->profiles = $rows['profiles'];
				$vo->courses = $rows['courses'];
				$vo->customer_review = $rows['customer_review'];
				$vo->education = $rows['education'];
				$vo->keynotes_topics = $rows['keynotes_topics'];
				$vo->business_training_topics = $rows['business_training_topics'];
				$vo->executive_coaching_topics = $rows['executive_coaching_topics'];
				$vo->public_speaking_topics = $rows['public_speaking_topics'];
				$vo->registerDate = $rows['registerDate'];
				$vo->lastvisitDate = $rows['lastvisitDate'];
				$vo->status = $rows['status'];
				$vo->formatFetchVariables();
				}
				
			return $vo;
			}
			
			function fetchKeynotesDetails($id)
			{
			$this->sql = "SELECT keynotes_topics FROM tbl_users WHERE id='$id'";
			$this->exec();
			
			$vo = new UsersVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
				$vo->id = $rows['id'];
				$vo->keynotes_topics = $rows['keynotes_topics'];
				$keynotes_topics=explode(',' , $vo->keynotes_topics); print_r($keynotes_topics);
				$vo->formatFetchVariables();
				}
				
			return $vo;
			}
		
		function fetchAll()
			{
			$this->sql = "SELECT * FROM tbl_users  ORDER BY registerDate DESC";
			$this->exec();
			
			$list = array();
			
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo = new UsersVO();
					
				$vo->id = $rows['id'];
				$vo->usertype = $rows['usertype'];
				$vo->company = $rows['company'];
				$vo->occupation = $rows['occupation'];
				$vo->city = $rows['city'];
				$vo->state = $rows['state'];
				
				$vo->gender = $rows['gender'];
				$vo->fname = $rows['fname'];
				$vo->lname = $rows['lname'];
				$vo->username = $rows['username'];
				$vo->email = $rows['email'];
				$vo->password = $rows['password'];
				$vo->zipcode = $rows['zipcode'];
				$vo->country = $rows['country'];
				$vo->address = $rows['address'];
				$vo->phone = $rows['phone'];
				$vo->mobile = $rows['mobile'];
				$vo->fax = $rows['fax'];
				$vo->image = $rows['image'];
				
				$vo->profiles = $rows['profiles'];
				$vo->courses = $rows['courses'];
				$vo->customer_review = $rows['customer_review'];
				$vo->education = $rows['education'];
				$vo->keynotes_topics = $rows['keynotes_topics'];
				$vo->business_training_topics = $rows['business_training_topics'];
				$vo->executive_coaching_topics = $rows['executive_coaching_topics'];
				$vo->public_speaking_topics = $rows['public_speaking_topics'];
				$vo->registerDate = $rows['registerDate'];
				$vo->lastvisitDate = $rows['lastvisitDate'];
				$vo->status = $rows['status'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
				//print_r($list);
			return $list;
			}
			
			function fetchAllExecutiveSpeaker()
			{
			$this->sql = "SELECT * FROM tbl_users  ORDER BY rand() LIMIT 4";
			$this->exec();
			
			$list = array();
			
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo = new UsersVO();
					
				$vo->id = $rows['id'];
				$vo->usertype = $rows['usertype'];
				$vo->company = $rows['company'];
				$vo->occupation = $rows['occupation'];
				$vo->city = $rows['city'];
				$vo->state = $rows['state'];
				
				$vo->gender = $rows['gender'];
				$vo->fname = $rows['fname'];
				$vo->lname = $rows['lname'];
				$vo->username = $rows['username'];
				$vo->email = $rows['email'];
				$vo->password = $rows['password'];
				$vo->zipcode = $rows['zipcode'];
				$vo->country = $rows['country'];
				$vo->address = $rows['address'];
				$vo->phone = $rows['phone'];
				$vo->mobile = $rows['mobile'];
				$vo->fax = $rows['fax'];
				$vo->image = $rows['image'];
				
				$vo->profiles = $rows['profiles'];
				$vo->courses = $rows['courses'];
				$vo->customer_review = $rows['customer_review'];
				$vo->education = $rows['education'];
				$vo->keynotes_topics = $rows['keynotes_topics'];
				$vo->business_training_topics = $rows['business_training_topics'];
				$vo->executive_coaching_topics = $rows['executive_coaching_topics'];
				$vo->public_speaking_topics = $rows['public_speaking_topics'];
				$vo->registerDate = $rows['registerDate'];
				$vo->lastvisitDate = $rows['lastvisitDate'];
				$vo->status = $rows['status'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
				//print_r($list);
			return $list;
			}
			
			
			function fetchAllFSpeaker()
			{
			$this->sql = "SELECT * FROM tbl_users WHERE status = '1' ORDER BY rand() LIMIT 4";
			$this->exec();
			
			$list = array();
			
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo = new UsersVO();
					
				$vo->id = $rows['id'];
				$vo->usertype = $rows['usertype'];
				$vo->company = $rows['company'];
				$vo->occupation = $rows['occupation'];
				$vo->city = $rows['city'];
				$vo->state = $rows['state'];
				
				$vo->gender = $rows['gender'];
				$vo->fname = $rows['fname'];
				$vo->lname = $rows['lname'];
				$vo->username = $rows['username'];
				$vo->email = $rows['email'];
				$vo->password = $rows['password'];
				$vo->zipcode = $rows['zipcode'];
				$vo->country = $rows['country'];
				$vo->address = $rows['address'];
				$vo->phone = $rows['phone'];
				$vo->mobile = $rows['mobile'];
				$vo->fax = $rows['fax'];
				$vo->image = $rows['image'];
				
				$vo->profiles = $rows['profiles'];
				$vo->courses = $rows['courses'];
				$vo->customer_review = $rows['customer_review'];
				$vo->education = $rows['education'];
				$vo->keynotes_topics = $rows['keynotes_topics'];
				$vo->business_training_topics = $rows['business_training_topics'];
				$vo->executive_coaching_topics = $rows['executive_coaching_topics'];
				$vo->public_speaking_topics = $rows['public_speaking_topics'];
				$vo->registerDate = $rows['registerDate'];
				$vo->lastvisitDate = $rows['lastvisitDate'];
				$vo->status = $rows['status'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
				//print_r($list);
			return $list;
			}
			
		
		function printSpeakersearch($searchoption,$clause)
			{
			 $this->sql = "SELECT * FROM tbl_users
			 WHERE status='1' $clause
			";
			$this->exec();
			
			$list = array();
			
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo = new UsersVO();
					
				$vo->id = $rows['id'];
				$vo->usertype = $rows['usertype'];
				$vo->company = $rows['company'];
				$vo->occupation = $rows['occupation'];
				$vo->city = $rows['city'];
				$vo->state = $rows['state'];
				
				$vo->gender = $rows['gender'];
				$vo->fname = $rows['fname'];
				$vo->lname = $rows['lname'];
				$vo->username = $rows['username'];
				$vo->email = $rows['email'];
				$vo->password = $rows['password'];
				$vo->zipcode = $rows['zipcode'];
				$vo->country = $rows['country'];
				$vo->address = $rows['address'];
				$vo->phone = $rows['phone'];
				$vo->mobile = $rows['mobile'];
				$vo->fax = $rows['fax'];
				$vo->image = $rows['image'];
				
				$vo->profiles = $rows['profiles'];
				$vo->courses = $rows['courses'];
				$vo->customer_review = $rows['customer_review'];
				$vo->education = $rows['education'];
				$vo->keynotes_topics = $rows['keynotes_topics'];
				$vo->business_training_topics = $rows['business_training_topics'];
				$vo->executive_coaching_topics = $rows['executive_coaching_topics'];
				$vo->public_speaking_topics = $rows['public_speaking_topics'];
				$vo->registerDate = $rows['registerDate'];
				$vo->lastvisitDate = $rows['lastvisitDate'];
				$vo->status = $rows['status'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
				//print_r($list);
			return $list;
			}
		function keynoteSpeaker($limit)
			{
			//pagination for keynote speaker
			$this->sql = "SELECT * FROM tbl_users,
			 					tbl_keynotes WHERE tbl_users.keynotes_topics=tbl_keynotes.id
								 AND tbl_users.status='1'
								 ORDER BY rand()
			  					LIMIT $limit";
			$this->exec();
			
			$list = array();
			
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo = new UsersVO();
					
				$vo->id = $rows['id'];
				 $vo->usertype = $rows['usertype'];
				 $vo->company = $rows['company'];
				$vo->occupation = $rows['occupation'];
				$vo->city = $rows['city'];
				$vo->state = $rows['state'];
				
				$vo->gender = $rows['gender'];
				$vo->fname = $rows['fname']; 
				$vo->lname = $rows['lname'];
				$vo->username = $rows['username'];
				$vo->email = $rows['email'];
				$vo->password = $rows['password'];
				$vo->zipcode = $rows['zipcode'];
				$vo->country = $rows['country'];
				$vo->address = $rows['address'];
				$vo->phone = $rows['phone'];
				$vo->mobile = $rows['mobile'];
				$vo->fax = $rows['fax'];
				$vo->image = $rows['image'];
				
				$vo->profiles = $rows['profiles'];
				$vo->courses = $rows['courses'];
				$vo->customer_review = $rows['customer_review'];
				$vo->education = $rows['education'];
				$vo->keynotes_topics = $rows['keynotes_topics'];
				$vo->business_training_topics = $rows['business_training_topics'];
				$vo->executive_coaching_topics = $rows['executive_coaching_topics'];
				$vo->public_speaking_topics = $rows['public_speaking_topics'];
				$vo->registerDate = $rows['registerDate'];
				$vo->lastvisitDate = $rows['lastvisitDate'];
				$vo->status = $rows['status'];
				$vo->keynote_topics = $rows['keynote_topics'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
			return $list;
			}
			function businessTrainSpeaker($limit)
			{
			//pagination for keynote speaker
			$sqledt="SELECT business_training_topics FROM tbl_users";
			$edtresult=mysql_query($sqledt);
			if ($data=mysql_fetch_array($edtresult)) {
					$business_training_topics=$data['business_training_topics']; //print_r($keynotes_topics);
					$business_training_topics=explode(',' , $business_training_topics); }//print_r($keynotes_topics);}
			$this->sql = "SELECT * FROM tbl_users,
			 					tbl_business WHERE tbl_users.business_training_topics=tbl_business.id
								 AND tbl_users.status='1'
								 ORDER BY rand()
			  					LIMIT $limit";
			$this->exec();
			
			$list = array();
			
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo = new UsersVO();
					
				$vo->id = $rows['id'];
				$vo->usertype = $rows['usertype'];
				$vo->company = $rows['company'];
				$vo->occupation = $rows['occupation'];
				$vo->city = $rows['city'];
				$vo->state = $rows['state'];
				
				$vo->gender = $rows['gender'];
				$vo->fname = $rows['fname']; 
				$vo->lname = $rows['lname'];
				$vo->username = $rows['username'];
				$vo->email = $rows['email'];
				$vo->password = $rows['password'];
				$vo->zipcode = $rows['zipcode'];
				$vo->country = $rows['country'];
				$vo->address = $rows['address'];
				$vo->phone = $rows['phone'];
				$vo->mobile = $rows['mobile'];
				$vo->fax = $rows['fax'];
				$vo->image = $rows['image'];
				
				$vo->profiles = $rows['profiles'];
				$vo->courses = $rows['courses'];
				$vo->customer_review = $rows['customer_review'];
				$vo->education = $rows['education'];
				$vo->keynotes_topics = $rows['keynotes_topics'];
				$vo->business_training_topics = $rows['business_training_topics'];
				$vo->executive_coaching_topics = $rows['executive_coaching_topics'];
				$vo->public_speaking_topics = $rows['public_speaking_topics'];
				$vo->registerDate = $rows['registerDate'];
				$vo->lastvisitDate = $rows['lastvisitDate'];
				$vo->status = $rows['status'];
				$vo->business_topics = $rows['business_topics'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
				//print_r($list);
			return $list;
			}
			function exectiveSpeaker($limit)
			{
			//pagination for keynote speaker
			$sqledt="SELECT executive_coaching_topics FROM tbl_users";
			$edtresult=mysql_query($sqledt);
			if ($data=mysql_fetch_array($edtresult)) {
					$executive_coaching_topics=$data['executive_coaching_topics']; //print_r($keynotes_topics);
					$executive_coaching_topics=explode(',' , $executive_coaching_topics); }//print_r($keynotes_topics);}
			$this->sql = "SELECT * FROM tbl_users,
			 					tbl_business WHERE tbl_users.executive_coaching_topics=tbl_executive.id
								 AND tbl_users.status='1'
								 ORDER BY rand()
			  					LIMIT $limit";			  
			$this->exec();
			
			$list = array();
			
			if($this->result)
				{
				while($rows = $this->fetch())
					{
					$vo = new UsersVO();
					
				$vo->id = $rows['id'];
				 $vo->usertype = $rows['usertype'];
				 $vo->company = $rows['company'];
				$vo->occupation = $rows['occupation'];
				$vo->city = $rows['city'];
				$vo->state = $rows['state'];
				
				$vo->gender = $rows['gender'];
				$vo->fname = $rows['fname']; 
				$vo->lname = $rows['lname'];
				$vo->username = $rows['username'];
				$vo->email = $rows['email'];
				$vo->password = $rows['password'];
				$vo->zipcode = $rows['zipcode'];
				$vo->country = $rows['country'];
				$vo->address = $rows['address'];
				$vo->phone = $rows['phone'];
				$vo->mobile = $rows['mobile'];
				$vo->fax = $rows['fax'];
				$vo->image = $rows['image'];
				
				$vo->profiles = $rows['profiles'];
				$vo->courses = $rows['courses'];
				$vo->customer_review = $rows['customer_review'];
				$vo->education = $rows['education'];
				$vo->keynotes_topics = $rows['keynotes_topics'];
				$vo->business_training_topics = $rows['business_training_topics'];
				$vo->executive_coaching_topics = $rows['executive_coaching_topics'];
				$vo->public_speaking_topics = $rows['public_speaking_topics'];
				$vo->registerDate = $rows['registerDate'];
				$vo->lastvisitDate = $rows['lastvisitDate'];
				$vo->status = $rows['status'];
				$vo->executive_topics = $rows['executive_topics'];
				$vo->publicsem_topics = $rows['publicsem_topics'];
					
					$vo->formatFetchVariables();
					array_push($list, $vo);
					}
				}
				//print_r($list);
			return $list;
			}
		function fetchKeynotes($id)
			{
			$this->sql = "SELECT keynotes_topics FROM tbl_users WHERE id = '$id'";
			$this->exec();
			
			$vo = new UsersVO();
			if($this->result)
				{
				$rows = $this->fetch();
				$vo->id = $rows['id'];
				$vo->keynotes_topics=$rows['keynotes_topics'];
				//$vo->$keynotes_topics=explode(',' , $keynotes_topics);
				$vo->formatFetchVariables();
				}
				
			return $vo;
			}
		
		function authenticate($vo)
			{
			 $this->sql = "SELECT * FROM tbl_users
						 WHERE username = '$vo->username'
						 AND password = '$vo->password' 
						 AND status = '1'";
			$this->exec();//stores result in $this->result
			
			if($this->result)
				{
				if($this->row_count($this->result)==1)
					{
					$rows = $this->fetch();
					$id = intval($rows['id']);
					$usertype = $rows['usertype'];
					$_SESSION['usertype']=$usertype;
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
			
		function fetchLimited($page, $perpage, $par="all")
		{
		$userid=$_REQUEST['userid'];
		$search_value=$_REQUEST['search_value'];
		$activated_val=$_REQUEST['activated'];
		$order_by=$_REQUEST['order_by'];
		$from = ($page-1)*$perpage;
		if($par != "all")
			  $this->sql = "SELECT * FROM tbl_users WHERE status = '1' AND
			  fname LIKE '$search_value%' OR lname LIKE  '$search_value%' OR email
			  LIKE  '$search_value%' OR id='$search_value' ORDER BY rand() LIMIT $from, $perpage";
		else
			  $this->sql = "SELECT * FROM tbl_users WHERE
			  fname LIKE '$search_value%' OR lname LIKE  '$search_value%' OR email
			  LIKE  '$search_value%' OR id='$search_value' ORDER BY rand() LIMIT $from, $perpage";
		
		$this->exec();
		$list = array();
		
		if($this->result)
			{
			while($rows = $this->fetch())
				{
				$vo = new UsersVO();
				
				$vo->id = $rows['id'];
				$vo->usertype = $rows['usertype'];
				$vo->company = $rows['company'];
				$vo->occupation = $rows['occupation'];
				$vo->city = $rows['city'];
				$vo->state = $rows['state'];
				
				$vo->gender = $rows['gender'];
				$vo->fname = $rows['fname'];
				$vo->lname = $rows['lname'];
				$vo->username = $rows['username'];
				$vo->email = $rows['email'];
				$vo->password = $rows['password'];
				$vo->zipcode = $rows['zipcode'];
				$vo->country = $rows['country'];
				$vo->address = $rows['address'];
				$vo->phone = $rows['phone'];
				$vo->mobile = $rows['mobile'];
				$vo->fax = $rows['fax'];
				$vo->image = $rows['image'];
				
				$vo->profiles = $rows['profiles'];
				$vo->courses = $rows['courses'];
				$vo->customer_review = $rows['customer_review'];
				$vo->education = $rows['education'];
				$vo->keynotes_topics = $rows['keynotes_topics'];
				$vo->business_training_topics = $rows['business_training_topics'];
				$vo->executive_coaching_topics = $rows['executive_coaching_topics'];
				$vo->public_speaking_topics = $rows['public_speaking_topics'];
				$vo->registerDate = $rows['registerDate'];
				$vo->lastvisitDate = $rows['lastvisitDate'];
				$vo->status = $rows['status'];
					
				$vo->formatFetchVariables();
				array_push($list, $vo);
				}
			}
		
		return $list;
		}
		
		function fetchSearchPage()
		{
		$offset=($_GET['offset']=="")?0:$_GET['offset'];
		$pagelimit=2;
		$limit="$offset,$pagelimit";
		//end of paging variables
		//  Search Paramiter
		$searchstate=$_REQUEST['searchstate'];
		$keynote_speaker=$_REQUEST['keynote_speaker'];
		$business_training=$_REQUEST['business_training'];
		$executive_coaching=$_REQUEST['executive_coaching'];
		$executive_coaching=$_REQUEST['executive_coaching'];
		$public_seminars=$_REQUEST['public_seminars'];
		if($searchstate){
		 $this->sql="SELECT * FROM tbl_users WHERE state LIKE '%$searchstate%' ";
		 $this->sql1="SELECT * FROM tbl_users WHERE state LIKE '%$searchstate%' ";
		}
		elseif($keynote_speaker){
		echo  $this->sql="SELECT * FROM tbl_users WHERE keynotes_topics LIKE '%$keynote_speaker%'";
		echo  $this->sql1="SELECT * FROM tbl_users WHERE state LIKE '%$searchstate%' ";
		}
		elseif($business_training){
		  $this->sql="SELECT * FROM tbl_users WHERE business_training_topics LIKE '%$business_training%'";
		  $this->sql1="SELECT * FROM tbl_users WHERE state LIKE '%$searchstate%' ";
		}
		elseif($executive_coaching){
		  $this->sql="SELECT * FROM tbl_users WHERE executive_coaching_topics LIKE '%$executive_coaching%'";
		  $this->sql1="SELECT * FROM tbl_users WHERE state LIKE '%$searchstate%' ";
		}
		elseif($public_seminars){
		  $this->sql="SELECT * FROM tbl_users WHERE public_speaking_topics LIKE '%$public_seminars%'";
		  $this->sql1="SELECT * FROM tbl_users WHERE state LIKE '%$searchstate%' ";
		}
		if($limit!="")
		$this->sql .= " limit $limit";
		else
		$this->sql1 .= "";	
		
		
		$this->exec();
		$list = array();
		
		if($this->result)
			{
			while($rows = $this->fetch())
				{
				$vo = new UsersVO();
				
				$vo->id = $rows['id'];
				$vo->usertype = $rows['usertype'];
				$vo->company = $rows['company'];
				$vo->occupation = $rows['occupation'];
				$vo->city = $rows['city'];
				$vo->state = $rows['state'];
				
				$vo->gender = $rows['gender'];
				$vo->fname = $rows['fname'];
				$vo->lname = $rows['lname'];
				$vo->username = $rows['username'];
				$vo->email = $rows['email'];
				$vo->password = $rows['password'];
				$vo->zipcode = $rows['zipcode'];
				$vo->country = $rows['country'];
				$vo->address = $rows['address'];
				$vo->phone = $rows['phone'];
				$vo->mobile = $rows['mobile'];
				$vo->fax = $rows['fax'];
				$vo->image = $rows['image'];
				
				$vo->profiles = $rows['profiles'];
				$vo->courses = $rows['courses'];
				$vo->customer_review = $rows['customer_review'];
				$vo->education = $rows['education'];
				$vo->keynotes_topics = $rows['keynotes_topics'];
				$vo->business_training_topics = $rows['business_training_topics'];
				$vo->executive_coaching_topics = $rows['executive_coaching_topics'];
				$vo->public_speaking_topics = $rows['public_speaking_topics'];
				$vo->registerDate = $rows['registerDate'];
				$vo->lastvisitDate = $rows['lastvisitDate'];
				$vo->status = $rows['status'];
					
				$vo->formatFetchVariables();
				array_push($list, $vo);
				}
			}
		
		return $list;
		}
		
		function fetchRowCount()
		{
		
		//  Search Paramiter
		$searchstate=$_REQUEST['searchstate'];
		$keynote_speaker=$_REQUEST['keynote_speaker'];
		$business_training=$_REQUEST['business_training'];
		$executive_coaching=$_REQUEST['executive_coaching'];
		$executive_coaching=$_REQUEST['executive_coaching'];
		$public_seminars=$_REQUEST['public_seminars'];
		if($searchstate){
		 $this->sql="SELECT * FROM tbl_users WHERE state LIKE '%$searchstate%'";
		}
		elseif($keynote_speaker){
		 $this->sql="SELECT * FROM tbl_users WHERE keynotes_topics LIKE '%$keynote_speaker%'";
		}
		elseif($business_training){
		  $this->sql="SELECT * FROM tbl_users WHERE business_training_topics LIKE '%$business_training%'";
		}
		elseif($executive_coaching){
		  $this->sql="SELECT * FROM tbl_users WHERE executive_coaching_topics LIKE '%$executive_coaching%'";
		}
		elseif($public_seminars){
		  $this->sql="SELECT * FROM tbl_users WHERE public_speaking_topics LIKE '%$public_seminars%'";
		}
		
		$this->exec();
		$list = array();
		
		if($this->result)
			{
			while($rows = $this->fetch())
				{
				$vo = new UsersVO();
				
				$vo->id = $rows['id'];
				$vo->usertype = $rows['usertype'];
				$vo->company = $rows['company'];
				$vo->occupation = $rows['occupation'];
				$vo->city = $rows['city'];
				$vo->state = $rows['state'];
				
				$vo->gender = $rows['gender'];
				$vo->fname = $rows['fname'];
				$vo->lname = $rows['lname'];
				$vo->username = $rows['username'];
				$vo->email = $rows['email'];
				$vo->password = $rows['password'];
				$vo->zipcode = $rows['zipcode'];
				$vo->country = $rows['country'];
				$vo->address = $rows['address'];
				$vo->phone = $rows['phone'];
				$vo->mobile = $rows['mobile'];
				$vo->fax = $rows['fax'];
				$vo->image = $rows['image'];
				
				$vo->profiles = $rows['profiles'];
				$vo->courses = $rows['courses'];
				$vo->customer_review = $rows['customer_review'];
				$vo->education = $rows['education'];
				$vo->keynotes_topics = $rows['keynotes_topics'];
				$vo->business_training_topics = $rows['business_training_topics'];
				$vo->executive_coaching_topics = $rows['executive_coaching_topics'];
				$vo->public_speaking_topics = $rows['public_speaking_topics'];
				$vo->registerDate = $rows['registerDate'];
				$vo->lastvisitDate = $rows['lastvisitDate'];
				$vo->status = $rows['status'];
					
				$vo->formatFetchVariables();
				array_push($list, $vo);
				}
			}
		
		return $list;
		}
		
		
		function GetPages($numC,$limit,$page_no,$ac){
		$searchstate=$_REQUEST['searchstate'];
		$keynote_speaker=$_REQUEST['keynote_speaker'];
		$business_training=$_REQUEST['business_training'];
		$executive_coaching=$_REQUEST['executive_coaching'];
		$public_seminars=$_REQUEST['public_seminars'];
			if($numC > $limit){
			if($numC > $limit){
				$rmax = ceil($numC / $limit);
			}
			else{
				$rmax = 1;
			}
				if($page_no != 1){
				$prevpage = (int)$page_no-1;
				if($searchstate){
				echo " <a  href=$_SERVER[PHP_SELF]?searchstate=$searchstate&page=$prevpage>&laquo; Previous</a>";
				}elseif($keynote_speaker){
				echo " <a  href=$_SERVER[PHP_SELF]?keynote_speaker=$keynote_speaker&page=$prevpage>&laquo; Previous</a>";
				}
				elseif($business_training){
				echo " <a  href=$_SERVER[PHP_SELF]?business_training=$business_training&page=$prevpage>&laquo; Previous</a>";
				}
				elseif($executive_coaching){
				echo " <a  href=$_SERVER[PHP_SELF]?executive_coaching=$executive_coaching&page=$prevpage>&laquo; Previous</a>";
				}
				elseif($public_seminars){
				echo " <a  href=$_SERVER[PHP_SELF]?public_seminars=$public_seminars&page=$prevpage>&laquo; Previous</a>";
				}
			}
			for($i = 1; $i <= $rmax; $i++){
				if($page_no == $i){
					echo "&nbsp;" . "<font size=1 >" . $i . "</font>";
				}
				else{
					if($searchstate){
					echo "&nbsp;" . "<a  href=$_SERVER[PHP_SELF]?searchstate=$searchstate&page=$i>" . $i . "</a>";
					}
					elseif($keynote_speaker){
					echo "&nbsp;" . "<a  href=$_SERVER[PHP_SELF]?keynote_speaker=$keynote_speaker&page=$i>" . $i . "</a>";
					}
					elseif($business_training){
					echo "&nbsp;" . "<a  href=$_SERVER[PHP_SELF]?business_training=$business_training&page=$i>" . $i . "</a>";
					}
					if($executive_coaching){
					echo "&nbsp;" . "<a  href=$_SERVER[PHP_SELF]?executive_coaching=$executive_coaching&page=$i>" . $i . "</a>";
					}if($public_seminars){
					echo "&nbsp;" . "<a  href=$_SERVER[PHP_SELF]?public_seminars=$public_seminars&page=$i>" . $i . "</a>";
					}
				}
			}
		
			if($page_no < $rmax){
				$nextpage = (int)$page_no+1;
				if($searchstate){
				echo " | <a  href=$_SERVER[PHP_SELF]?searchstate=$searchstate&page=$nextpage>Next &raquo;</a>";
				}
				elseif($keynote_speaker){
				echo " | <a  href=$_SERVER[PHP_SELF]?keynote_speaker=$keynote_speaker&page=$nextpage>Next &raquo;</a>";
				}elseif($business_training){
				echo " | <a  href=$_SERVER[PHP_SELF]?business_training=$business_training&page=$nextpage>Next &raquo;</a>";
				}
				elseif($executive_coaching){
				echo " | <a  href=$_SERVER[PHP_SELF]?executive_coaching=$executive_coaching&page=$nextpage>Next &raquo;</a>";
				}
				elseif($public_seminars){
				echo " | <a  href=$_SERVER[PHP_SELF]?public_seminars=$public_seminars&page=$nextpage>Next &raquo;</a>";
				}
			}			
		}
	  }	
	  
	  
	  
	  function getForgetPassword($email)
			{
			$this->sql = "SELECT * FROM tbl_users WHERE email = '$email'";
			$this->exec();
			
			$vo = new UsersVO();
			if($this->result)
				{
				$rows = $this->fetch();
				
				$vo->id = $rows['id'];
				$vo->usertype = $rows['usertype'];
				$vo->company = $rows['company'];
				$vo->occupation = $rows['occupation'];
				$vo->city = $rows['city'];
				$vo->state = $rows['state'];
				
				$vo->gender = $rows['gender'];
				$vo->fname = $rows['fname'];
				$vo->lname = $rows['lname'];
				$vo->username = $rows['username'];
				$vo->email = $rows['email'];
				$vo->password = $rows['password'];
				$vo->zipcode = $rows['zipcode'];
				$vo->country = $rows['country'];
				$vo->address = $rows['address'];
				$vo->phone = $rows['phone'];
				$vo->mobile = $rows['mobile'];
				$vo->fax = $rows['fax'];
				$vo->image = $rows['image'];
				
				$vo->profiles = $rows['profiles'];
				$vo->courses = $rows['courses'];
				$vo->customer_review = $rows['customer_review'];
				$vo->education = $rows['education'];
				$vo->keynotes_topics = $rows['keynotes_topics'];
				$vo->business_training_topics = $rows['business_training_topics'];
				$vo->executive_coaching_topics = $rows['executive_coaching_topics'];
				$vo->public_speaking_topics = $rows['public_speaking_topics'];
				$vo->registerDate = $rows['registerDate'];
				$vo->lastvisitDate = $rows['lastvisitDate'];
				$vo->status = $rows['status'];
				$vo->formatFetchVariables();
				}
				
			return $vo;
			}
		
		function ActivateNdactivate($id, $publish)
			{
			$vo= $this->fetchDetails($id);
			if($vo->id != 0)
				{
				$this->sql = "UPDATE tbl_users SET status = '$publish' WHERE id = '$vo->id'";
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
				$this->sql = "DELETE FROM tbl_users WHERE id = '$vo->id'";
				$this->exec();
				if($this->result)
					{
					$vo->removePicture($vo->image);
					return true;
					}
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
				$this->sql = "UPDATE tbl_users SET last_login = '$logintime' WHERE id = '$vo->id'";
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
				$this->sql = "SELECT last_login FROM tbl_users WHERE id = '$vo->id'";
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
				$this->sql = "UPDATE tbl_users SET password = '$password' WHERE id = '$vo->id'";
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