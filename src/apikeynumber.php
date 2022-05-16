<?php

	include("config.php");
	session_start();

	$json= '[';

	$apikeycounter='SELECT COUNT(apikey) as apikeycount FROM members WHERE 1'; 
	//number of Api-keys
	
	$counter=mysqli_query($connect,$apikeycounter);
	$result=mysqli_fetch_array($counter);

		$json= $json. '{
				"numberofapikeys"		: '.$result['apikeycount'].'
				},';

	$json= substr($json,0, -1);
	echo $json= $json. ']';

?>