$(document).ready(function() {
	setInterval(function () {
		$.ajax({                                      
	    	url: "./counterstatsadmin.php",                           
	      	data: "",                        
	                                       
	      	dataType: 'json',                     
	      	success: function(json){          
	        	var display = json[0].showstationstimes;              
	        	var absolute = json[0].absolutevaluetimes;           
	        	var average = json[0].averagevaluetimes;
	        	$('#stats1').html("<b>Total requests by type:</b><br>Display Stations times: "+display+" <br>Absolute Value times: "+absolute+" <br>Average Value times: "+average); //Set output element html
			}
		});
	},5000);


	setInterval(function () {
		$.ajax({                                      
	    	url: "./top10apikeys.php",                          
	      	data: "",                        
	                                       
	      	dataType: 'json',                      
	      	success: function(json){          
	      		$('#stats2').html("<b>10 Api-Keys with the most requests:</b><br>");
	      		for (var i=0; i < json.length && i<=9; i++ ) {
					var nodeString = "<li>" + "Api-Key: " +
						json[i].apikey + " " + "Number of requests: " +
						json[i].numberofrequests + "<br>"
						"</li>"

						$("#stats2").append(nodeString);
				}
			}
		});
	},5000);


	setInterval(function () {
		$.ajax({                                      
	    	url: "./apikeynumber.php",                      
	      	data: "",                        
	                                       
	      	dataType: 'json',                     
	      	success: function(json){          
	        	var number = json[0].numberofapikeys;              
	        	$('#stats3').html("<b>Number of Api-Keys: </b>"+number);
			}
		});
	},5000);
});