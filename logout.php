<?php

if(isset($_POST['submit']))
{   
    session_start();
	session_unset();
	session_destroy();
	header("Location: cart.php?loggedOut");
	exit();
	
}
else{
	header("Location: cart.php?error");
	exit();
	
}