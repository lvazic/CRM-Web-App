<!DOCTYPE html>
<head>
<?php
session_start();
if(empty($_SESSION['imeprezime']))
{
header('Location: login.php');
}
?>



 <script src="js/jquery.js"></script>
	<script src="jquery-ui/jquery-ui.js"></script>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>


 
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCUPnhHodFAHnVesDToGphgHi-JRLs0l0U&sensor=false">
    </script>
	<style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas { height: 100% }
    </style>
	
	
	
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/plugins/morris.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	
	
	
   <script type="text/javascript">

      function initialize() {
          // JSON dobijen od wizarda
	    var stilovi = [
  {
    "featureType": "transit.station",
    "stylers": [
      { "visibility": "simplified" },
      { "hue": "#ff1a00" },
      { "color": "#ff1a00" }
    ]
  },{
    "featureType": "road",
    "stylers": [
      { "visibility": "simplified" }
    ]
  },{
  }
];
		
           // kreiranje novog stila
		var stilizovanaMapa = new google.maps.StyledMapType(stilovi,
    {name: "Magacin mapa"});

		var podesavanjaMape = {
			center: new google.maps.LatLng(44.816268, 20.416658),
			zoom: 15,
			minZoom: 14,
			zoomControl: true,
			zoomControlOptions: { position: google.maps.ControlPosition.TOP_RIGHT },
			panControl: true,
			panControlOptions: { position: google.maps.ControlPosition.TOP_RIGHT },
			streetViewControl: true,
			mapTypeControl: true,
			scaleControl: true,
			overviewMapControl: true,
			mapTypeId: 'magacinMapa',
			mapTypeControlOptions: {
				mapTypeIds: [ 'magacinMapa', google.maps.MapTypeId.TERRAIN, google.maps.MapTypeId.HYBRID ]
			}
			
		};
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            podesavanjaMape);
			
		  
			$.getJSON('php/getMapData.php', function(json1) {
    $.each(json1, function(key, data) {
        var latLng = new google.maps.LatLng(data.lat, data.lng);
		console.log(data.lat, data.lng);
        // Creating a marker and putting it on the map
        var marker = new google.maps.Marker({
            position: latLng,
            map: map,
            title: data.ime
        });
		
		marker.info = new google.maps.InfoWindow({
  content: '<b>Ime:</b> ' + data.ime + ' </br> Adresa: ' + data.adresa 
});

google.maps.event.addListener(marker, 'click', function() {
  marker.info.open(map, marker);
});
    });
});
			
			
          // dodavanje novog stila u mapu
		map.mapTypes.set('magacinMapa', stilizovanaMapa);
		map.setMapTypeId('magacinMapa');
		console.log("prolaz inicijalizacije");
      }
      google.maps.event.addDomListener(window, 'load', initialize);
	  console.log("dodat listener");
	  
	 

	  
	  
	  
	  
    </script>


</head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
  <div class="navbar-header">
          <a class="navbar-brand" href="index.php">CRM Aplikacija - Mapa magacina</a>
        </div>
    <ul class="nav navbar-nav">
             <li><a href="index.php">Nazad u aplikaciju</a></li>
          
           
          </ul>
  </div>
</nav>
    <div id="map-canvas"/>
<div class="container">

<div class="page-header">
</div>

<!-- Registration form - START -->
<div class="container">

    <div class="row">


    </div>
</div>





<!-- Registration form - END -->

</div>



</body>
</html>