<?php require_once("includes/header.php"); ?>

<div class="row  border-bottom white-bg dashboard-header">

<div class="col-sm-6"><h2>Real-time Disease Monitoring Tool</h2></div>
 <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <div id="map1"></div>
    <script>
    // When the window has finished loading google map
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Options for Google map
            // More info see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions1 = {
                zoom: 7,
                // draggable: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center: new google.maps.LatLng(-1.2667, 36.8000),
            };

            // Get all html elements for map
            var mapElement1 = document.getElementById('map1');
       
            // Create the Google Map using elements
            var map1 = new google.maps.Map(mapElement1, mapOptions1); 
            console.log("map1", map1); 


             var markers = [];
            var geocoder = new google.maps.Geocoder();
            document.getElementById('fe').addEventListener('click', function() {
              geocodeAddress(geocoder, map1);
              //geocodemultipleAddresses();
            });
            
        }


}





















  </script>   
</div>
<?php require_once("includes/footer.php"); ?>