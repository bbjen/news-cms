<?php
class AdvertisementVO{
		public $id;
		public $name;
		public $url;
		public $files;
		public $published_date;
		public $location;
		public $is_archieve;
		
		function __construct(){
			
		}
		
		function formatFetchVariables(){
			$this->id = intval($this->id);
			$this->name = $this->name;
			$this->url = $this->url;
			$this->files = $this->files;
			$this->published_date  	 = $this->published_date  	;
			$this->location = $this->location;
			$this->is_archieve = $this->is_archieve;
			}
		
		function formatInsertVariables()
			{
			$this->id = intval($this->id);
			$this->name = $this->name;
			$this->url = $this->url;
			$this->files = $this->files;
			$this->published_date  	 = $this->published_date;
			$this->location = $this->location;
			$this->is_archieve = $this->is_archieve;
			}
			
			function uploadFile($tmpFile)
			{
				if(is_uploaded_file($tmpFile) && move_uploaded_file($tmpFile, "../images/uploaded/".$this->file_name))
					return true;
				else
					return false;	
			}
			
		function removePicture($file)
			{
			if(file_exists("../images/uploaded/".$file) && $file!="")
				unlink("../images/uploaded/".$file);
			if(file_exists("../images/uploaded/".$file) && $file!="")
				unlink("../images/uploaded/".$file);
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
						imagejpeg($dst_img, "../images/uploaded/advertisment/$image_name"); 
						break;
				case "image/gif":
						imagegif($dst_img, "../images/uploaded/advertisment/$image_name"); 
						break;
				case "image/png":
				case "image/x-png":
						imagepng($dst_img, "../images/uploaded/advertisment/$image_name"); 
						break;
				}			
			chmod("../images/uploaded/advertisment/$image_name",0777);  
			return true; 
			}
		
		function __destruct()
			{
			
			unset($this->id);
			unset($this->name);
			unset($this->url);
			unset($this->files);
			unset($this->published_date);
			unset($this->location);
			unset($this->is_archieve);
		
			unset($this);
			}
		
	}
?>