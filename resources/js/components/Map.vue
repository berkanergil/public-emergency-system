<template> 
    <div id="map"></div>    
</template>

<script>
export default {
    data() {
        return {
            map: null,
            cyprus: {
                lat: 35.095192,
                lng: 33.203430
            },
        }
    },
    methods: {
        initMap() {
           this.map = new google.maps.Map(document.getElementById("map"), {
                 zoom: 9,
                 center: this.cyprus
             });
        },
        getReports(){
            axios.get('/admin/newReports/all')
                .then(response => {
                    for(const report of response.data)
                    {
                        this.setMarker(report)
                    }
                })
                .catch( error => {
                    console.log(error)
                });
        },
        setMarker(report) {
            const contentString =
                '<div id="content"><div id="siteNotice"></div>' +
                '<h4 id="firstHeading" class="class="boldMap"">Report ID: ' + report.id + '</h4>' +
                '<h4 class="boldMap">Event Status: ' + report.event_status_id + '</h4>' +
                '<div style="font-size: 12pt;" >' +
                '</br><span class="boldMap">Emergency Type:</span>  ' + report.event_type_id +
                '</br><span class="boldMap">Description:</span> ' + report.description  +
                '</br><span class="boldMap">Reported At:</span> ' + report.created_at +
                + '</div>' + '<br>' +  '<button class="form-buttons mapButton">See Report</button>' + '</div>';
            const infowindow = new google.maps.InfoWindow({
                content: contentString,
               
            })
            const marker = new google.maps.Marker({
                position: new google.maps.LatLng(report.lat, report.lon),
                icon: report.event_status_id == 1 ? "http://maps.google.com/mapfiles/ms/icons/green-dot.png"
                        : (
                            report.event_status_id == 2 ? "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png" 
                            : (report.event_status_id == 3 ? "http://maps.google.com/mapfiles/ms/icons/red-dot.png" : "http://maps.google.com/mapfiles/ms/icons/blue-dot.png")
                        ),
                map: this.map,
            })
            marker.addListener("click", () => {
                infowindow.open({
                anchor: marker,
                map,
                shouldFocus: false,
                })
            })
        }
    },
    created() {
        window.Echo.channel('new-event')
            .listen('.event.created', (e) => {
                this.setMarker(e.model)
            }),
        window.Echo.channel('updated-event')
            .listen('.event.updated', (e) => {
                this.getReports()
            })
    },
    mounted() {
        this.initMap()
        this.getReports()
    }
}
</script>