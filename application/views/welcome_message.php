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
                zoom: 8,
                // draggable: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center: new google.maps.LatLng(1.2666667, 36.800000),
            };
// 1.2667° S, 36.8000° E
            // Get all html elements for map
            var mapElement1 = document.getElementById('map1');
       
            // Create the Google Map using elements
            var map1 = new google.maps.Map(mapElement1, mapOptions1); 
            console.log("map1", map1); 

             // Create the search box and link it to the UI element.
              var input = document.getElementById('pac-input');
              // var searchBox = new google.maps.places.SearchBox(input);
              map1.controls[google.maps.ControlPosition.TOP_LEFT].push(input);


            // Bias the SearchBox results towards current map's viewport.
            map1.addListener('bounds_changed', function() {
            // searchBox.setBounds(map1.getBounds());
            });

             var markers = [];
            var geocoder = new google.maps.Geocoder();
            document.getElementById('fe').addEventListener('click', function() {
              geocodeAddress(geocoder, map1);
              //geocodemultipleAddresses();
            });
            
        }

function geocodeAddress(geocoder, resultsMap) {

 $.getJSON('<?php echo(base_url()); ?>index.php/welcome/disease_locations', function(data) {
    $(data).each(function(key, value) {

    address = value + ",Nairobi,Kenya";
    geocoder.geocode(
      {
        // 'address': address[i]
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
<?php require_once("includes/footer.php"); ?>
