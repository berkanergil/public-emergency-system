@extends('authority.dashboard')
@section('breadcrumb')
    <a>New Reports</a>
@endsection
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
                <div class="gmap_canvas"><iframe width="1500" height="750" id="gmap_canvas"
                        src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                        href="https://fmovies-online.net">fmovies</a><br>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            height: 750px;
                            width: 1500px;
                        }

                    </style><a href="https://www.embedgooglemap.net">google maps on your website</a>
                    <style>
                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            height: 750px;
                            width: 1500px;
                        }

                    </style>
                </div>
            </div>


        </div>
        <!--/.Card content-->
        <hr>

        <div class="card">

            <div class="card-header ">
                <h3 class="card-title text-danger text-bold"><i class="fas fa-folder"></i> Current Events</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-hover table-bordered text-center">
                    <thead>
                        <tr class="table-primary">
                            <th>Event ID</th>
                            <th>Emergency Type</th>
                            <th>User Name</th>
                            <th>Staff ID</th>
                            <th>Document ID</th>
                            <th>Event Status</th>
                            <th>Location</th>
                            <th>Editor</th>
                            <th>Date & Time</th>

                        </tr>
                    </thead>
                    <tbody class="table-light">

                        <tr>
                            <td><a target="_blank" href="{{ route('eventpage') }}">1</a></td>
                            <td>Crime</td>
                            <td>Tolgahan Dayanıklı</td>
                            <td>\N</td>
                            <td>1</td>
                            <td class="bg-warning">Being Handled</td>
                            <td><a href="">33.1221,35.3232</a></td>
                            <td>Mehmet Taçyıldız</td>
                            <td>2021-12-09 14:45</td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('eventpage') }}">1</a></td>
                            <td>Crime</td>
                            <td>Tolgahan Dayanıklı</td>
                            <td>\N</td>
                            <td>1</td>
                            <td class="bg-red">Not Handled</td>
                            <td><a href="">33.1221,35.3232</a></td>
                            <td>Mehmet Taçyıldız</td>
                            <td>2021-12-09 14:45</td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('eventpage') }}">1</a></td>
                            <td>Crime</td>
                            <td>Tolgahan Dayanıklı</td>
                            <td>\N</td>
                            <td>1</td>
                            <td class="bg-red">Not Handled</td>
                            <td><a href="">33.1221,35.3232</a></td>
                            <td>Mehmet Taçyıldız</td>
                            <td>2021-12-09 14:45</td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('eventpage') }}">1</a></td>
                            <td>Crime</td>
                            <td>Tolgahan Dayanıklı</td>
                            <td>\N</td>
                            <td>1</td>
                            <td class="bg-warning">Being Handled</td>
                            <td><a href="">33.1221,35.3232</a></td>
                            <td>Mehmet Taçyıldız</td>
                            <td>2021-12-09 14:45</td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('eventpage') }}">1</a></td>
                            <td>Crime</td>
                            <td>Tolgahan Dayanıklı</td>
                            <td>\N</td>
                            <td>1</td>
                            <td class="bg-red">Not Handled</td>
                            <td><a href="">33.1221,35.3232</a></td>
                            <td>Mehmet Taçyıldız</td>
                            <td>2021-12-09 14:45</td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('eventpage') }}">1</a></td>
                            <td>Crime</td>
                            <td>Tolgahan Dayanıklı</td>
                            <td>\N</td>
                            <td>1</td>
                            <td class="bg-success">Handled</td>
                            <td><a href="">33.1221,35.3232</a></td>
                            <td>Mehmet Taçyıldız</td>
                            <td>2021-12-09 14:45</td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('eventpage') }}">1</a></td>
                            <td>Crime</td>
                            <td>Tolgahan Dayanıklı</td>
                            <td>\N</td>
                            <td>1</td>
                            <td class="bg-red">Not Handled</td>
                            <td><a href="">33.1221,35.3232</a></td>
                            <td>Mehmet Taçyıldız</td>
                            <td>2021-12-09 14:45</td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('eventpage') }}">1</a></td>
                            <td>Crime</td>
                            <td>Tolgahan Dayanıklı</td>
                            <td>\N</td>
                            <td>1</td>
                            <td class="bg-red">Not Handled</td>
                            <td><a href="">33.1221,35.3232</a></td>
                            <td>Mehmet Taçyıldız</td>
                            <td>2021-12-09 14:45</td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('eventpage') }}">1</a></td>
                            <td>Crime</td>
                            <td>Tolgahan Dayanıklı</td>
                            <td>\N</td>
                            <td>1</td>
                            <td class="bg-red">Not Handled</td>
                            <td><a href="">33.1221,35.3232</a></td>
                            <td>Mehmet Taçyıldız</td>
                            <td>2021-12-09 14:45</td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('eventpage') }}">1</a></td>
                            <td>Crime</td>
                            <td>Tolgahan Dayanıklı</td>
                            <td>\N</td>
                            <td>1</td>
                            <td class="bg-warning">Being Handled</td>
                            <td><a href="">33.1221,35.3232</a></td>
                            <td>Mehmet Taçyıldız</td>
                            <td>2021-12-09 14:45</td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('eventpage') }}">1</a></td>
                            <td>Crime</td>
                            <td>Tolgahan Dayanıklı</td>
                            <td>\N</td>
                            <td>1</td>
                            <td class="bg-red">Not Handled</td>
                            <td><a href="">33.1221,35.3232</a></td>
                            <td>Mehmet Taçyıldız</td>
                            <td>2021-12-09 14:45</td>
                        </tr>
                        <tr>
                            <td><a href="{{ route('eventpage') }}">1</a></td>
                            <td>Crime</td>
                            <td>Tolgahan Dayanıklı</td>
                            <td>\N</td>
                            <td>1</td>
                            <td class="bg-red">Not Handled</td>
                            <td><a href="">33.1221,35.3232</a></td>
                            <td>Mehmet Taçyıldız</td>
                            <td>2021-12-09 14:45</td>
                        </tr>

                        </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!--/.Card-->

    </div>
@endsection
