@extends('authority.dashboard')
@section('breadcrumb')
    <a>All Users</a>
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
                    <tr class="table-light">
                        <th>User ID</th>
                        <th>Name Surname</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Date & Time</th>

                    </tr>
                </thead>
                <tbody class="table-light">

                    <tr>
                        <td><a target="_blank" href="{{ route('one_user') }}">1</a></td>
                        <td>Berkan Ergil</td>
                        <td>berkan@gmail.com</td>
                        <td>0543231212</td>
                        <td>2021-15-15 14:33:22</td>
                    </tr>
                    <tr>
                        <td><a target="_blank" href="{{ route('one_user') }}">1</a></td>
                        <td>Berkan Ergil</td>
                        <td>berkan@gmail.com</td>
                        <td>0543231212</td>
                        <td>2021-15-15 14:33:22</td>
                    </tr>
                    <tr>
                        <td><a target="_blank" href="{{ route('one_user') }}">1</a></td>
                        <td>Berkan Ergil</td>
                        <td>berkan@gmail.com</td>
                        <td>0543231212</td>
                        <td>2021-15-15 14:33:22</td>
                    </tr>
                    <tr>
                        <td><a target="_blank" href="{{ route('one_user') }}">1</a></td>
                        <td>Berkan Ergil</td>
                        <td>berkan@gmail.com</td>
                        <td>0543231212</td>
                        <td>2021-15-15 14:33:22</td>
                    </tr>
                    </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
