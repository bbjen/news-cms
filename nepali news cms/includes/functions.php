<?php
function formatDate($date, $type)
	{
	if($date!="" && $type=="-")
		{
		$arr = explode(".", $date);
		if(count($arr)==3)
			$date = $arr[2]."-".$arr[1]."-".$arr[0];
		}
	elseif($date!="" && $type == ".")
		{
		$arr = explode("-", $date);
		if(count($arr)==3)
			$date = $arr[2].".".$arr[1].".".$arr[0];
		if($arr[2]=="0000")
			$date = "";
		}
	else
		$date = $date;
	return $date;
	}
	
function paginate($url, $perpage, $total, $pg)
	{
	$arr = explode("/",$url);
	$initial_target = $arr[count($arr)-1];
	
	$arr2 = explode("&", $initial_target);
	
	if($arr2[0]=="")
		$target = $initial_target;
	else
		{
		if($arr2[2]!="")
			$target = $arr2[0]."&".$arr2[1];
		else
			$target = $arr2[0];
		}
	
	
	$content = "";
	$content .= '<div class="pagination">';
	$content .= '<ul>';
		
		$pages = ceil($total/$perpage);
		if($pg==1)
			$content .= '<li><a href="#" class="prevnext disablelink">previous</a></li>&nbsp;';
		else
			$content .=  '<li><a href="'.$target.'&pg='.($pg-1).'" class="prevnext">previous</a></li>&nbsp;';	
		
		
			$multipleOf = 5;
			$starting = 1;
			$block = ceil($pg/$multipleOf);
			if($block>1)
				$starting = ($block-1)*$multipleOf + 1;
			for($i=$starting;$i<($starting + $multipleOf);$i++)
				{
					if($i<=$pages)
						{
						
							if($i == $pg)
								$content .= '<li><a href="'.$target.'&pg='.$i.'" class="currentpage">'.$i.'</a></li>&nbsp;';
							else
								$content .= '<li><a href="'.$target.'&pg='.$i.'">'.$i.'</a></li>&nbsp;';
						}
				}
		
		
		if($pg==$pages)
			$content .=  '&nbsp;<li><a href="#" class="prevnext disablelink">next</a></li>';
		else
			$content .=  '&nbsp;<li><a href="'.$target.'&pg='.($pg+1).'" class="prevnext">next</a></li>';
		
		$content .=  '</ul>';
		$content .= '</div>';
	
	return $content;
	}

function sendMail($to, $from, $subject, $body)
	{
			//$headers="MIME-VERSION: 1.0\n";
			
			//$headers.= "From: $from\r\n Reply-to: $from";
			$headers = "From: \"".addslashes($from)."\" <".$from.">\r\n";
			$headers .= "Reply-To: ".$from."\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers.= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= "X-Mailer: PHP / ".phpversion()."\r\n";
			
			return mail($to, $subject, $body, $headers);
	}

function stringToId($string)
	{
	if($string!="")
		{
		$ids=array();
		
		$arr = explode("-", $string);
		for($i=0; $i<count($arr); $i++)
			{
			if(intval($arr[$i])!=0)
				$ids[]=$arr[$i];
			}
		$ids = array_unique($ids);
		return $ids;
		}
	else
		return $string;
	}

function createContactUsBody($vo)
	{
		$body =	'<table width="100%" border="0" cellspacing="2">
				  <tr>
					<td width="9%">&nbsp;</td>
					<td width="23%">&nbsp;</td>
					<td width="68%">&nbsp;</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">Name:</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->name.'</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">Surname:</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->surname.'</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">Company:</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->company.'</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">Email:</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->email.'</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">Telephone:</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->telephone.'</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">Fax:</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->fax.'</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">Street:</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->street.'</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">Zip Code: </td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->zip.'</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">City:</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->city.'</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">Country:</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->country.'</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left" valign="top">Comment:</td>
					<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->comment.'</td>
				  </tr>
				</table>';
		return $body;
	}

