<?php

	include("config.php");
	session_start();

	$json= '[';

	$rowcounter='SELECT apikey,displaycounter+absolutecounter+averagecounter as countersum FROM members WHERE 1 ORDER BY countersum DESC'; 
	//TOP 10 Api-keys
	
	$counter=mysqli_query($connect,$rowcounter);
	$zero=0;
	$i=1;

	while($result=mysqli_fetch_array($counter)){
			$i++;
			$json= $json. '{
					"apikey"		: "'.$result['apikey'].'",
					"numberofrequests"		: '.$result['countersum'].'
					},';
	}
	if($i<10){
		for($j=$i; $j<=10; $j++){
			$json= $json. '{
						"apikey"		: "We dont have Api-Key on place '.$j.'",
						"numberofrequests"		: '.$zero.'
						},';
		}
	}

	$json= substr($json,0, -1);
	echo $json= $json. ']';
?>