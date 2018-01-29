<?php
// NAME: limit_words()
// VERSION: 1.0
// AUTHOR: J de Silva
// DESCRIPTION: returns a specified number of words off a string
// 
// TYPE: function
// --------------------

function limit_words( $str, $num, $append_str='' )
{
  $words = preg_split( '/[\s]+/', $str, -1, PREG_SPLIT_OFFSET_CAPTURE );
  if( isset($words[$num][1]) )
  {
    $str = substr( $str, 0, $words[$num][1] ) . $append_str;
  }
  unset( $words, $num );
  return trim( $str );
}
// --------------------
// USE:

$longtext = 'This is a line of words. Some more words right here.';
// show just 6 words...
$shorttext = limit_words( $longtext, 6, '&nbsp;&nbsp;<a href="/?art=1&amp;show=all">more...</a>' );
echo $shorttext;

?>