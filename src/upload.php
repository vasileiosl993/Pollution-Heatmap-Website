<?php

    include("config.php");
    session_start();

	$myid = mysqli_real_escape_string($connect,$_POST['id']);
	$myyear = mysqli_real_escape_string($connect,$_POST['year']);
	$mypollutant = mysqli_real_escape_string($connect,$_POST['pollutant']);

    $csv=$_FILES['upload']['tmp_name'];
    $file=fopen($csv,"r");

    if(isset($_REQUEST['Submit'])!=''){
        if(empty($_REQUEST['id']) || empty($_REQUEST['year']) || empty($_REQUEST['pollutant']) || empty($_FILES['upload'])) {
            echo "please fill the empty field.";
        }
        else{

            while(($data = fgetcsv($file, 160, ","))!==FALSE) {

                //Convert String to Date!!!
                $realdate= date('Y-m-d',strtotime($data[0]));

                //Convert String to Decimal (float)!!!
                $realdata1= floatval($data[1]);
                $realdata2= floatval($data[2]);
                $realdata3= floatval($data[3]);
                $realdata4= floatval($data[4]);
                $realdata5= floatval($data[5]);
                $realdata6= floatval($data[6]);
                $realdata7= floatval($data[7]);
                $realdata8= floatval($data[8]);
                $realdata9= floatval($data[9]);
                $realdata10= floatval($data[10]);
                $realdata11= floatval($data[11]);
                $realdata12= floatval($data[12]);
                $realdata13= floatval($data[13]);
                $realdata14= floatval($data[14]);
                $realdata15= floatval($data[15]);
                $realdata16= floatval($data[16]);
                $realdata17= floatval($data[17]);
                $realdata18= floatval($data[18]);
                $realdata19= floatval($data[19]);
                $realdata20= floatval($data[20]);
                $realdata21= floatval($data[21]);
                $realdata22= floatval($data[22]);
                $realdata23= floatval($data[23]);
                $realdata24= floatval($data[24]);

                if($realdata1==-9999){$realdata1=0;}
                if($realdata2==-9999){$realdata2=0;}
                if($realdata3==-9999){$realdata3=0;}
                if($realdata4==-9999){$realdata4=0;}
                if($realdata5==-9999){$realdata5=0;}
                if($realdata6==-9999){$realdata6=0;}
                if($realdata7==-9999){$realdata7=0;}
                if($realdata8==-9999){$realdata8=0;}
                if($realdata9==-9999){$realdata9=0;}
                if($realdata10==-9999){$realdata10=0;}
                if($realdata11==-9999){$realdata11=0;}
                if($realdata12==-9999){$realdata12=0;}
                if($realdata13==-9999){$realdata13=0;}
                if($realdata14==-9999){$realdata14=0;}
                if($realdata15==-9999){$realdata15=0;}
                if($realdata16==-9999){$realdata16=0;}
                if($realdata17==-9999){$realdata17=0;}
                if($realdata18==-9999){$realdata18=0;}
                if($realdata19==-9999){$realdata19=0;}
                if($realdata20==-9999){$realdata20=0;}
                if($realdata21==-9999){$realdata21=0;}
                if($realdata22==-9999){$realdata22=0;}
                if($realdata23==-9999){$realdata23=0;}
                if($realdata24==-9999){$realdata24=0;}


                if(!$insert=mysqli_query($connect,"INSERT INTO data VALUES ('','$myid','$realdate','$mypollutant','$realdata1','$realdata2','$realdata3','$realdata4','$realdata5','$realdata6','$realdata7','$realdata8','$realdata9','$realdata10','$realdata11','$realdata12','$realdata13','$realdata14','$realdata15','$realdata16','$realdata17','$realdata18','$realdata19','$realdata20','$realdata21','$realdata22','$realdata23','$realdata24');")){
                    echo("Error description: " . mysqli_error($connect));
                }
            }

            fclose($file);
        }

        if($insert){
            header("location: admin.php");
        }else{
            echo "Insert Failed.";
        }
    }
?>
<html>
<body>
<div id="GoBack" class= "col-md-4">
    <form>
        <input Type="button" VALUE="Return" onClick="history.go(-1);return true;">
    </form>
</div>
</body>
</html>