<?php
class lftContentVO{
		public $id;
		public $lftmenu;
		public $slted;
		public $title;
		public $name;
		public $email;
		public $short_descs;
		public $description;
		public $files;		
		public $published_date;
		public $update_date;
		public $is_archieve;
		
		function __construct(){
			
		}
		
		function formatInsertVariables(){
			$this->id;
			$this->lftmenu = $this->lftmenu;
			$this->slted = $this->slted;
			$this->title = addslashes(trim($this->title));
			$this->name = addslashes(trim($this->name));
			$this->email = addslashes(trim($this->email));
			$this->short_descs = addslashes(trim($this->short_descs));
			$this->description = addslashes(trim($this->description));
			$this->files = addslashes(trim($this->files));
			$this->published_date = $this->published_date;
			$this->update_date = $this->update_date;
			$this->is_archieve = $this->is_archieve;
		}
		function formatFetchVariables()	{
			$this->id = intval($this->id);
			$this->lftmenu = stripslashes(trim($this->lftmenu));
			$this->slted = stripslashes(trim($this->slted));
			$this->title = stripslashes(trim($this->title));
			$this->name = stripslashes(trim($this->name));
			$this->email = stripslashes(trim($this->email));
			$this->short_descs = stripslashes(trim($this->short_descs));
			$this->description = stripslashes(trim($this->description));
			$this->files = stripslashes(trim($this->files));
			$this->published_date = $this->published_date;
			$this->update_date = $this->update_date;
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
						imagejpeg($dst_img, "../images/uploaded/$image_name"); 
						break;
				case "image/gif":
						imagegif($dst_img, "../images/uploaded/$image_name"); 
						break;
				case "image/png":
				case "image/x-png":
						imagepng($dst_img, "../images/uploaded/$image_name"); 
						break;
				}			
			chmod("../images/uploaded/$image_name",0777);  
			return true; 
			}
			
		function __destruct(){
			unset($this->id);
			unset($this->lftmenu);
			unset($this->slted);
			unset($this->title);
			unset($this->name);
			unset($this->email);
			unset($this->short_descs);
			unset($this->description);
			unset($this->files);
			unset($this->published_date);
			unset($this->update_date);
			unset($this->is_archieve);
		}
	}
?>