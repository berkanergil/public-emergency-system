 @extends('layouts.dashboard')
 @section('breadcrumb')
 @endsection
 <style type="text/css">
     /* Set the size of the div element that contains the map */
     #map {
         height: 800px;
         /* The height is 400 pixels */
         width: 100%;
         /* The width is the width of the web page */
     }

 </style>

 @section('statistic_content')
     <div class="container-fluid">
         <div class="card px-5">
             <div class="card-title">
                 <h3 class="create_staff_form">{{ __('New Reports') }}</h4>
                     <hr class="create_staff_form">
             </div>
             <div class="card-body">
                 {{-- <div id="map"></div> --}}
                 <live-map></live-map>
             </div>
         </div>
     </div>


     <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
     <script async
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcn-lnWsUHf2TwU1EeCV9SbRrDYcI7Suc&callback=initMap&libraries=&v=weekly">
     </script>
 @endsection

 @section('sweetjs')
     {{-- <script>
         window.array1 = {!! $lat_lon_handled !!}
         window.array2 = {!! $lat_lon_being_handled !!}
         window.array3 = {!! $lat_lon_not_handled !!}
         window.array4 = {!! $lat_lon_merged !!}
     </script> --}}
     {{-- <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcn-lnWsUHf2TwU1EeCV9SbRrDYcI7Suc&callback=initMap&libraries=&v=weekly"
          async defer>
     </script> --}}
     {{-- <script>
         // Initialize and add the map
         function initMap() {
             const cyprus = {
                 lat: 35.095192,
                 lng: 33.203430
             };
             // The location of Uluru

             // The map, centered at Uluru
             const map = new google.maps.Map(document.getElementById("map"), {
                 zoom: 9,
                 center: cyprus,
             });
             var infowindow = new google.maps.InfoWindow();

             // The marker, positioned at Uluru
             var markers = [];
             window.array1.forEach(element => {
                 function createInfoWindow(map, element) {
                     // Get properties from Data Layer to populate info window
                     var reporter = element.user_id;
                     var eventStatus = element.event_status_id;
                     var eventType = element.event_type_id;
                     var description = element.description;
                     var createdAt = element.created_at;

                     // Create content for info window
                     var contentString = '<div id="content"><div id="siteNotice"></div>' +
                         '<h2 id="firstHeading" class="firstHeading">' + reporter + '</h2>' +
                         '<h3>Zip code: ' + eventStatus + '</h3>' +
                         '<div id="bodyContent" style="font-size: 12pt;" >' +
                         '</br>Population (2018): ' + eventType +
                         '</br>Median income (2015): ' + description + ' €' +
                         '</br>Median income relative to national average (2015): ' + created_at +
                         ' €' + '</div>' + '</div>';
                     infowindow.setContent(contentString);
                 }
                 marker1 = new google.maps.Marker({
                     position: new google.maps.LatLng(element.lat, element.lon),
                     title: element.title,
                     icon: "http://maps.google.com/mapfiles/ms/icons/green-dot.png",
                     map: map,
                 });
                 markers.push(marker1);

             });
             window.array2.forEach(element => {
                 marker2 = new google.maps.Marker({
                     position: new google.maps.LatLng(element.lat, element.lon),
                     title: element.title,
                     header: element.title,
                     description: element.description,
                     icon: "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png",
                     map: map
                 });
                 markers.push(marker2);

             });
             window.array3.forEach(element => {
                 marker3 = new google.maps.Marker({
                     position: new google.maps.LatLng(element.lat, element.lon),
                     title: element.title,
                     header: element.title,
                     description: element.description,
                     icon: "http://maps.google.com/mapfiles/ms/icons/red-dot.png",
                     map: map
                 });
                 markers.push(marker3);

             });
             window.array4.forEach(element => {
                 marker4 = new google.maps.Marker({
                     position: new google.maps.LatLng(element.lat, element.lon),
                     title: element.title,
                     header: element.title,
                     description: element.description,
                     icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
                     map: map
                 });
                 markers.push(marker4);
             });




             //  marker.addListener("click", () => {
             //      infowindow.open({
             //          anchor: marker,
             //          map,
             //          shouldFocus: false,
             //      });
             //  });

             var markerCluster = new MarkerClusterer({
                 map,
                 markers

             });

         }

         function toggleBounce() {
             if (marker.getAnimation() !== null) {
                 marker.setAnimation(null);
             } else {
                 marker.setAnimation(google.maps.Animation.BOUNCE);
             }
         }
     </script> --}}
 @endsection