function createAppointmentBody($vo, $title)
	{
	$body =	'<table width="100%" border="0" cellspacing="2">
		  <tr>
			<td width="9%">&nbsp;</td>
			<td width="23%">&nbsp;</td>
			<td width="68%">&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">Name:</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->name.'</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">Surname:</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->surname.'</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">Company:</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->company.'</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">Email:</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->email.'</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">Telephone:</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->telephone.'</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">Fax:</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->fax.'</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">Street:</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->street.'</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">Zip Code: </td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->zip.'</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">City:</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->city.'</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">Country:</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->country.'</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left" valign="top">&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left" valign="top">Appointment For: </td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$title.'</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left" valign="top">Appointment Date: </td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->appointment_date.'  '.$vo->appointment_time.'</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left" valign="top">Call Date: </td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->call_date.'  '.$vo->call_time.'</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left" valign="top">Send Information: </td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->send_info_flag.'</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left" valign="top">&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">&nbsp;</td>
		  </tr>
		  <tr>
			<td>&nbsp;</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left" valign="top">Comment:</td>
			<td style="font:normal 12px Arial, Helvetica, sans-serif;" align="left">'.$vo->comment.'</td>
		  </tr>
		</table>';
	return $body;

	}
?>
<?php
//to get the nepali date accordingly
function get_current_NST($time="none")
{
	global $hour_delay,$minute_delay;
	if($time!='none')
		return date("Y-m-d H:i:s",mktime (gmdate("H")+$hour_delay,gmdate("i")+$minute_delay,gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y")));
	else
		return date("Y-m-d H:i:s",mktime(gmdate("H")+$hour_delay,gmdate("i")+$minute_delay,gmdate("s"),gmdate("m"),gmdate("d"),gmdate("Y")));
}

//drop down for the year
function YearDropDown($name,$start_year,$end_year,$selected_value,$class="") 
{
	  echo "<select name=\"$name\" class=\"$class\">\n";
	
   for ($j = $start_year; $j <= $end_year; $j++) {
      
	?>
		<option value="<?=$j;?>" <? if($j==$selected_value) echo"Selected"; ?>><?=$j;?></option>
	<?  
   }
   echo "</select>\n";
}

//drop down for the month
function MonthDropDown($name,$selected_value) 
{
	  echo "<select name=\"$name\">\n";
	
   for ($j = 1; $j <= 12; $j++) {
      
	?>
		<option value="<?=date("m", mktime(0, 0, 0, $j, 1, 2000))?>" <? if($j==$selected_value) echo"Selected"; ?>><?=date("M", mktime(0, 0, 0, $j, 1, 2000))?></option>
	<?  
   }
   echo "</select>\n";
}

//drop down for the day
function DayDropDown($name,$selected_value) 
{
	  echo "<select name=\"$name\">\n";
	
   for ($j = 1; $j <= 31; $j++) {
      
	?>
		<option value="<?=date("d", mktime(0, 0, 0, 1, $j, 2000))?>" <? if($j==$selected_value) echo"Selected"; ?>><?=date("d", mktime(0, 0, 0, 1, $j, 2000))?></option>
	<?  
   }
   echo "</select>\n";
}

//to separate year month and day from the date
function separateDayMonthYear($date,&$year,&$month,&$day)
{
	if($date) //if date is not empty
	{
		$parts=explode("-",$date);
		$year=$parts[0];
		$month=$parts[1];
		$day=$parts[2];
	}
} 
//write only the limited words of the line
function writeLimitedWords($str,$no_of_words)
{
	//$all_word=array();
	//store the value of the word in the array
	$all_word=str_word_count($str, 1);
	//get the total words
	$total_words=sizeof($all_word);
	
	if($total_words>$no_of_words) //if the given string bigger than no of words
	{
		
		for($i=0;$i<$no_of_words;$i++)
		{
			//to write the ... at the end of the string and place space between them
			echo $all_word[$i];
			if($i==($no_of_words-1))
				echo"...";
			else
				echo" ";
			
		}
	}
	else
		echo $str; //other wise print it as it is
}


function isValidURL($url)
{
 $urlregex = "^(https?|ftp)\:\/\/([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?[a-z0-9+\$_-]+(\.[a-z0-9+\$_-]+)*(\:[0-9]{2,5})?(\/([a-z0-9+\$_-]\.?)+)*\/?(\?[a-z+&\$_.-][a-z0-9;:@/&%=+\$_.-]*)?(#[a-z_.-][a-z0-9+\$_.-]*)?\$";
if (eregi($urlregex, $url)) {return TRUE;} else {return FALSE;}  
}  


function CheckEmailMX($email) 
{ 
	if (CheckEmailAddress($email))
	{
		if( (preg_match('/(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/', $email)) || 
			(preg_match('/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/',$email)) ) 
		{ 
			$host = explode('@', $email);
			if (function_exists("checkdnsrr"))
			{
				if (checkdnsrr($host[1].'.', 'MX') ) return true;
				if (checkdnsrr($host[1].'.', 'A') ) return true;
				if (checkdnsrr($host[1].'.', 'CNAME') ) return true;
				return false;
			}
			//simply returns true if the address pattern is correct (in windows)
			else
			{
				return true;
			}		
		}
		return false;
	}
	return false;
}

function CheckEmailAddress($email)
{
 	$regex = "^[_+a-z0-9-]+(\.[_+a-z0-9-]+)*"
           ."@[a-z0-9-]+(\.[a-z0-9-]{1,})*"
           ."\.([a-z]{2,}){1}$";
   	if(!eregi($regex,$email))
	{
        return false;
    }
    return true;
}

//function to return the file name and extension of the file
function get_file_name_and_ext($path_name,&$file_name,&$extension)
{
	$parts = pathinfo($path_name);
	$extension = $parts['extension'];
	$file_name = str_replace(".$extension","",$path_name);
}

//function to generate the the seed for the random no.
function make_seed()
{
    list($usec, $sec) = explode(' ', microtime());
    return (float) $sec + ((float) $usec * 100000);
}

//get thumbnail height and width according to the original image and destination height and width
function getThumbnailHeightAndWidth($mimetype,$src_image,$dest_w,$dest_h,&$thumb_w,&$thumb_h) 
{
	
	//create image according to the mimetyp
	switch($mimetype) 
	{
    case "image/jpg":
    case "image/jpeg":
		case "image/pjpeg":
        $tmp_img=imagecreatefromjpeg("$src_image");
        break;
    case "image/gif":
        $tmp_img = imagecreatefromgif("$src_image");
        break;
    case "image/png":
		case "image/x-png":
        $tmp_img = imagecreatefrompng("$src_image");
        break;
	}
	//get the image height and width of the image
	$orig_w=imagesx($tmp_img); 
  $orig_h=imagesy($tmp_img);
	
	//if the width is greater than the height of the image then scale the image accordingly
	if($orig_w>=$orig_h)
	{
		$thumb_w=$dest_w;
		//now get the conversion ratio
		$scale_ratio=doubleval($dest_w)/doubleval($orig_w);
		// now scale the height accordingly
		$thumb_h=$dest_h;
		//$thumb_h=intval(doubleval($scale_ratio)*doubleval($orig_h));
	}
	else //if the height is greater than the size of the image
	{
		$thumb_h=$dest_h;
		//now get the conversion ratio
		$scale_ratio=doubleval($dest_h)/doubleval($orig_h);
		// now scale the width accordingly
		$thumb_w=intval(doubleval($scale_ratio)*doubleval($orig_w));
	
	} 

}
function Create_ThumbNail($uploaded_img_full_path,$mimetype, $ImagePath, $rW, $rH, $img, $dest_path){
       $full_picmain = $uploaded_img_full_path;
        $tsrc = $dest_path.$img;
    //$SrcImage['type']=$mimetype;
    ////////////// Starting of GIF thumb nail creation///////////
        if($mimetype == "image/gif"){
            $im = imagecreatefromgif($full_picmain);
            $width = imagesx($im);                // Original picture width is stored
            $height = imagesy($im);                // Original picture height is stored
            if($width > $rW){$n_width = $rW;}
            else{$n_width = $width;}
            if($height > $rH){$n_height = $rH;}
            else{$n_height = $height;}
            $newimage = imagecreatetruecolor($n_width,$n_height);           
            imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width,$height);
            if(function_exists("imagegif")) {
                header("Content-type: image/gif");
                imagegif($newimage, $tsrc);
            }
            elseif(function_exists("imagejpeg")) {
                header("Content-type: image/jpeg");
                imagejpeg($newimage,$tsrc);
            }
            chmod("$tsrc",0777);
        }
//        ////// starting of JPG thumb nail creation//////////
        else if($mimetype == "image/pjpeg" || $mimetype == "image/jpeg" || $mimetype == "image/jpg"){
			//echo "sujit";
            $im = imagecreatefromjpeg($full_picmain);
            $width = imagesx($im);              // Original picture width is stored
            $height = imagesy($im);             // Original picture height is stored
            if($width > $rW){$n_width = $rW;}
            else{$n_width = $width;}
            if($height > $rH){$n_height = $rH;}
            else{$n_height = $height;}
            $newimage = imagecreatetruecolor($n_width,$n_height);                
            imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width,$height);
            imagejpeg($newimage, $tsrc);
            chmod("$tsrc",0777);
        }
//        ////// starting of JPG thumb nail creation//////////
        else if($mimetype == "image/png"){
            $im = imagecreatefrompng($full_picmain);
            $width = imagesx($im);              // Original picture width is stored
            $height = imagesy($im);             // Original picture height is stored
            if($width > $rW){$n_width = $rW;}
            else{$n_width = $width;}
            if($height > $rH){$n_height = $rH;}
            else{$n_height = $height;}
            $newimage = imagecreatetruecolor($n_width,$n_height);                
            imagecopyresampled($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width,$height);
            imagepng($newimage, $tsrc);
            chmod("$tsrc",0777);
        }       
    }

