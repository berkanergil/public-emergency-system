@extends('authority.dashboard')
@section('breadcrumb')
    <a href="{{ route('newReport') }}">New Reports</a>
    <style type="text/css">
        /* Set the size of the div element that contains the map */
        #map {
            height: 800px;
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
        }

    </style>
@endsection
@section('statistic_content')
    <div class="card card-cascade narrower">

        <!--Card image-->
        <div class="view view-cascade gradient-card-header peach-gradient text-center">
            <h3 class="ml-5 mt-4 text-bold text-danger"><i class="fas fa-map-marker-alt"></i> Live Map</h3>
        </div>

        <div class="card-body card-body-cascade text-center d-flex justify-content-center align-items-center">

            <div id="map"></div>

        </div>
    </div>
    <!--/.Card-->

    </div>

@endsection

@section('sweetjs')

    <script>
        window.array = {!! $lat_lon !!}
        window.array.forEach(element => {

            console.log(element.lat);
        });
    </script>
    <script
        src="{{ url('https://maps.googleapis.com/maps/api/js?key=AIzaSyBbE2tnlZUVFTEzDzKIJJTg7ukThQlkKHs&callback=initMap&libraries=&v=weekly') }}"
        async></script>

    <script>
        // Initialize and add the map
        function initMap() {
            const cyprus = {
                lat: 35.095192,
                lng: 33.203430
            };
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 9,
                center: cyprus,
            });
            var markers = [];
            window.array.forEach(element => {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(element.lat, element.lon),
                    map: map
                });
                markers.push(marker);
            });


            var markerCluster = new MarkerClusterer({map, markers});
        }
    </script>
@endsection
