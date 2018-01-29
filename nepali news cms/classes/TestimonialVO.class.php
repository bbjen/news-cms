<?php
class TestimonialVO
	{
		public $id;
		public $test_name;
		public $test_message;
		public $test_image;
		public $test_detail;
		public $published_date;
		public $is_archieve;
		
		function __construct()
			{
			
			}
		
		function formatFetchVariables()
			{
			$this->id = intval($this->id);
			$this->test_name = stripslashes(trim($this->test_name));
			$this->test_message = addslashes(trim($this->test_message));
			$this->test_image = $this->test_image;
			$this->test_detail = addslashes(trim($this->test_detail));
			$this->published_date  	 = $this->published_date  	;
			$this->is_archieve = $this->is_archieve;
			}
		
		function formatInsertVariables()
			{
			$this->id = intval($this->id);
			$this->test_name = stripslashes(trim($this->test_name));
			$this->test_message = addslashes(trim($this->test_message));
			$this->test_image = $this->test_image;
			$this->test_detail = addslashes(trim($this->test_detail));
			$this->published_date  	 = $this->published_date  	;
			$this->is_archieve = $this->is_archieve;
			
			}
			
			function uploadFile($tmpFile)
			{
				if(is_uploaded_file($tmpFile) && move_uploaded_file($tmpFile, "../images/uploaded/uploadTestimonial/".$this->file_name))
					return true;
				else
					return false;	
			}
			
		function removePicture($file)
			{
			if(file_exists("../images/uploaded/uploadTestimonial/".$file) && $file!="")
				unlink("../images/uploaded/uploadTestimonial/".$file);
			if(file_exists("../images/uploaded/uploadTestimonial/".$file) && $file!="")
				unlink("../images/uploaded/uploadTestimonial/".$file);
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
						imagejpeg($dst_img, "../images/uploaded/uploadTestimonial/$image_name"); 
						break;
				case "image/gif":
						imagegif($dst_img, "../images/uploaded/uploadTestimonial/$image_name"); 
						break;
				case "image/png":
				case "image/x-png":
						imagepng($dst_img, "../images/uploaded/uploadTestimonial/$image_name"); 
						break;
				}			
			chmod("../images/uploaded/uploadTestimonial/$image_name",0777);  
			return true; 
			}
		
		function __destruct()
			{
			unset($this->id);
			unset($this->test_name);
			unset($this->test_message);
			unset($this->test_image);
			unset($this->test_detail);
			unset($this->published_date);
			unset($this->is_archieve);
			
		
			unset($this);
			}
		
	}
?>