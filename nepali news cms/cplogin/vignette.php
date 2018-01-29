<?php
// ***********************************************************************************
// --- Vignette --- Thumbnail Generator with Shadow - by Pascal Naidon - June 2006
// ***********************************************************************************

// ---- function to rotate and merge the RGB and Alpha Channels
// adapted from jon at driestone dot com http://us3.php.net/manual/en/function.imagerotate.php
function alpha_rotate($src_RGB, $src_alpha, $angle, $PNGsupport){
       global $r0, $g0, $b0;

       if($angle != 0) {
         $src_RGB = imagerotate($src_RGB, $angle, 0x000000);
         $src_alpha = imagerotate($src_alpha, $angle, 0x000000);
       }

       imagealphablending($src_RGB, false);
       
       for ($theX=0;$theX<imagesx($src_RGB);$theX++){
           for ($theY=0;$theY<imagesy($src_RGB);$theY++){
   
               $rgb = imagecolorat($src_RGB,$theX,$theY);
               $r = ($rgb >> 16) & 0xFF;
               $g = ($rgb >> 8) & 0xFF;
               $b = $rgb & 0xFF;
               
               $rgb = imagecolorat($src_alpha,$theX,$theY);
               $a = $rgb & 0xFF;
               $a = 127-floor($a/2);
               $t = $a/128.0;

               if($PNGsupport) {
                 $myColour = imagecolorallocatealpha($src_RGB,$r,$g,$b,$a);
               } else {
                 $myColour = imagecolorallocate($src_RGB,$r*(1.0-$t)+$r0*$t,$g*(1.0-$t)+$g0*$t,$b*(1.0-$t)+$b0*$t);
               }
               imagesetpixel($src_RGB, $theX, $theY, $myColour);    
           }
       }

       return $src_RGB;
}

// -- test for PNG transparency support, ie if the browser is MicroSoft Internet Explorer version <7 --
$PNGsupport = true;
$Browser = $HTTP_USER_AGENT;
if(!$Browser) $Browser = $_SERVER['HTTP_USER_AGENT'];
if (ereg ( 'MSIE ([0-9].[0-9]{1,2})', $Browser,$log_version) ) {
  if($log_version[1] < 7) $PNGsupport = false;
}
  
// --- Cache ---
$cache_directory = "cache/";  // specify the cache directory - make sure it has writing authorization
$use_cache = false;  // set to true or false, whether you'd like to cache the thumbnails or not

// --- parameters ---
$filename = $_REQUEST['f'];  // name of the file containing the source image
$max_h = $_REQUEST['h'];   // maximal wanted horizontal size
$max_v = $_REQUEST['w'];   // maximal wanted vertical size
$flou = $_REQUEST['flou']; // distance of blur
$r = $_REQUEST['r'];  // angle to rotate the image
$d = $_REQUEST['d'];  // distance of the shadow
$a = $_REQUEST['a'];  // angle of the shadow
$b = $_REQUEST['b'];  // thickness of border
$c = $_REQUEST['c'];  // whether the picture should be cached
if(!$max_h) $max_h = 150;
if(!$max_v) $max_v = 150;
if(!$a) $a = 45;
if(!$d) $d = $flou*0.25;
if(!$flou) $flou = 10;
if($c) $use_cache = true;
$flou_h = $flou;
$flou_v = $flou;
$dist_h = $d * cos(deg2rad($a+$r));
$dist_v = $d * sin(deg2rad($a+$r));

// --- background colour (in case PNG transparency not supported) ---
$r0 = $_REQUEST['r0'];
$g0 = $_REQUEST['g0'];
$b0 = $_REQUEST['b0'];
if(!$r0) $r0 = 255; // default background colour is white
if(!$g0) $g0 = 255;
if(!$b0) $b0 = 255;

