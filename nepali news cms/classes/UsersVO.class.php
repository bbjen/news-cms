<?php
class UsersVO
	{
		public $id;
		public $usertype;
		public $company;
		public $occupation;
		public $city;
		public $state;
		public $gender;
		public $fname;
		public $lname;
		public $username;
		public $email;
		public $password;
		public $zipcode;
		public $country;
		public $address;
		public $phone;
		public $mobile;
		public $fax;
		public $image;
		public $profiles;
		public $courses;
		public $customer_review;
		public $education;
		public $keynotes_topics;
		public $business_training_topics;
		public $executive_coaching_topics;
		public $public_speaking_topics;
		public $registerDate;
		public $lastvisitDate;
		public $status;
		
		function __construct()
			{
			
			}
		
		function formatFetchVariables()
			{
			$this->id = intval($this->id);
			$this->usertype = $this->usertype;
			$this->company = $this->company;
			$this->occupation = $this->occupation;
			$this->city = $this->city;
			$this->state = $this->state;
			$this->gender = $this->gender;
			$this->fname = $this->fname;
			$this->lname = $this->lname;
			$this->username = $this->username;
			$this->email = $this->email;
			
			$this->password = $this->password;
			$this->zipcode = $this->zipcode;
			$this->country = $this->country;
			$this->address = $this->address;
			$this->phone = $this->phone;
			$this->mobile = $this->mobile;
			$this->fax = $this->fax;
			$this->image = $this->image;
			$this->profiles = addslashes(trim($this->profiles));
			$this->courses = addslashes(trim($this->courses));
			
			$this->customer_review = addslashes(trim($this->customer_review));
			$this->education = addslashes(trim($this->education));
			$this->keynotes_topics = $this->keynotes_topics;
			$this->business_training_topics = $this->business_training_topics;
			$this->executive_coaching_topics = $this->executive_coaching_topics;
			$this->public_speaking_topics = $this->public_speaking_topics;
			$this->registerDate = $this->registerDate;
			$this->lastvisitDate = $this->lastvisitDate;
			$this->status = $this->status;
			
			}
		
		function formatInsertVariables()
			{
			$this->id = intval($this->id);
			$this->usertype = $this->usertype;
			$this->company = addslashes(trim($this->company));
			$this->occupation = $this->occupation;
			$this->city = $this->city;
			$this->state = $this->state;
			$this->gender = $this->gender;
			$this->fname = $this->fname;
			$this->lname = $this->lname;
			$this->username = $this->username;
			$this->email = $this->email;
			
			$this->password = $this->password;
			$this->zipcode = $this->zipcode;
			$this->country = $this->country;
			$this->address = $this->address;
			$this->phone = $this->phone;
			$this->mobile = $this->mobile;
			$this->fax = $this->fax;
			$this->image = $this->image;
			$this->profiles = addslashes(trim($this->profiles));
			$this->courses = addslashes(trim($this->courses));
			
			$this->customer_review = addslashes(trim($this->customer_review));
			$this->education = addslashes(trim($this->education));
			$this->keynotes_topics = $this->keynotes_topics;
			$this->business_training_topics = $this->business_training_topics;
			$this->executive_coaching_topics = $this->executive_coaching_topics;
			$this->public_speaking_topics = $this->public_speaking_topics;
			$this->registerDate = $this->registerDate;
			$this->lastvisitDate = $this->lastvisitDate;
			$this->status = $this->status;
			
			}
			
			function uploadFile($tmpFile)
			{
				if(is_uploaded_file($tmpFile) && move_uploaded_file($tmpFile, "../images/uploaded/uploadMemberImage/".$this->file_name))
					return true;
				else
					return false;	
			}
			
		function removePicture($file)
			{
			if(file_exists("../images/uploaded/uploadMemberImage/".$file) && $file!="")
				unlink("../images/uploaded/uploadMemberImage/".$file);
			if(file_exists("../images/uploaded/uploadMemberImage/thumb/".$file) && $file!="")
				unlink("../images/uploaded/uploadMemberImage/thumb/".$file);
			if(file_exists("../images/uploaded/uploadMemberImage/thumb/".$file) && $file!="")
				unlink("../images/uploaded/uploadMemberImage/thumb/".$file);
				
			if(file_exists("../images/uploaded/uploadMemberImage/lthumb/".$file) && $file!="")
				unlink("../images/uploaded/uploadMemberImage/lthumb/".$file);
				
			if(file_exists("../images/uploaded/uploadMemberImage/rthumb/".$file) && $file!="")
				unlink("../images/uploaded/uploadMemberImage/rthumb/".$file);	
			
			if(file_exists("../images/uploaded/uploadMemberImage/blog/".$file) && $file!="")
				unlink("../images/uploaded/uploadMemberImage/blog/".$file);						
			}
			
			function removeFrontPicture($file)
			{
			if(file_exists("images/uploaded/uploadMemberImage/".$file) && $file!="")
				unlink("images/uploaded/uploadMemberImage/".$file);
			if(file_exists("images/uploaded/uploadMemberImage/thumb/".$file) && $file!="")
				unlink("images/uploaded/uploadMemberImage/thumb/".$file);
			if(file_exists("images/uploaded/uploadMemberImage/lthumb/".$file) && $file!="")
				unlink("images/uploaded/uploadMemberImage/lthumb/".$file);
				
			if(file_exists("images/uploaded/uploadMemberImage/rthumb/".$file) && $file!="")
				unlink("images/uploaded/uploadMemberImage/rthumb/".$file);	
				
			if(file_exists("images/uploaded/uploadMemberImage/blog/".$file) && $file!="")
				unlink("images/uploaded/uploadMemberImage/blog/".$file);			
			}
		
		//to make the thumbnail of the image
		function thumbnailAndUpload($mimetype,$tmp_path,$image_name,$thumb_width,$thumb_height) 
			{ 			
			switch($mimetype) 
				{
				case "image/jpg":
				case "image/jpeg":
				case "image/pjpeg":
						$src_img=imagecreatefromjpeg("$tmp_path");
						break;
				case "image/gif":
						$src_img = imagecreatefromgif("$tmp_path");
						break;
				case "image/png":
				case "image/x-png":	
						$src_img = imagecreatefrompng("$tmp_path");
						break;
				}		
			$origw = imagesx($src_img); //original image width
			$origh = imagesy($src_img); //original image height
		    $new_w = $thumb_width; 
			$new_h = $thumb_height; 
			$dst_img = imagecreatetruecolor($new_w,$new_h);
			imagecopyresized($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img)); 
			
			switch($mimetype) 
				{
				case "image/jpg":
				case "image/jpeg":
				case "image/pjpeg":
						imagejpeg($dst_img, "../images/uploaded/uploadMemberImage/thumb/$image_name"); 
						break;
				case "image/gif":
						imagegif($dst_img, "../images/uploaded/uploadMemberImage/thumb/$image_name"); 
						break;
				case "image/png":
				case "image/x-png":
						imagepng($dst_img, "../images/uploaded/uploadMemberImage/thumb/$image_name"); 
						break;
				}			
			chmod("../images/uploaded/uploadMemberImage/thumb/$image_name",0777);  
			return true; 
			}
			function bigthumbnailAndUpload($mimetype,$tmp_path,$image_name,$thumb_width,$thumb_height) 
			{ 			
			switch($mimetype) 
				{
				case "image/jpg":
				case "image/jpeg":
				case "image/pjpeg":
						$src_img=imagecreatefromjpeg("$tmp_path");
						break;
				case "image/gif":
						$src_img = imagecreatefromgif("$tmp_path");
						break;
				case "image/png":
				case "image/x-png":	
						$src_img = imagecreatefrompng("$tmp_path");
						break;
				}		
			$origw = imagesx($src_img); //original image width
			$origh = imagesy($src_img); //original image height
		    $new_w = $thumb_width; 
			$new_h = $thumb_height; 
			$dst_img = imagecreatetruecolor($new_w,$new_h);
			imagecopyresized($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img)); 
			
			switch($mimetype) 
				{
				case "image/jpg":
				case "image/jpeg":
				case "image/pjpeg":
						imagejpeg($dst_img, "../images/uploaded/uploadMemberImage/rthumb/$image_name"); 
						break;
				case "image/gif":
						imagegif($dst_img, "../images/uploaded/uploadMemberImage/rthumb/$image_name"); 
						break;
				case "image/png":
				case "image/x-png":
						imagepng($dst_img, "../images/uploaded/uploadMemberImage/rthumb/$image_name"); 
						break;
				}			
			chmod("../images/uploaded/uploadMemberImage/rthumb/$image_name",0777);  
			return true; 
			}
			
			function blogthumbUpload($mimetype,$tmp_path,$image_name,$thumb_width,$thumb_height) 
			{ 			
			switch($mimetype) 
				{
				case "image/jpg":
				case "image/jpeg":
				case "image/pjpeg":
						$src_img=imagecreatefromjpeg("$tmp_path");
						break;
				case "image/gif":
						$src_img = imagecreatefromgif("$tmp_path");
						break;
				case "image/png":
				case "image/x-png":	
						$src_img = imagecreatefrompng("$tmp_path");
						break;
				}		
			$origw = imagesx($src_img); //original image width
			$origh = imagesy($src_img); //original image height
		    $new_w = $thumb_width; 
			$new_h = $thumb_height; 
			$dst_img = imagecreatetruecolor($new_w,$new_h);
			imagecopyresized($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img)); 
			
			switch($mimetype) 
				{
				case "image/jpg":
				case "image/jpeg":
				case "image/pjpeg":
						imagejpeg($dst_img, "../images/uploaded/uploadMemberImage/blog/$image_name"); 
						break;
				case "image/gif":
						imagegif($dst_img, "../images/uploaded/uploadMemberImage/blog/$image_name"); 
						break;
				case "image/png":
				case "image/x-png":
						imagepng($dst_img, "../images/uploaded/uploadMemberImage/blog/$image_name"); 
						break;
				}			
			chmod("../images/uploaded/uploadMemberImage/blog/$image_name",0777);  
			return true; 
			}
			function speakerDthumbUpload($mimetype,$tmp_path,$image_name,$thumb_width,$thumb_height) 
			{ 			
			switch($mimetype) 
				{
				case "image/jpg":
				case "image/jpeg":
				case "image/pjpeg":
						$src_img=imagecreatefromjpeg("$tmp_path");
						break;
				case "image/gif":
						$src_img = imagecreatefromgif("$tmp_path");
						break;
				case "image/png":
				case "image/x-png":	
						$src_img = imagecreatefrompng("$tmp_path");
						break;
				}		
			$origw = imagesx($src_img); //original image width
			$origh = imagesy($src_img); //original image height
		    $new_w = $thumb_width; 
			$new_h = $thumb_height; 
			$dst_img = imagecreatetruecolor($new_w,$new_h);
			imagecopyresized($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img)); 
			
			switch($mimetype) 
				{
				case "image/jpg":
				case "image/jpeg":
				case "image/pjpeg":
						imagejpeg($dst_img, "../images/uploaded/uploadMemberImage/lthumb/$image_name"); 
						break;
				case "image/gif":
						imagegif($dst_img, "../images/uploaded/uploadMemberImage/lthumb/$image_name"); 
						break;
				case "image/png":
				case "image/x-png":
						imagepng($dst_img, "../images/uploaded/uploadMemberImage/lthumb/$image_name"); 
						break;
				}			
			chmod("../images/uploaded/uploadMemberImage/lthumb/$image_name",0777);  
			return true; 
			}
		
		
		
		//to make the thumbnail of the image to front end user
		function thumbnailAndUploadFu($mimetype,$tmp_path,$image_name,$thumb_width,$thumb_height) 
			{ 			
			switch($mimetype) 
				{
				case "image/jpg":
				case "image/jpeg":
				case "image/pjpeg":
						$src_img=imagecreatefromjpeg("$tmp_path");
						break;
				case "image/gif":
						$src_img = imagecreatefromgif("$tmp_path");
						break;
				case "image/png":
				case "image/x-png":	
						$src_img = imagecreatefrompng("$tmp_path");
						break;
				}		
			$origw = imagesx($src_img); //original image width
			$origh = imagesy($src_img); //original image height
		    $new_w = $thumb_width; 
			$new_h = $thumb_height; 
			$dst_img = imagecreatetruecolor($new_w,$new_h);
			imagecopyresized($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img)); 
			
			switch($mimetype) 
				{
				case "image/jpg":
				case "image/jpeg":
				case "image/pjpeg":
						imagejpeg($dst_img, "images/uploaded/uploadMemberImage/thumb/$image_name"); 
						break;
				case "image/gif":
						imagegif($dst_img, "images/uploaded/uploadMemberImage/thumb/$image_name"); 
						break;
				case "image/png":
				case "image/x-png":
						imagepng($dst_img, "images/uploaded/uploadMemberImage/thumb/$image_name"); 
						break;
				}			
			chmod("images/uploaded/uploadMemberImage/thumb/$image_name",0777);  
			return true; 
			}
			function bigthumbnailAndUploadFu($mimetype,$tmp_path,$image_name,$thumb_width,$thumb_height) 
			{ 			
			switch($mimetype) 
				{
				case "image/jpg":
				case "image/jpeg":
				case "image/pjpeg":
						$src_img=imagecreatefromjpeg("$tmp_path");
						break;
				case "image/gif":
						$src_img = imagecreatefromgif("$tmp_path");
						break;
				case "image/png":
				case "image/x-png":	
						$src_img = imagecreatefrompng("$tmp_path");
						break;
				}		
			$origw = imagesx($src_img); //original image width
			$origh = imagesy($src_img); //original image height
		    $new_w = $thumb_width; 
			$new_h = $thumb_height; 
			$dst_img = imagecreatetruecolor($new_w,$new_h);
			imagecopyresized($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img)); 
			
			switch($mimetype) 
				{
				case "image/jpg":
				case "image/jpeg":
				case "image/pjpeg":
						imagejpeg($dst_img, "images/uploaded/uploadMemberImage/rthumb/$image_name"); 
						break;
				case "image/gif":
						imagegif($dst_img, "images/uploaded/uploadMemberImage/rthumb/$image_name"); 
						break;
				case "image/png":
				case "image/x-png":
						imagepng($dst_img, "images/uploaded/uploadMemberImage/rthumb/$image_name"); 
						break;
				}			
			chmod("images/uploaded/uploadMemberImage/rthumb/$image_name",0777);  
			return true; 
			}
			
			function blogthumbUploadFu($mimetype,$tmp_path,$image_name,$thumb_width,$thumb_height) 
			{ 			
			switch($mimetype) 
				{
				case "image/jpg":
				case "image/jpeg":
				case "image/pjpeg":
						$src_img=imagecreatefromjpeg("$tmp_path");
						break;
				case "image/gif":
						$src_img = imagecreatefromgif("$tmp_path");
						break;
				case "image/png":
				case "image/x-png":	
						$src_img = imagecreatefrompng("$tmp_path");
						break;
				}		
			$origw = imagesx($src_img); //original image width
			$origh = imagesy($src_img); //original image height
		    $new_w = $thumb_width; 
			$new_h = $thumb_height; 
			$dst_img = imagecreatetruecolor($new_w,$new_h);
			imagecopyresized($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img)); 
			
			switch($mimetype) 
				{
				case "image/jpg":
				case "image/jpeg":
				case "image/pjpeg":
						imagejpeg($dst_img, "images/uploaded/uploadMemberImage/blog/$image_name"); 
						break;
				case "image/gif":
						imagegif($dst_img, "images/uploaded/uploadMemberImage/blog/$image_name"); 
						break;
				case "image/png":
				case "image/x-png":
						imagepng($dst_img, "images/uploaded/uploadMemberImage/blog/$image_name"); 
						break;
				}			
			chmod("images/uploaded/uploadMemberImage/blog/$image_name",0777);  
			return true; 
			}
			function speakerDthumbUploadFu($mimetype,$tmp_path,$image_name,$thumb_width,$thumb_height) 
			{ 			
			switch($mimetype) 
				{
				case "image/jpg":
				case "image/jpeg":
				case "image/pjpeg":
						$src_img=imagecreatefromjpeg("$tmp_path");
						break;
				case "image/gif":
						$src_img = imagecreatefromgif("$tmp_path");
						break;
				case "image/png":
				case "image/x-png":	
						$src_img = imagecreatefrompng("$tmp_path");
						break;
				}		
			$origw = imagesx($src_img); //original image width
			$origh = imagesy($src_img); //original image height
		    $new_w = $thumb_width; 
			$new_h = $thumb_height; 
			$dst_img = imagecreatetruecolor($new_w,$new_h);
			imagecopyresized($dst_img,$src_img,0,0,0,0,$new_w,$new_h,imagesx($src_img),imagesy($src_img)); 
			
			switch($mimetype) 
				{
				case "image/jpg":
				case "image/jpeg":
				case "image/pjpeg":
						imagejpeg($dst_img, "images/uploaded/uploadMemberImage/lthumb/$image_name"); 
						break;
				case "image/gif":
						imagegif($dst_img, "images/uploaded/uploadMemberImage/lthumb/$image_name"); 
						break;
				case "image/png":
				case "image/x-png":
						imagepng($dst_img, "images/uploaded/uploadMemberImage/lthumb/$image_name"); 
						break;
				}			
			chmod("images/uploaded/uploadMemberImage/lthumb/$image_name",0777);  
			return true; 
			}
		
		function __destruct()
			{
			unset($this->id);
			unset($this->usertype);
			unset($this->company);
			unset($this->occupation);
			unset($this->city);
			unset($this->state);
			unset($this->gender);
			unset($this->fname);
			unset($this->lname);
			unset($this->username);
			unset($this->email);
			
			unset($this->password);
			unset($this->zipcode);
			unset($this->country);
			unset($this->address);
			unset($this->phone);
			unset($this->mobile);
			unset($this->fax);
			unset($this->image);
			unset($this->profiles);
			
			unset($this->courses);
			unset($this->customer_review);
			unset($this->education);
			unset($this->keynotes_topics);
			unset($this->business_training_topics);
			unset($this->executive_coaching_topics);
			unset($this->public_speaking_topics);
			unset($this->registerDate);
			unset($this->lastvisitDate);
			unset($this->status);
			
			unset($this);
			}
		
	}
?>