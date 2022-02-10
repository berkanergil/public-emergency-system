@extends('authority.dashboard')

@php
use App\Models\Staff;
$role = Staff::find(Auth::id())->staff_role_id;
@endphp

@section('breadcrumb')
    <a href="{{ route('user', $user) }}">User ID: {{ $user->id }}</a>
@endsection
@section('statistic_content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card user-card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header cards text-center">
                        <h5 class="text-white font-weight-bold ">PERSONAL INFORMATION</h5>
                    </div>
                    <div class="card-block p-4">
                        <p class="text-bold mt-3"> <span class="text-muted"> Full Name:</span>
                            {{ Str::title($user->name . ' ' . $user->surname) }}</p>
                        <p class="text-bold"> <span class="text-muted"> User ID:</span> {{ $user->id }} </p>
                        <p class="text-bold"> <span class="text-muted"> Email:</span> {{ $user->email }} </p>
                        <p class="text-bold"> <span class="text-muted"> Phone Number:</span> {{ $user->msisdn }}
                        </p>
                        <ul class="list-unstyled activity-leval text-center">
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                        </ul>
                        @if ($role == '3')
                            <a href="{{ route('edit_user', $user->id) }}" class="form-buttons float-right">
                                <i class="far fa-edit"></i> Edit
                                User</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card user-card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header cards2 text-center">
                        <h5 class="text-white font-weight-bold">Device Information</h5>
                    </div>
                    <div class="card-block p-4">

                        <p class="text-bold mt-3"> <span class="text-muted"> Device Name:</span> Iphone XS Max</p>
                        <p class="text-bold mt-3"> <span class="text-muted"> Device ID:</span> {{ $user->device_id }}
                        </p>
                        <p class="text-bold"> <span class="text-muted"> Device Token:</span>
                            {{ $user->device_token }} </p>
                        <ul class="list-unstyled activity-leval text-center">
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                        </ul>

                        <div class="row justify-content-center user-social-link text-center">
                            <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook"></i></a></div>
                            <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter"></i></a></div>
                            <div class="col-auto"><a href="#!"><i class="fa fa-dribbble text-dribbble"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