function findexts($filename)
	{
	$filename = strtolower($filename) ;
	$exts = split("[/\\.]", $filename) ;
	$n = count($exts)-1;
	$exts = $exts[$n];
	return $exts;
	} 

function getTableName($category)
	{
	switch($category)
		{
		case 'Monthly Edition':
			return "himalmag_news";
			break;
			
		case 'Daily News':
			return "himalmag_general_news";
			break;
			
		case 'Front Coverage':
			return "himalmag_frontpage_news";
			break;
			
		case 'Resources':
			return "himalmag_download";
			break;
		
		default :
			return "none";
			break;
		}
	}

/******************************************************************************************************/
function getInsertedId() {
/* if you just INSERTed a new row into a table with an autonumber, call this 
i.eGet the ID generated from the previous INSERT operation

 * function to give you the ID of the new autonumber value */

	return mysql_insert_id();
}
/******************************************************************************************************/
function allcountrieslist($select)
	{
	$country_list = array("Afghanistan","Albania","Algeria","Andorra","Angola","Antigua and Barbuda","Argentina","Armenia","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bhutan","Bolivia","Bosnia and Herzegovina","Botswana","Brazil","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Central African Republic","Chad","Chile","China","Colombi","Comoros","Congo (Brazzaville)","Congo","Costa Rica","Cote d'Ivoire","Croatia","Cuba","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","East Timor (Timor Timur)","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Fiji","Finland","France","Gabon","Gambia, The","Georgia","Germany","Ghana","Greece","Grenada","Guatemala","Guinea","Guinea-Bissau","Guyana","Haiti","Honduras","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Israel","Italy","Jamaica","Japan","Jordan","Kazakhstan","Kenya","Kiribati","Korea, North","Korea, South","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Morocco","Mozambique","Myanmar","Namibia","Nauru","Nepal","Netherlands","New Zealand","Nicaragua","Niger","Nigeria","Norway","Oman",	"Pakistan","Palau",	"Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Qatar","Romania","Russia","Rwanda","Saint Kitts and Nevis","Saint Lucia","Saint Vincent","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia and Montenegro","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","Spain","Sri Lanka","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Togo","Tonga","Trinidad and Tobago","Tunisia","Turkey","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Yemen","Zambia","Zimbabwe");
		
	foreach($country_list as $country)
		{?>
		<option value="<?php echo $country;?>" <?php if($country == $select) echo "Selected";?> ><?php echo $country; ?></option><?php
		
		}
	
	}
	
function removeSpace($str)
	{
	$str = str_replace(",","",$str);
	$str = str_replace("?","",$str);
	$str = str_replace("-"," ",$str);
	$str = str_replace(":","",$str);
	$str = str_replace("/","|",$str);
	$str = str_replace("\\"," ",$str);
	$str = str_replace("'"," ",$str);
	$str = str_replace("   "," ",$str);	
	$str = str_replace("  "," ",$str);
	$str = str_replace(" ","-",$str);
	return $str;
	}	

?>