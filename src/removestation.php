<?php
   include("config.php");
   session_start();
   $myid = mysqli_real_escape_string($connect,$_POST['id']);
if (isset($_REQUEST['Submit'])!='') {
		if($_REQUEST['id']!=''){
			$delete="DELETE FROM stations WHERE id='$myid'";
			if ($connect->query($delete) === TRUE){
				header("location: admin.php");
			}else{
				$error = "Station doesn't exist";
				echo $error;
			}
		}else{
			$error = "Insert Station id";
			echo $error;
		}
}
?>

