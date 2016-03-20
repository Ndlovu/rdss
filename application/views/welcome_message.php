<?php require_once("includes/header.php"); ?>

<div class="row  border-bottom white-bg dashboard-header">

<div class="col-sm-6"><h2>Real-time Disease Monitoring Tool</h2></div>
 <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <div id="map1">
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
                center: new google.maps.LatLng(-1.292066, 36.821946),
               };

            // Get all html elements for map
            var mapElement1 = document.getElementById('map1');
       
            // Create the Google Map using elements
            var map1 = new google.maps.Map(mapElement1, mapOptions1);  

             // Create the search box and link it to the UI element.
              var input = document.getElementById('pac-input');
              var searchBox = new google.maps.places.SearchBox(input);
              map1.controls[google.maps.ControlPosition.TOP_LEFT].push(input);


            // Bias the SearchBox results towards current map's viewport.
            map1.addListener('bounds_changed', function() {
            searchBox.setBounds(map1.getBounds());
            });

             var markers = [];
             //show the places with houses on button click
            var geocoder = new google.maps.Geocoder();
            document.getElementById('fe').addEventListener('click', function() {
              geocodeAddress(geocoder, map1);
              //geocodemultipleAddresses();
            });
            
        }

        function geocodeAddress(geocoder, resultsMap) {
//    <link href="<?php echo(base_url()); ?>assets/css/bootstrap.min.css" rel="stylesheet">

         $.getJSON('<?php echo(base_url()); ?>index.php/welcome', function(data) {
            $(data).each(function(key, value) {

            address = value + ",Kenya";

            geocoder.geocode(
              {
                'address': address
              },
              function(results, status) {
                console.log("results", results);
                console.log("status", status);
              if (status === google.maps.GeocoderStatus.OK) {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                  map: resultsMap,
                  position: results[0].geometry.location
                });
              } else {
                alert('Geocode was not successful for the following reason: ' + status);
              }
            });});});
}
  </script>   

    </div>
   
</div>
<?php require_once("includes/footer.php"); ?>