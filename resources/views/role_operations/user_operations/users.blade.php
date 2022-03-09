@extends('layouts.dashboard')
@section('breadcrumb')
    <a href="{{ route('users') }}">All Users</a>
@endsection
@section('statistic_content')
    <div class="card  p-5 shadow p-3 mb-5 bg-white rounded">
        <div class="card-title">
            <h2 class="create_staff_form text-bold">{{ __('All Users') }}</h2>
            <hr class="create_staff_form">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-light">
                        <th class="create_staff_form">{{ __('ID') }}</th>
                        <th class="create_staff_form">{{ __('Name Surname') }}</th>
                        <th class="create_staff_form">{{ __('Email') }}</th>
                        <th class="create_staff_form">{{ __('Phone Number') }}</th>
                        <th class="create_staff_form">{{ __('Date & Time') }}</th>

                    </tr>
                </thead>
                <tbody class="table-light">

                    @foreach ($userObject->users() as $user)
                        <tr>
                            <td><a target="_blank" href="{{ route('user', $user->id) }}">{{ $user->id }}</a></td>
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
