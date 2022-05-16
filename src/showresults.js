function displaystations() {
  	var myLatLng = {lat: 38.2466, lng: 22.744574};

	var map = new google.maps.Map(document.getElementById('map2'), {
				    center: myLatLng,
				    scrollwheel: true,
				    zoom: 7
		

				});

	var infoWindow = new google.maps.InfoWindow();	
	var jsapikey =$('#apikey').html();
	var url = "./showstationsjson.php?apikey="+ jsapikey;

	var xmlhttp = (window.XMLHttpRequest)?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");

	xmlhttp.onreadystatechange = function(){
	if(xmlhttp.readyState == 4){
		var json = xmlhttp.responseText;
		json = jQuery.parseJSON(json);

		for (var i = 0; i < json.length; i++) {
			var station = json[i]
			var myLatlng = new google.maps.LatLng(station.latitude, station.longitude);
			var marker = new google.maps.Marker({
				position: myLatlng,
				map: map,
				title: station.id
			});

			(function (marker, station) {
				google.maps.event.addListener(marker, "click", function (e) {
					 infoWindow.setContent("<div style = 'width:200px;min-height:40px'>" + station.name + "</div>");
					infoWindow.open(map, marker);
				});
			})(marker, station);
		}
	}
	}
	xmlhttp.open('GET',url, true);
	xmlhttp.send();
}

function absolutevalue() {
  	var myLatLng = {lat: 38.2466, lng: 22.744574};
  	var heatdata= new Array();
  	var objdata;

	var map = new google.maps.Map(document.getElementById('map2'), {
				    center: myLatLng,
				    scrollwheel: true,
				    zoom: 7,
				    mapTypeId: google.maps.MapTypeId.ROADMAP
				});

	var infoWindow = new google.maps.InfoWindow();
	var id = $("#id2").val();
	var pollutant= $("#pollutant1").val();
	var date= $("#date").val();
	var time= $("#time").val();
	var jsapikey =$('#apikey').html();

	var url = "./absolutejson.php?id=" + id +
					"&pollutant=" + pollutant +
					"&date=" + date +
					"&time=" + time +
					"&apikey=" + jsapikey;

	var xmlhttp = (window.XMLHttpRequest)?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");

	xmlhttp.onreadystatechange = function(){
	if(xmlhttp.readyState == 4){
		var json = xmlhttp.responseText;
		json = jQuery.parseJSON(json);

		for (var i = 0; i < json.length; i++) {
			var station = json[i]
			var myLatlng = new google.maps.LatLng(station.latitude, station.longitude);
				objdata={weight: station.value ,location: new google.maps.LatLng(station.latitude, station.longitude)};
				heatdata.push(objdata);

			var heatmap= new google.maps.visualization.HeatmapLayer({
				data: heatdata,
				weight: station.value,
				radius: 50,
			});
			heatmap.setMap(map);

			var marker = new google.maps.Marker({
				position: myLatlng,
				map: map,
				title: station.stationid
			});

			(function (marker, station) {
				google.maps.event.addListener(marker, "click", function (e) {
					 infoWindow.setContent("<div style = 'width:200px;min-height:40px'> Absolute Value: "+ station.value + "</div>");
					infoWindow.open(map, marker);
				});
			})(marker, station);
		}		
	}

	}
	xmlhttp.open('GET',url, true);
	xmlhttp.send();
}

function averagevalue() {
  	var myLatLng = {lat: 38.2466, lng: 22.744574};
  	var heatdata= new Array();
  	var objdata;

	var map = new google.maps.Map(document.getElementById('map2'), {
				    center: myLatLng,
				    scrollwheel: true,
				    zoom: 7,
				    mapTypeId: google.maps.MapTypeId.ROADMAP
				});

	var infoWindow = new google.maps.InfoWindow();
	var id = $("#id2").val();
	var pollutant= $("#pollutant1").val();
	var from= $("#from").val();
	var to= $("#to").val();
	var jsapikey =$('#apikey').html();

	var url = "./averagejson.php?id=" + id +
					"&pollutant=" + pollutant +
					"&from=" + from +
					"&to=" + to +
					"&apikey=" + jsapikey;

	var xmlhttp = (window.XMLHttpRequest)?new XMLHttpRequest():new ActiveXObject("Microsoft.XMLHTTP");

	xmlhttp.onreadystatechange = function(){
	if(xmlhttp.readyState == 4){
		var json = xmlhttp.responseText;
		json = jQuery.parseJSON(json);

		for (var i = 0; i < json.length; i++) {
			var station = json[i]
			var myLatlng = new google.maps.LatLng(station.latitude, station.longitude);
				objdata={weight: station.value ,location: new google.maps.LatLng(station.latitude, station.longitude)};
				heatdata.push(objdata);

			var heatmap= new google.maps.visualization.HeatmapLayer({
				data: heatdata,
				weight: station.value,
				radius: 50,
			});
			heatmap.setMap(map);

			var marker = new google.maps.Marker({
				position: myLatlng,
				map: map,
				title: station.stationid
			});

			(function (marker, station) {
				google.maps.event.addListener(marker, "click", function (e) {
					 infoWindow.setContent("<div style = 'width:200px;min-height:40px'>Average value: " + station.value + "<br>Standard Deviation: " +station.deviation+"</div>");
					infoWindow.open(map, marker);
				});
			})(marker, station);
		}
	}
	}
	xmlhttp.open('GET',url, true);
	xmlhttp.send();
}