if($filename && file_exists($filename)) {
  $md5 = md5_file($filename);
  
  if($PNGsupport) {
    $cached_file = $md5.".png";
  } else {
    $cached_file = $md5.".jpg";
  }

  if( file_exists($cache_directory.$cached_file) && $use_cache) {
    header("Location:".$cache_directory.$cached_file."\n\n");
  }
  else {
    if(strtolower(substr($filename,-4,4))==".jpg" || strtolower(substr($filename,-4,4))==".jpeg") {
      $image = imagecreatefromjpeg($filename);
    }
    if(strtolower(substr($filename,-4,4))==".png") {
      $image = imagecreatefrompng($filename);
    }
	
	if(strtolower(substr($filename,-4,4))==".gif") {
      $image = imagecreatefromgif($filename);
    }

    $src_size = getimagesize($filename);
    $h = $src_size[0];
    $v = $src_size[1];
    if($v * $max_h - $h * $max_v < 0)
    { $wanted_h = $max_h; $wanted_v = $v*($max_h/$h); }
    else 
    { $wanted_v = $max_v; $wanted_h = $h*($max_v/$v);  }
    $thumbnail = imagecreatetruecolor($wanted_h-2*$b, $wanted_v-2*b);
    imagecopyresampled($thumbnail, $image, 0, 0, 0, 0, $wanted_h-2*$b, $wanted_v-2*$b, $h, $v);

    if(!$flou_h) $flou_h = 10; 
    if(!$flou_v) $flou_v = 10;

    // ---- RGB ----
    $rgb = imagecreatetruecolor($wanted_h+$flou_h,$wanted_v+$flou_v);
    $colour = imagecolorallocate($rgb, 0, 0, 0);
    imagefilledrectangle($rgb, 0, 0, $wanted_h+$flou_h, $wanted_v+$flou_v, $colour);
    $colour = imagecolorallocate($rgb, 255, 255, 255);
    imagefilledrectangle($rgb, $flou_h*0.5-$dist_h, $flou_v*0.5-$dist_v, $wanted_h+$flou_h*0.5-$dist_h, $wanted_v+$flou_h*0.5-$dist_v, $colour);
    imagecopymerge($rgb, $thumbnail, 1+$b + $flou_h*0.5-$dist_h, 1+$b + $flou_v*0.5-$dist_v, 0,0, $wanted_h-2*$b, $wanted_v-2*$b, 100);

    // ---- Ombre (alpha) ----
    $ombre = imagecreatetruecolor($wanted_h+$flou_h,$wanted_v+$flou_v);
    imagealphablending($ombre, false);
    $colour = imagecolorallocate($ombre, 0, 0, 0);
    imagefilledrectangle($ombre, 0, 0, $wanted_h+$flou_h, $wanted_v+$flou_v, $colour);
  
    $nStep = 30; // this parameter can be increased for better smoothness
    for($i=0;$i<=$nStep;$i++) {
      $t = ((1.0*$i)/$nStep);
      $intensity = 255*$t*$t;
      $colour = imagecolorallocate($ombre, $intensity, $intensity, $intensity);
      $points = array(
           $flou_h*$t,                $flou_v,     // Point 1 (x, y)
           $flou_h,                   $flou_v*$t,  // Point 2 (x, y)
           $wanted_h,                 $flou_v*$t,  // Point 3 (x, y)
           $wanted_h+$flou_h*(1-$t),  $flou_v,     // Point 4 (x, y)
           $wanted_h+$flou_h*(1-$t),  $wanted_v,  // Point 5 (x, y)
           $wanted_h,                 $wanted_v+$flou_v*(1-$t),  // Point 6 (x, y)
           $flou_h,                   $wanted_v+$flou_v*(1-$t),  // Point 7 (x, y)
           $flou_h*$t,                $wanted_v   // Point 8 (x, y)
         );
      imagepolygon($ombre, $points, 8, $colour);
    }
    for($i=0;$i<=$nStep;$i++) {
      $t = ((1.0*$i)/$nStep);
      $intensity = 255*$t*$t;
      $colour = imagecolorallocate($ombre, $intensity, $intensity, $intensity);
      imagefilledarc($ombre, $flou_h-1, $flou_v-1, 2*(1-$t)*$flou_h, 2*(1-$t)*$flou_v, 180, 268, $colour, IMG_ARC_PIE);
      imagefilledarc($ombre, $wanted_h, $flou_v-1, 2*(1-$t)*$flou_h, 2*(1-$t)*$flou_v, 270, 358, $colour, IMG_ARC_PIE);
      imagefilledarc($ombre, $wanted_h, $wanted_v, 2*(1-$t)*$flou_h, 2*(1-$t)*$flou_v, 0, 90, $colour, IMG_ARC_PIE);
      imagefilledarc($ombre, $flou_h-1, $wanted_v, 2*(1-$t)*$flou_h, 2*(1-$t)*$flou_v, 90, 180, $colour, IMG_ARC_PIE);
    }
  
    $colour = imagecolorallocate($ombre, 255, 255, 255);
    imagefilledrectangle($ombre, $flou_h, $flou_v, $wanted_h, $wanted_v, $colour);
    imagefilledrectangle($ombre, $flou_h*0.5-$dist_h, $flou_v*0.5-$dist_v, $wanted_h+$flou_h*0.5-1-$dist_h, $wanted_v+$flou_v*0.5-1-$dist_v, $colour);

    $rgb = alpha_rotate($rgb, $ombre, $r, $PNGsupport);
    imagealphablending($rgb, true);
    imagesavealpha($rgb, true);
  
    // deliver image and also write the cached file
    if($PNGsupport) {
      header("Content-type: image/png");
      imagepng($rgb);
      if($use_cache) imagepng($rgb, $cache_directory.$cached_file);
    } else {
      header("Content-type: image/jpg");
      imagejpeg($rgb);
      if($use_cache) imagejpeg($rgb, $cache_directory.$cached_file);
    }

    imagedestroy($image);
    imagedestroy($thumbnail);
    imagedestroy($rgb);
    imagedestroy($ombre);
  }
} else {
  //echo "File not found";
}

?>