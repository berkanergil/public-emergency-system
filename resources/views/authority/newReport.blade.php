@extends('authority.dashboard')

@section('statistic_content')
    <div class="card card-cascade narrower">

        <!--Card image-->
        <div class="view view-cascade gradient-card-header peach-gradient text-center">
            <h3 class="ml-5 mt-4 text-bold text-danger"><i class="fas fa-map-marker-alt"></i> Live Map</h3>
        </div>
        <!--/Card image-->

        <!--Card content-->
        <div class="card-body card-body-cascade text-center d-flex justify-content-center align-items-center">

            <!--Google map-->
            <div class="mapouter">
                <div class="gmap_canvas"><iframe width="1600" height="700" id="gmap_canvas"
                        src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                        href="https://123movies-to.org"></a><br>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            height: 700px;
                            width: 1600px;
                        }

                    </style><a href="https://www.embedgooglemap.net">google maps embed code generator</a>
                    <style>
                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            height: 700px;
                            width: 1600px;
                        }

                    </style>
                </div>
            </div>


        </div>
        <!--/.Card content-->

    </div>
    <!--/.Card-->

    </div>
@endsection
