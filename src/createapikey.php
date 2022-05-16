<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8869-7" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>Pollution Data</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script $(document).on("keydown", function (e) {
               if (e.which === 8 && !$(e.target).is("input, textarea")) {
                  e.preventDefault();
               }
           });>
    </script>
  </head>

  <body>
    <style>
      body{
        background-image: url("http://zonenviro.com/wp-content/uploads/2014/05/Celebrate-Earth-Day-2014-Wallpaper-HD.jpg");
      }
      .navbar{
        min-height:50px;
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
  </body>

  <div class="container-fluid">
    <div class="row">
      <!--LOGIN-->
      <div id="login" class= "col-md-4">
        <div class="well well-lg">
          <h2>Login<i class="glyphicon glyphicon-log-in"></i></h2>
          <form id='login' action='login.php' method='POST' accept-charset='UTF-8'>
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="password">Password:</label>
            <div class="col-sm-10"> 
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
            </div>
          </div>
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
              </div>
            </div>
          </div>
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-info">Login <i class="glyphicon glyphicon-envelope"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!--ABOUT-->
    <div id="about" class="col-md-4">
       <div class="well well-lg">
          <h2> About the API</h2>
          <p>Welcome visitor! The API provides information from stations all over Greece that monitor pollution.If you want to gain 
            access to this info using our API you need to get a valid API-Key. In order to get one you either need to
            sign up and one will automaticaly will be provided for you or if you already have registered but you do not remember 
            it just login and your API-Key will be displayed.</p>
       </div>
     </div>

    <!--SIGNUP-->
    <div id="login" class= "col-md-4">
       <div class="well well-lg">
         <h2>Not already a member? Sign Up!<i class="glyphicon glyphicon-registration-mark"></i></h2>
         <form name="registration" method="POST" action="signup.php">
           <div class="form-group">
             <label class="control-label col-sm-2" for="email">Email:</label>
             <div class="col-sm-10">
               <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
             </div>
           </div>
           <div class="form-group">
             <label class="control-label col-sm-2" for="password">Password:</label>
             <div class="col-sm-10"> 
               <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
             </div>
           </div>
           <div class="form-group"> 
             <div class="col-sm-offset-2 col-sm-10">
               <button type="submit" name="submit" class="btn btn-success">Register <i class="glyphicon glyphicon-envelope"></i></button>   
             </div>
           </div>
         </form>
       </div>      
     </div>
   </div>
  </div>
    
    <!--ABOUT-->
  <div class="row">
    <div id="about2" class="col-md-6">
      <div class="well well-lg">
        <h3> Pollutant Monitoring Stations </h3>
        <p>The Greek Administration of Atmospheric Pollution and Noise Control (Air Quality Department) installed the National Air
        Pollution Monitoring Network (EDPAR)in 2001 , expanding and upgrading the existing network at the time .The Air Quality Department
        operates the station network in the Attica region located in Aliartos Viotia for the needs of Pollution Transboundary Transfer 
        Program ( EMEP ) and a station at Oinofyta. In other areas, stations operated by regional administrations.</p>
      </div>
    </div>
     
    <!--ABOUT-->
    <div id="about3" class="col-md-6">
     <div class="well well-lg">   
        <h3> Monitored Pollutants </h3>
        <p>Measurement of contaminants is taking place continuously over the course of 24 hours. The response time of the automatic 
        analyzers is of the order of one minute, ie. Each analyst gives a value approximately every minute. With a microprocessor, which 
        is in any auto station and is connected with the automatic analyzers the average hourly values ​​for pollution are being calculated
        each time .These values ​​are transferred to the server of the Office by telephone line and thus allow the continuous monitoring of 
        air pollution levels in the region.</p>
      </div>
    </div>
  </div>
</html>