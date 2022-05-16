<?php

	include("config.php");
	session_start();

	$myid = mysqli_real_escape_string($connect,$_GET['id']);
	$mypollutant = mysqli_real_escape_string($connect,$_GET['pollutant']);
	$myfrom = mysqli_real_escape_string($connect,$_GET['from']);
	$myto = mysqli_real_escape_string($connect,$_GET['to']);

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

		if (empty($mypollutant)){  // Leipei to upoxrewtiko pedio!
				$msg="Leipoun upoxrewtika pedia gia tin sxetiki timh.";
				$json= $json.'{
		    				"message"		: "'.$msg.'"
		    				},';
		}else{
			if(empty($myfrom) || empty($myto)){		//Ean ena toulaxiston apo ta 2 pedia tis sxetikis timhs einai adeio!
				$msg="Sumplhrwste kai ta duo pedia me tis hmeromhnies pou xreiazontai gia tin sxetiki timh.";
				$json= $json.'{
		    				"message"		: "'.$msg.'"
		    				},';
			}else{
				$updatequery="UPDATE members SET averagecounter=averagecounter+1 WHERE members.apikey= '$apikey'";
				$update=mysqli_query($connect,$updatequery);

				if(empty($myid)){			//Den exoume dwsei ID station kai psaxnoume gia olous!  
					$counter = mysqli_query($connect,"SELECT * FROM data WHERE pollutant='$mypollutant' && date1>='$myfrom' && date1<='$myto' GROUP BY station");
					if (mysqli_num_rows($counter) > 0){
						$count=0;
						$sum=0;
						while($counter_row = mysqli_fetch_array($counter)){ //Counter gia epanalipseis me vasi to station ID
							$sum=0;
							$sum2=0;
							$dev=0;
							$count=0;
							$result = mysqli_query($connect,"SELECT * FROM data WHERE station='$counter_row[station]' && pollutant='$mypollutant' && date1>='$myfrom' && date1 <='$myto'");	
							while($row = mysqli_fetch_array($result)){
									$result2=mysqli_query($connect,"SELECT id,lat,lng FROM stations WHERE id='$row[station]'");
									$row2 = mysqli_fetch_array($result2);							
									$sum2= $row['t00']+$row['t01']+$row['t02']+$row['t03']+$row['t04']+$row['t05']+$row['t06']+$row['t07']+$row['t08']+$row['t09']+$row['t10']+$row['t11']+$row['t12']+$row['t13']+$row['t14']+$row['t15']+$row['t16']+$row['t17']+$row['t18']+$row['t19']+$row['t20']+$row['t21']+$row['t22']+$row['t23'];
										$sum += $sum2;
										$count +=24;
									
							}
							$mesi_timi=$sum/$count;

							//Standard deviation
							$deviationquery= mysqli_query($connect,"SELECT * FROM data WHERE station='$counter_row[station]' && pollutant='$mypollutant' && date1>='$myfrom' && date1 <='$myto'");
							while($rowdev=mysqli_fetch_array($deviationquery)){
								$devsum= pow(($rowdev['t00']-$mesi_timi),2)+pow(($rowdev['t01']-$mesi_timi),2)+pow(($rowdev['t02']-$mesi_timi),2)+pow(($rowdev['t03']-$mesi_timi),2)+pow(($rowdev['t04']-$mesi_timi),2)+pow(($rowdev['t05']-$mesi_timi),2)+pow(($rowdev['t06']-$mesi_timi),2)+pow(($rowdev['t07']-$mesi_timi),2)+pow(($rowdev['t08']-$mesi_timi),2)+pow(($rowdev['t09']-$mesi_timi),2)+pow(($rowdev['t10']-$mesi_timi),2)+pow(($rowdev['t11']-$mesi_timi),2)+pow(($rowdev['t12']-$mesi_timi),2)+pow(($rowdev['t13']-$mesi_timi),2)+pow(($rowdev['t14']-$mesi_timi),2)+pow(($rowdev['t15']-$mesi_timi),2)+pow(($rowdev['t16']-$mesi_timi),2)+pow(($rowdev['t17']-$mesi_timi),2)+pow(($rowdev['t18']-$mesi_timi),2)+pow(($rowdev['t19']-$mesi_timi),2)+pow(($rowdev['t20']-$mesi_timi),2)+pow(($rowdev['t21']-$mesi_timi),2)+pow(($rowdev['t22']-$mesi_timi),2)+pow(($rowdev['t23']-$mesi_timi),2);
								$dev+=$devsum;
							}
							$deviation=sqrt($dev/$count);

							$json= $json.'{	  
										"stationid"	: "'.$row2['id'].'",						
										"latitude"		: '.$row2['lat'].', 
										"longitude"		: '.$row2['lng'].',
										"value"		: ' .$mesi_timi.',
										"deviation"		: '.$deviation.'
										},';
						}
					} else {
						$msg="Den uparxei sti vasi dedomenwn.";
						$json= $json.'{
		    						"message"		: "'.$msg.'"
		    						},';
					}
				}else{				//EXOUME ID station kai psaxnoume gia enan!!!
					$result = mysqli_query($connect,"SELECT * FROM data WHERE station='$myid' && pollutant='$mypollutant' && date1>='$myfrom' && date1<='$myto'");
					$result2= mysqli_query($connect,"SELECT id,lat,lng FROM stations WHERE id='$myid'");

					if (mysqli_num_rows($result) > 0){
						$count=0;
						$sum=0;
						$row2 = mysqli_fetch_array($result2);
						while($row = mysqli_fetch_array($result)){
								$sum2= $row['t00']+$row['t01']+$row['t02']+$row['t03']+$row['t04']+$row['t05']+$row['t06']+$row['t07']+$row['t08']+$row['t09']+$row['t10']+$row['t11']+$row['t12']+$row['t13']+$row['t14']+$row['t15']+$row['t16']+$row['t17']+$row['t18']+$row['t19']+$row['t20']+$row['t21']+$row['t22']+$row['t23'];
								$sum += $sum2;
								$count +=24;
						}
						$mesi_timi=$sum/$count;

						//Standard deviation
						$dev=0;
						$deviationquery= mysqli_query($connect,"SELECT * FROM data WHERE station='$myid' && pollutant='$mypollutant' && date1>='$myfrom' && date1<='$myto'");
						while($rowdev=mysqli_fetch_array($deviationquery)){
							$devsum= pow(($rowdev['t00']-$mesi_timi),2)+pow(($rowdev['t01']-$mesi_timi),2)+pow(($rowdev['t02']-$mesi_timi),2)+pow(($rowdev['t03']-$mesi_timi),2)+pow(($rowdev['t04']-$mesi_timi),2)+pow(($rowdev['t05']-$mesi_timi),2)+pow(($rowdev['t06']-$mesi_timi),2)+pow(($rowdev['t07']-$mesi_timi),2)+pow(($rowdev['t08']-$mesi_timi),2)+pow(($rowdev['t09']-$mesi_timi),2)+pow(($rowdev['t10']-$mesi_timi),2)+pow(($rowdev['t11']-$mesi_timi),2)+pow(($rowdev['t12']-$mesi_timi),2)+pow(($rowdev['t13']-$mesi_timi),2)+pow(($rowdev['t14']-$mesi_timi),2)+pow(($rowdev['t15']-$mesi_timi),2)+pow(($rowdev['t16']-$mesi_timi),2)+pow(($rowdev['t17']-$mesi_timi),2)+pow(($rowdev['t18']-$mesi_timi),2)+pow(($rowdev['t19']-$mesi_timi),2)+pow(($rowdev['t20']-$mesi_timi),2)+pow(($rowdev['t21']-$mesi_timi),2)+pow(($rowdev['t22']-$mesi_timi),2)+pow(($rowdev['t23']-$mesi_timi),2);
							$dev+=$devsum;
						}
						$deviation=sqrt($dev/$count);

						$json= $json.'{	  	
									"stationid"		: "'.$row2['id'].'",					
									"latitude"		: '.$row2['lat'].', 
									"longitude"		: '.$row2['lng'].',
									"value"		: ' .$mesi_timi.',
									"deviation"		: '.$deviation.'
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
	}
	$json = substr($json, 0, -1);
	echo $json.']';
?>