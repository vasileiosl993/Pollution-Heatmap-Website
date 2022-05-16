<html>		
<h2>API-Key Account Confirmation</h2>
<?php
   include("config.php");
   session_start();
		
	// email and password sent from form 
   	$myemail = mysqli_real_escape_string($connect,$_POST['email']);
	$mypassword = mysqli_real_escape_string($connect,$_POST['password']);
	$check=mysqli_query($connect,"SELECT * FROM members WHERE email='$myemail'");
	//if submit is not blanked i.e. it is clicked.
	if(isset($_REQUEST['submit'])!=''){
		if($_REQUEST['email']=='' || $_REQUEST['password']==''){
			echo "Please fill the empty field.";
		}elseif(mysqli_num_rows($check) > 0){
			echo "Username taken";
		}else{
			$hashstring='project';
			$apikey="";
			$apikey=crypt($myemail, $hashstring);
			$insert=mysqli_query($connect,"INSERT INTO members(email,password,apikey) VALUES ('".$_REQUEST['email']."','".$_REQUEST['password']."','$apikey')");
			if($insert){
					$sql = "SELECT apikey FROM members WHERE email = '$myemail' and password = '$mypassword'";
					$result = mysqli_query($connect,$sql);
					$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
					$_SESSION['myapikey'] = $row['apikey'];
			}
			echo $_SESSION['myapikey'];
		}
	}
?>
