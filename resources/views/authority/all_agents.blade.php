@extends('authority.dashboard')
@section('breadcrumb')
    <a>All Agents</a>
@endsection
@section('statistic_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold">Agents List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-danger">
                        <th>Agent ID</th>
                        <th>Agent Department</th>
                        <th>Name Surname</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Date & Time</th>

                    </tr>
                </thead>
                <tbody class="table-light">

                    <tr>
                        <td><a target="_blank" href="{{ route('one_agent') }}">1</a></td>
                        <td>Health Department</td>
                        <td>Berkan Ergil</td>
                        <td>berkan@health.com</td>
                        <td>0543231212</td>
                        <td>2021-15-15 14:33:22</td>
                    </tr>
                    <tr>
                        <td><a target="_blank" href="{{ route('one_agent') }}">2</a></td>
                        <td>Police Department</td>
                        <td>Mehmet Taçyıldız</td>
                        <td>mehmet@police.com</td>
                        <td>0543231212</td>
                        <td>2021-15-15 14:33:22</td>
                    </tr>
                    <tr>
                        <td><a target="_blank" href="{{ route('one_agent') }}">3</a></td>
                        <td>Fire Department</td>
                        <td>İbrahim Emin</td>
                        <td>ibrahim@fire.com</td>
                        <td>0543231212</td>
                        <td>2021-15-15 14:33:22</td>
                    </tr>
                    </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
