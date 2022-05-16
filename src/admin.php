<!DOCTYPE html>


<html lang="el">
	<head>
	<meta charset="utf-8">
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8869-7" />-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pollution Data</title>
    <!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src='./showresults.js' ></script> 
	<script type = "text/javascript" 
         src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src='./showstatsadmin.js' ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>


	<style>
 	body {
        background-image: url("http://www.wallpaperhd.pk/wp-content/uploads/2016/01/yangshuo-china-beautiful-landscape-wallpaper-1920x1080.jpg");
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

    /* Set black background color, white text and some padding */
    footer {
      background-color: rgb(0, 204, 153);
      color: white;
      padding: 15px;
    }
	</style> 

</head>
<body>

<div class="container-fluid">

		<div class="row">
			<div class= "col-md-4">
					<div id="userinfo" class= "col-md-12">
						<div class="well well-lg"><div class="well well-sm">Statistics for all API-keys <i class="glyphicon glyphicon-stats"></i></div></br></p>
							<ul id="stats1"></ul>
							<ul id="stats2"></ul>
							<ul id="stats3"></ul>
						</div>
					</div>
				</div>
			<div class= "col-md-4">
				<div class="well well-lg">
					<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#stations"><b>Station Database Manager <i class="glyphicon glyphicon-tasks"></i></b></button>
					<div id="stations" class="collapse">
					<div class="well well-lg">
					
					<!--Add Station -->
					<p><b>Add Station </b></p>
		 			<form id='Add Station' action='addstation.php' method='POST' accept-charset='UTF-8'>
					<fieldset >
						<input type='hidden' name='submitted' id='submitted' value='1'/>
						<label for='id' >Id:</label>
						<input type='text' name='id' id='id'  maxlength="50" />
						<br>
						<label for='name' >Name:</label>
						<input type='name' name='name' id='name' maxlength="50" />
						<br>
						<label for='lat' >Latitude:</label>
						<input type='lat' name='lat' id='lat' maxlength="50" />
						<br>
						<label for='lng' >Longitude:</label>
						<input type='lng' name='lng' id='lng' maxlength="50" />
						<br>
						<input type='submit' class="btn btn-primary" name='Submit' value='Add Station' />
					</fieldset>
					</form>
	
					<br><p><b>Remove Station </b></p>
					<form id='Remove Station' action='removestation.php' method='POST' accept-charset='UTF-8'>
					<fieldset>
						<input type='hidden' name='submitted' id='submitted' value='1'/>
						<label for='id' >Id:</label>
						<input type='text' name='id' id='id'  maxlength="50" />
						<br>
						<input type='submit' class="btn btn-primary" name='Submit' value='Remove Station'/>
					</fieldset>
					</form></div>
					</div>	
				</div>
			</div>
			<div class= "col-md-4">
				<div class="well well-lg">
					<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#upload"><b>Upload Pollution Data  <i class="glyphicon glyphicon-upload"></i></b></button>
					<div id="upload" class= "collapse">
						<div class="well well-lg"><p>Enter the <strong>Upload</strong> information.</p>
						<form action="upload.php" method="post" enctype="multipart/form-data">
						<fieldset>
							<input type='hidden' name='submitted' id='submitted' value='1'/>
							<label for="id">Station Id</label>
							<input type="text" name="id" id='id' maxlength="50" />
							<br>
							<label for="year">Year</label>
							<input type="text" name="year" id='year' maxlength="50" />
							<br>
							<label for="pollutant">Pollutant</label>
							<input type="text" name="pollutant" id='pollutant' maxlength="50" />
							<br>
							<label for="upload"></label>
							<input type="file" name="upload" class="btn btn-info" />
							<br>
							<input type="submit" class="btn btn-primary" name="Submit" value="Upload" />
						</fieldset>
						</form></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> 
</body>
</html>