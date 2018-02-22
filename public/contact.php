<?php
if (isset($_REQUEST['email']))
//if "email" is filled out, send email
{
	//send email
	$email = $_REQUEST['email'] ;
	$subject = $_REQUEST['name'] ;
	$message = $_REQUEST['message'] ;
	mail("divuscodex@gmail.com", $subject, $message, "From:" . $email);
	echo "your message has benn sent";
}
?>