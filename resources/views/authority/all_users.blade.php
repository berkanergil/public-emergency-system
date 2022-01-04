@extends('authority.dashboard')
@section('breadcrumb')
    <a href="{{ route('all_users') }}">All Users</a>
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

                    @foreach ($userObject->users() as $user)
                        <tr>
                            <td><a target="_blank" href="{{ route('one_user', $user->id) }}">{{ $user->id }}</a></td>
                            <td>{{ Str::title($user->name . ' ' . $user->surname) }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->msisdn }}</td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
