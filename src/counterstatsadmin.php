<?php

	include("config.php");
	session_start();

	$json= '[';

	$counterquery='SELECT SUM(displaycounter) as displaycounter,SUM(absolutecounter) as absolutecounter,SUM(averagecounter) as averagecounter FROM members WHERE 1';  //count requests by type

	$counter=mysqli_query($connect,$counterquery);
	$result=mysqli_fetch_array($counter);

	$json= $json. '{
				"showstationstimes"		:	'.$result['displaycounter']. ',
				"absolutevaluetimes"	:	'.$result['absolutecounter']. ',
				"averagevaluetimes"		:	'.$result['averagecounter']. '
				},';

	$json = substr($json, 0, -1);	
	echo $json= $json. ']';

?>