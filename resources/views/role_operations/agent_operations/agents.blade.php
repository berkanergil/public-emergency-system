@extends('layouts.dashboard')
@section('breadcrumb')
    <a href="{{ route('agents') }}">All Agents</a>
@endsection
@section('statistic_content')
    <div class="card  p-5 shadow p-3 mb-5 bg-white rounded">
        <div class="card-title">
            <h2 class="create_staff_form text-bold">All Agents</h2>
            <hr class="create_staff_form">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-primary">
                        <th class="create_staff_form">ID</th>
                        <th class="create_staff_form">Agent Department</th>
                        <th class="create_staff_form">Name Surname</th>
                        <th class="create_staff_form">Email</th>
                        <th class="create_staff_form">Phone Number</th>
                        <th class="create_staff_form">Date & Time</th>

                    </tr>
                </thead>
                <tbody class="table-light">

                    @foreach ($staffObject->agents() as $authority)
                        <tr>
                            <td><a target="_blank" href="{{ route('agent', $authority->id) }}">{{ $authority->id }}</a>
                            </td>
                            <td>{{ Str::title($authority->department?->title) }} Department</td>
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
