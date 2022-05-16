$(document).ready(function() {
	setInterval(function(){
		var jsapikey=$("#apikey").html();
		$.ajax({                                      
	    	url: "./counterstats.php?apikey="+jsapikey,                           
	      	data: "",                        
	                                       
	      	dataType: 'json',                     
	      	success: function(json){          
	        	var display = json[0].showstationstimes;              
	        	var absolute = json[0].absolutevaluetimes;           
	        	var average = json[0].averagevaluetimes;
	        	$('#stats4').html("<b>Total requests by type:</b><br>Display Stations times: "+display+" <br>Absolute Value times: "+absolute+" <br>Average Value times: "+average); 
			}
		});
	},5000);

});