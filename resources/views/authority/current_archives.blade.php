@extends('authority.dashboard')
@section('breadcrumb')
    <a>Current Archive</a>
@endsection
@section('statistic_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold">Current Events</h3>
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
@endsection
