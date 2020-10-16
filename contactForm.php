<?php

header("Location: cart.php?mailsend");
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$mailFrom = $_POST['email'];
	$message = $_POST['message'];
	
	$emailSubject= "New From Submission";
	
	
	$mailTo = "myemail@website.com";
	$headers = "From: ".$mailFrom;
	$txt = "You have received an e-mail from".$name.".\n\n".$message;
	
	mail($mailTo,$emailSubject,$txt,$headers);
	
	header("Location: cart.php?mailsend");
	
	
	
	
}

?>