<?php require_once("includes/header.php"); ?>

<div class="row  border-bottom white-bg dashboard-header">
<div class="col-sm-6"><h2>Real-time Disease Monitoring Tool</h2></div>
 <style>
 #map {
 	width: 800px;
 	height: 600px;
 	}
 	</style>
 	<div id="map"></div>
    <script>
      function initMap() {
        var mapDiv = document.getElementById('map');
        var map = new google.maps.Map(mapDiv, {
          center: {lat: 1.2833, lng: 36.8167},
          zoom: 4
        });

      }
</script>
<script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
        async defer></script>










</div>
<?php require_once("includes/footer.php"); ?>