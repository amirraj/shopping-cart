<?php

if(isset($_POST['submit']))
{
	include_once "database.php";
	
	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	
	//error handlers
	//check for empty field
	if(empty($first) || empty($last) || empty(email) || empty($uid) || empty($pwd))
	{
		header("Location: signup.html?signup=empty");
	    exit();
		
	}
	else{
		//check if input characters are valid
		if(!preg_match("/^[a-zA-Z]*$/", $first)  || !preg_match("/^[a-zA-Z]*$/", $last))
		{
			header("Location: signup.html?signup=invalid");
	        exit();
			
		}
		else{
			
			//check if email is valid
			if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			{
				header("Location: signup.html?signup=invalidEmail");
	            exit();
				
			}
			else{
				$sql = "select * from users where user_uid = '$uid'";
				$result = mysqli_query($conn, $sql);
				
				$resultCheck = mysqli_num_rows($result);
				
				if($resultCheck > 0 )
				{
					header("Location: signup.html?signup=userTaken");
	            exit();
					
				}
				else{
					//hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//insert the user into the databse
					$sql = "insert into users (user_first, user_last, user_email, user_uid, user_pwd) values ('$first','$last', '$email','$uid','$hashedPwd');";
					mysqli_query($conn, $sql);
					header("Location: cart.php?signupSuccess");
					exit();
					
				}
				
			}
			
		}
		
		
	}
	
}else{
	
	header("Location: signup.html");
	exit();
}