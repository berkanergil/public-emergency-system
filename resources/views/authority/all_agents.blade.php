@extends('authority.dashboard')
@section('breadcrumb')
    <a href="{{ route('all_agents') }}">All Agents</a>
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

                    @foreach ($staffObject->agents() as $authority)
                        <tr>
                            <td><a target="_blank"
                                    href="{{ route('one_agent', $authority->id) }}">{{ $authority->id }}</a></td>
                            <td>{{ Str::title($authority->department?->title) }}</td>
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
