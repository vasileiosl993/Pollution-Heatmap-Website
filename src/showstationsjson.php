<?php
    
    include("config.php");
    session_start();

    //Api-key check
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
                    "message"       : "'.$msg.'"
                    },';    
    }else{
        $updatequery="UPDATE members SET displaycounter=displaycounter+1 WHERE members.apikey= '$apikey'";
        
        $update=mysqli_query($connect,$updatequery);
        $select=mysqli_query($connect,"SELECT * FROM stations WHERE 1");
        while($row=mysqli_fetch_array($select)){
        	$json= $json.'{
    					"id"		: 	"'. $row['id'] . '",
    					"name" 	: 	"' . $row['name'] . '",
    					"latitude"	:	' . $row['lat'] . ',
    					"longitude"	:	' . $row['lng'] . '
    					},'; 
       	}
    }
    $json = substr($json, 0, -1);
    echo $json.']'; 
?>