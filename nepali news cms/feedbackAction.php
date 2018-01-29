<?php

# This part strips out nasty code that a malicious
# person may try to inject into the form

foreach(array('fmail1','email','name','address') as $key) $_POST[$key] = strip_tags($_POST[$key]);


# This part submits a notification to you when 
# the form is submitted

// Email address for copies to be sent to - change to suit
$emailto = "jay@globalwebmatrix.net"; 

// Notification email subject text for copies
$esubject = "Feedback about mailnepal.com"; 

// Email body text for notifications
$emailtext = "
$_POST[name] has send you some feedback regarding your mailnepal.com from $_POST[address] 
The feedback is as:

$_POST[fmail1]

";

# This function sends the email to you

@mail("$emailto", $esubject, $emailtext, "From: $_POST[email]");

# This part is the function for sending to recipients

// Page to display after successful submission
// Change the thankyou.htm to suit

$thankyoupage = "index.php?jpg=thankyou"; 

header("Location: $thankyoupage");



?>