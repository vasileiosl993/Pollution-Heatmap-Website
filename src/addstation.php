<?php
   include("config.php");
   session_start();
   	$myid = mysqli_real_escape_string($connect,$_POST['id']);
	$myname = mysqli_real_escape_string($connect,$_POST['name']);
	$mylat = mysqli_real_escape_string($connect,$_POST['lat']);
	$mylng = mysqli_real_escape_string($connect,$_POST['lng']);
	//if submit is not blanked i.e. it is clicked.
	if(isset($_REQUEST['Submit'])!=''){
		if($_REQUEST['id']=='' || $_REQUEST['name']==''|| $_REQUEST['lat']==''|| $_REQUEST['lng']==''){
			echo "please fill the empty field.";
		}else{
			$insert=mysqli_query($connect,"INSERT INTO stations(id,name,lat,lng) VALUES ('$myid','$myname','$mylat','$mylng');");
			if($insert){
				header("location: admin.php");
			}else{
				$error = "Insert Failed";
				echo $error;
			}
		}
	}
?>