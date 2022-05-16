<!DOCTYPE html>
<html lang="en">
 	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    	<!-- Include all compiled plugins (below), or include individual files as needed -->
    	<script src="js/bootstrap.min.js"></script>
    	<title>Pollution Data</title>
    	<!-- Bootstrap -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  	</head>
  
	<body>
		<style>
		body{
			background-image: url("http://zonenviro.com/wp-content/uploads/2014/05/Celebrate-Earth-Day-2014-Wallpaper-HD.jpg");
		}
	    .panel-transparent {
        	background: rgb(153, 255, 221,0.5);
    	}
    	.panel-transparent .panel-body{
      		opacity: 0.5;
      		border: 12px solid #B22222;
      		border-radius: 10px;
      		margin-top: 15px;
      		margin-bottom: 15px;
      		background: rgba(46, 51, 56, 0.8)!important;
    	}
    	#about{
    		align:center;
    	}
    	table {
    		border-collapse: collapse;
    		width: 100%;
		}
		th, td {
    		text-align: left;
    		padding: 8px;
		}
		tr:nth-child(even){background-color: #f2f2f2}
		th {
    		background-color: #4CAF50;
    		color: white;
		}
		</style>
	</body>
	
	<div class="container-fluid">	
    <!--NAVBAR-->
     	<nav class="navbar navbar-default">
          <div class="navbar-header">
              <a class="navbar-brand" href="#">Kapsoura Software</a>
          </div>
          <ul class="nav navbar-nav">
          	<li> <a href="http://localhost/ProjectWeb2016/demowebsite.php">Home<br><center><i class="glyphicon glyphicon-home"></i></center></a></li>
            <li  class="active"><a href="http://localhost/ProjectWeb2016/someinfo.php">More Info<br><center><i class="glyphicon glyphicon-info-sign"></i></center></a></li>
            <li><a href="http://www.ypeka.gr/Default.aspx?tabid=495&language=el-GR" target="_blank">Ministry of Enviroment and Energy<br><center><i class="glyphicon glyphicon-leaf"></i></center></a></li> 
            <li><a href="http://athos.ceid.upatras.gr/intech/files/Ergastiriaki_Askisi_15_16.pdf" target="_blank">Project Specifics<br><center><i class="glyphicon glyphicon-tasks"></i></center></a></li> 
          </ul>
     	</nav>

     	<div id="about" class="col-md-4">
	      	<div class="well well-lg">
       			<h2> About the site</h2>
       			<p>This web site gives access to information on pollution data that has been monitored from stations all over Greece.
       			Services of the site include the display of a pollution measurement in a certain (or all) stations for a specific day
       			and time, the display of the average pollution value and standard deviation in a certain (or all) stations for a given time period and also 
       			the display of all stations. Stations are shown on the map with the use of markers and by cicking on them the information
       			requested above is shown in the info window that pops. Information is also displayed with the use of a heatmap. Visitors
       			in the site are able to see the number of requests to display this information that have been sent from this site. All 
       			information is provided by the API developed by Manolojohny,Skretas & Lagios Software Company. </p>
	    	</div>
   		</div>

		<div id="about" class="col-md-4">
			<div class="well well-lg"><h2>Automated Calibration Instruments</h2>
				<p>Calibration involves testing the proper functioning of the institutions and their regulation . The calibration is based on the
				transmission of gas through the instrument, with a known concentration of the respective pollutant . This preparation of standard
				gas is made by dynamic dilution device which is connected firstly to a source of "clean " air and the other with a cylinder 
				containing a mixture of said gas with nitrogen at a known standard concentration. The " clean air " , ie air from the main 
				pollutants produced by passing air through specific pollutant retention filters. By varying the supply of "clean " air and the gas 
				bottle is possible to achieve gas mixtures containing the same dirt on known concentrations . The calibration of the particulate
				matter analyzers based on standard samples of known mass . the calibration procedures are done at regular intervals or after 
				maintenance or repair of the analyzer.</p>
			</div>
		</div>

		<div id="table" class="col-md-4">
			<div class="well well-lg"><h3>Measured pollutants and measurement methods</h3>
				<table border="1" style="width:100%">
				<tr>
					<td><b>Ρύπος</b></td>
					<td><b>Μέθοδος μέτρησης</b></td>		
				</tr>
				<tr>
					<td>Μονοξείδιο του άνθρακα (CO)</td>
					<td>Απορρόφηση στο υπέρυθρο (NDIR)</td>		
				</tr>
				<tr>
					<td>Οξείδια του αζώτου (ΝΟ,NO2)</td>
					<td>Χημειοφωταύγεια</td>		
				</tr>
				<tr>
					<td>Όζον (O3)</td>
					<td>Απορρόφηση στο υπεριώδες</td>		
				</tr>
				<tr>
					<td>Διοξείδιο του θείου (SO2)</td>
					<td>Φθορισμομετρία</td>		
				</tr>
				<tr>
					<td>Αιωρούμενα σωματίδια (ΑΣ10–ΑΣ2,5)</td>
					<td>Απορρόφηση β ακτινοβολίας (εκτός από την Ελευσίνα όπου χρησιμοποιείται η σταθμική)</td>		
				</tr>
				<tr>
					<td>Βενζόλιο (C6H6)	</td>
					<td>Αέρια χρωματογραφία (GC)</td>		
				</tr>
				</table>
			</div>
		</div>
	</div>
	</div>
</htl>
