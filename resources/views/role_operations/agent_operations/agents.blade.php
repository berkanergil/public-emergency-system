@extends('layouts.dashboard')
@section('breadcrumb')
    <a href="{{ route('agents') }}">All Agents</a>
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
                    <tr class="table-primary">
                        <th class="create_staff_form">Agent ID</th>
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
