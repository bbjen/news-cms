<?php
// This following statement must not be changed.
// Copyright (c) Michael Bloch and Taming The Beast.  
// Tell-A-Friend script V 2.1 Updated September 19 2006
// Taming the Beast.net - http://www.tamingthebeast.net
// Free Web Marketing and Ecommerce Resources and Tools
// By using this script you agree to indemnify Taming the Beast
// from from any liability that might arise from its use. 
// The preceding statement must not be changed. 

if(count($_POST)) {
# This part strips out nasty code that a malicious
# person may try to inject into the form

foreach(array('fmail1','fmail2','fmail3','email','name') as $key) $_POST[$key] = strip_tags($_POST[$key]);
if(!is_secure($_POST)) { die("Hackers begone");}

# This part submits a notification to you when 
# the form is submitted

// Email address for copies to be sent to - change to suit
$emailto = "jay@globalwebmatrix.net"; 

// Notification email subject text for copies
$esubject = "Recommendation form submission"; 

// Email body text for notifications
$emailtext = "
$_POST[name] has used your recommendation form using an email address of $_POST[email]

The people the recommendation has been submitted to are:

$_POST[fmail1]
$_POST[fmail2]
$_POST[fmail3]

The page recommended:

$_POST[refurl]

";

# This function sends the email to you

@mail("$emailto", $esubject, $emailtext, "From: $_POST[email]");

# This part is the function for sending to recipients

// Page to display after successful submission
// Change the thankyou.htm to suit

$thankyoupage = "thankyou.htm"; 

// Subject line for the recommendation - change to suit

$tsubject = "A web page recommendation from $_POST[name]";

// Change the text below for the email 
// Be careful not to change anyt "$_POST[value]" bits

$ttext = "
Hello,

$_POST[name], whose email address is $_POST[email] thought you may be interested in this web page. 

$_POST[refurl]


We look forward to your visit!

";

# This sends the note to the addresses submitted
@mail("$_POST[fmail1],$_POST[fmail2],$_POST[fmail3]", $tsubject, $ttext, "FROM: $_POST[email]");

# After submission, the thank you page
header("Location: $thankyoupage");
exit;

}

# Nothing further can be changed. Leave the below as is

function is_secure($ar) {
$reg = "/(Content-Type|Bcc|MIME-Version|Content-Transfer-Encoding)/i";
if(!is_array($ar)) { return preg_match($reg,$ar);}
$incoming = array_values_recursive($ar);
foreach($incoming as $k=>$v) if(preg_match($reg,$v)) return false;
return true;
}

function array_values_recursive($array) {
$arrayValues = array();
foreach ($array as $key=>$value) {
if (is_scalar($value) || is_resource($value)) {
$arrayValues[] = $value;
$arrayValues[] = $key;
}
elseif (is_array($value)) {
$arrayValues[] = $key;
$arrayValues = array_merge($arrayValues, array_values_recursive($value));
}
}
return $arrayValues;
}

?>