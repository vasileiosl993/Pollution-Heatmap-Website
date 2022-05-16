<!DOCTYPE html>
<html lang="el">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Pollution Data</title>
    <!-- Bootstrap -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src='./showresults.js' ></script>
	<script type = "text/javascript" 
         src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src='./showstatssite.js' ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCp7nYCK3sMozoWe5THt-7_j4KL0OhpAOg&language=el&region=GR&libraries=visualization" async defer></script>
  	<script type="text/javascript"></script>
    <script> 	
    function initMap() {
  		var myLatLng = {lat: 38.2466, lng: 22.744574};

  		 map = new google.maps.Map(document.getElementById('map2'), {
    		center: myLatLng,
    		scrollwheel: true,
    		zoom: 7
  		});
	}	
  	</script>
	</head>
  
	<body onload="initMap()">
		<style>
 			body {
        		background-image: url("http://www.ogdoo.gr/media/k2/items/cache/90d808ff613ad77cdc251e428930e048_XL.jpg");
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
		</style>
		<div id="apikey" class="hidden">
			<?php
				$apikey='prv/NAfV/dUrw';
				echo $apikey;
			?>
		</div>

		<div class="container-fluid">
		
	    <!--NAVBAR-->
    	<nav class="navbar navbar-default">
          <div class="navbar-header">
              <a class="navbar-brand" href="#">Kapsoura Software</a>
          </div>
          <ul class="nav navbar-nav">
          	<li class="active"> <a href="http://localhost/ProjectWeb2016/demowebsite.php">Home<br><center><i class="glyphicon glyphicon-home"></i></center></a></li>
          	<li><a href="http://localhost/ProjectWeb2016/someinfo.php">More Info<br><center><i class="glyphicon glyphicon-info-sign"></i></center></a></li>
            <li><a href="http://www.ypeka.gr/Default.aspx?tabid=495&language=el-GR" target="_blank">Ministry of Enviroment and Energy<br><center><i class="glyphicon glyphicon-leaf"></i></center></a></li> 
            <li><a href="http://athos.ceid.upatras.gr/intech/files/Ergastiriaki_Askisi_15_16.pdf" target="_blank">Project Specifics<br><center><i class="glyphicon glyphicon-tasks"></i></center></a></li> 
          </ul>
		</nav>
	
		<div class="row">
			<div class= "col-md-2">
				<!--Member options for their API-KEY statistics-->
				<div  class="row">
					<div id="userinfom" class= "col-md-12">
						<div class="well well-lg"><div class="well well-lg"><h3>Request Info</br></h3></div>
						<ul id="stats4" ></ul>
					</div>
				</div>
			</div>	
		</div>
			
		<!--HEAT MAP WINDOW-->
		<div id="heatmapm" class= "col-md-7">
			<section class="map">
				<div class="well well-sm">
					<h2>Pollution Heat Map</h3>
				</div>
				<div class="well well-sm">
					<div id="map2" style="width: 700px; height:500px;">
					</div>
				</div>
			</section>
		</div>
				
		<div> 
			<audio controls autoplay>
  				<source src="audio.mp3" type="audio/mpeg">
			</audio> 
		</div>
		
		<div id="kagkouriespali" class="col-md-3">
			<div class="well well-lg"><h3><center>API Requests</center></h3></div>
		</div>
		
		<div id="requests" class= "col-md-3">
			<div class="well well-lg">
				<h4><center>Station Registry</center></h4>
				<center><input type="button" onclick="displaystations()" class="btn btn-primary" value="Display All Stations" /></center>
				<br>
				<form id='Pollution Absolute Value' accept-charset='UTF-8'>
					<fieldset>
						<input type='hidden' name='submitted' id='submitted' value='1'/>
						<label for='pollutant' >Pollutant:</label>
						<input type='text' name='pollutant' id='pollutant1'  maxlength="50" />
						<br>
						<input type='hidden' name='submitted' id='submitted' value='1'/>
						<label for='id' >Station Id:</label>
						<input type='text' name='id' id='id2'  maxlength="50" />
						<br>
						<input type='hidden' name='submitted' id='submitted' value='1'/>
						<label for='date' >Date:</label>
						<input type='date' name='date' id='date'  maxlength="50" />
						<br>
						<input type='hidden' name='submitted' id='submitted' value='1'/>
						<label for='time' >Time:</label>
						<input type='text' name='time' id='time'  maxlength="50" />
						<br>
						<p><br>(Timespan for average pollution value calculation)</p>
						<input type='hidden' name='submitted' id='submitted' value='1'/>
						<label for='date' >From:</label>
						<input type='date' name='from' id='from'  maxlength="50" />
						<br>
						<input type='hidden' name='submitted' id='submitted' value='1'/>
						<label for='to' >To:</label>
						<input type='date' name='to' id='to'  maxlength="50" />
						<br>		
						<input type="button" onclick="absolutevalue()" class="btn btn-primary" value='Calculate |Pollution|'/>
						<input type="button" onclick="averagevalue()" class="btn btn-primary" value='Calculate Average Pollution'/>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>