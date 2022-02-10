@extends('authority.dashboard')

@section('breadcrumb')
    <a href="">All Authorities</a>
@endsection

@section('statistic_content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title create_staff_form text-bold">Agents List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-success">
                        <th class="create_staff_form">User ID</th>
                        <th class="create_staff_form">Name Surname</th>
                        <th class="create_staff_form">Email</th>
                        <th class="create_staff_form">Phone Number</th>
                        <th class="create_staff_form">Date & Time</th>

                    </tr>
                </thead>
                <tbody class="table-light">
                    @foreach ($staffObject->authorities() as $authority)
                        <tr>
                            <td><a target="_blank"
                                    href="{{ route('authority', $authority->id) }}">{{ $authority->id }}</a></td>
                            <td>{{ Str::title($authority->name . ' ' . $authority->surname) }}</td>
                            <td>{{ $authority->email }}</td>
                            <td>{{ $authority->msisdn }}</td>
                            <td>{{ $authority->created_at }}</td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
