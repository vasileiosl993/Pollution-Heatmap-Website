<?php

	include("config.php");
	session_start();

	$myid = mysqli_real_escape_string($connect,$_GET["id"]);
	$mypollutant = mysqli_real_escape_string($connect,$_GET["pollutant"]);
	$mydate = mysqli_real_escape_string($connect,$_GET["date"]);
	$mytime = mysqli_real_escape_string($connect,$_GET["time"]);

	//Time
	$mytimenew = substr_replace($mytime, 't', 0, 0);

	//Apikey check
	$apikey=$_GET['apikey'];
    $apiquery='SELECT apikey FROM members WHERE 1';
    $apiresult=mysqli_query($connect,$apiquery);
    $developer=0;
    while($apirow=mysqli_fetch_array($apiresult)){
	    if($apirow['apikey']==$apikey){
	        $developer=1;
	    }
	}

	$json= '[';

	if(!$developer){
		$msg="To apikey den antistoixei.";
		$json= $json.'{
    				"message"		: "'.$msg.'"
    				},';	
	}else{

		//PSAXNOUME GIA ABSOLUTE!!!
		if (empty($mypollutant) || empty($mytime) || empty($mydate)){  // Leipoun ta 3 upoxrewtika pedia!
			$msg="Leipoun upoxrewtika pedia gia tin apoluth timh.";
		    		$json= $json.'{
		    					"message"		: "'.$msg.'"
		    					},';
		}else{
			$updatequery="UPDATE members SET absolutecounter=absolutecounter+1 WHERE members.apikey='$apikey'";
			$update=mysqli_query($connect,$updatequery);
			
			if(empty($myid)){ 				//DEN EXOUME ID STATION OPOTE PSAXNOUME GIA OLOUS TOUS STATHMOUS!
				$result = mysqli_query($connect,"SELECT station,$mytimenew FROM data WHERE pollutant='$mypollutant' && date1='$mydate'");			
				if (mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)) {
						$result2=mysqli_query($connect,"SELECT lat,lng FROM stations WHERE id='$row[station]'");
						$row2= mysqli_fetch_array($result2);
						$json= $json. '{
									"stationid"	: "'.$row['station'].'",
									"latitude"		: '.$row2['lat'].', 
									"longitude"		: '.$row2['lng'].',
									"value"		: ' .$row[$mytimenew].'
									},';
					}
				} else {
		    		$msg="Den uparxei sti vasi dedomenwn.";
		    		$json= $json.'{
		    					"message"		: "'.$msg.'"
		    					},';
				}								
			}else{					//Exoume dwsei ID station opote psaxnoume gia enan stathmo!

				$result = mysqli_query($connect,"SELECT station,$mytimenew FROM data WHERE station='$myid' && pollutant='$mypollutant' && date1='$mydate'");
				$result2= mysqli_query($connect,"SELECT lat,lng FROM stations WHERE id='$myid'");
				if (mysqli_num_rows($result) > 0){
					$row = mysqli_fetch_array($result);
					$row2 = mysqli_fetch_array($result2);
					$update=mysqli_query($connect,"UPDATE data SET value='$row[$mytimenew]' WHERE station='$myid' && pollutant='$mypollutant' && date1='$mydate' ");
					$json= $json.'{	     
								"stationid"		: "'.$row['station'].'",   						
								"latitude"		: '.$row2['lat'].', 
								"longitude"		: '.$row2['lng'].',
								"value"		: ' .$row[$mytimenew].'
								},';
				}else{
					$msg="Den uparxei sti vasi dedomenwn.";
		    		$json= $json.'{
		    					"message"		: "'.$msg.'"
		    					},';
				}					
			}
		}
	}

	$json = substr($json, 0, -1);
	echo $json.']';
?>