<?php require_once("includes/header.php"); ?>

<div class="row  border-bottom white-bg dashboard-header">


      <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Monthly</span>
                                <h5>Twitter alerts</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">40 886,200</h1>
                                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                                <small>Total income</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-info pull-right">Annual</span>
                                <h5>Alerts</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">275,800</h1>
                                <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>
                                <small>New alerts</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-primary pull-right">Today</span>
                                <h5>Reports</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">106,120</h1>
                                <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>
                                <small>New reports</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-danger pull-right">Low value</span>
                                <h5>User activity</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins">80,600</h1>
                                <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>
                                <small>activity</small>
                            </div>
                        </div>
            </div>
        </div>



<div class="col-sm-6"><h2>Real-time Disease Monitoring Tool</h2>
<input id="pac-input" class="controls" type="text" placeholder="Search Box">
      <input id="fe" type="button" value="Find disease locations on the map">

</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
    <div id="map1">
      
    </div>
         <script>
        // When the window has finished loading google map
 // When the window has finished loading google map
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Options for Google map
            // More info see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions1 = {
                zoom: 8,
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
          // [START region_getplaces]
          // Listen for the event fired when the user selects a prediction and retrieve
          // more details for that place.
          searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
              return;
            }

            // Clear out the old markers.
            markers.forEach(function(marker) {
              marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
              var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
              };

              // Create a marker for each place.
              markers.push(new google.maps.Marker({
                map: map1,
                icon: icon,
                title: place.name,
                position: place.geometry.location
              }));

              if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
              } else {
                bounds.extend(place.geometry.location);
              }
            });
            map1.fitBounds(bounds);
          });
          // [END region_getplaces] 

          //show the places with houses on button click
            var geocoder = new google.maps.Geocoder();
            document.getElementById('fe').addEventListener('click', function() {

              geocodeAddress(geocoder, map1);
              //geocodemultipleAddresses();
            });
            
        }

        function geocodeAddress(geocoder, resultsMap) {



  $.getJSON('http://localhost/rdss/index.php/welcome/disease_location', function(data) {
    console.log(data);
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

  /*function myFunction() 
  {
      var base_url = "<?= base_url();?>";
      var item = document.getElementById("countyid");
      var itemIndex = item.selectedIndex;
      var itemSelected = item[itemIndex].value;
     var url = base_url+"alert/get_sub_county_by_id";
     $.getJSON
      ( url,
        {county_name:itemSelected},
        function(dataReceived)
        {
          /*NOTES:
            0 - funding agency id
            1 - funding agency name
            2 - commodity id
            3 - commodity name
          
          $("#selected_sub_county").html(dataReceived[1]);
         
        }

      );
  }*/
  </script>  
   
</div>
<?php require_once("includes/footer.php"); ?>