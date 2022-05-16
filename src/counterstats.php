<?php

	include("config.php");
	session_start();

	//Api-key check
    $validapikey = $_GET['apikey'];
    $apiquery='SELECT apikey FROM members WHERE 1';
    $apiresult=mysqli_query($connect,$apiquery);
    while($apirow=mysqli_fetch_array($apiresult)){
	    if($apirow['apikey']==$validapikey){
	        $developer=1;
	    }
	}

	$json= '[';

	if(!$developer){
		$msg="To apikey den antistoixei.";
        $json= $json.'{
                    "message"       : "'.$msg.'"
                    },'; 
    }else{
		$counterquery="SELECT displaycounter,absolutecounter,averagecounter FROM members WHERE apikey='$validapikey' ";  //count requests by type

		$counter=mysqli_query($connect,$counterquery);
		$result=mysqli_fetch_array($counter);

		$json= $json. '{
					"showstationstimes"		:	'.$result['displaycounter']. ',
					"absolutevaluetimes"	:	'.$result['absolutecounter']. ',
					"averagevaluetimes"		:	'.$result['averagecounter']. '
					},';

		$json = substr($json, 0, -1);	
		echo $json= $json. ']';
	}
?>