<?php
   include("config.php");
   session_start();
	// email and password sent from form 
   	$myemail = mysqli_real_escape_string($connect,$_POST['email']);
	$mypassword = mysqli_real_escape_string($connect,$_POST['password']);
   		$sql = "SELECT email,password,apikey FROM members WHERE email = '$myemail' and password = '$mypassword'";
		$result = mysqli_query($connect,$sql);
		$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
		if($row['email']==$myemail && $row['password']==$mypassword) {
			$_SESSION['email'] = $myemail;
			$_SESSION['myapikey'] = $row['apikey'];
			echo "Your API-Key:<br>".$_SESSION['myapikey'];
		}else {
			$error = "Your email or password is invalid";
			echo $error;
		}
?>