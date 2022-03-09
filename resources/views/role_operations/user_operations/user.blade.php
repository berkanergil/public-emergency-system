@extends('layouts.dashboard')

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
                        <h5 class="text-white font-weight-bold ">{{ __('PERSONAL INFORMATION') }}</h5>
                    </div>
                    <div class="card-block p-4">
                        <p class="text-bold mt-3"> <span class="text-muted"> {{ __('Full Name') }}:</span>
                            {{ Str::title($user->name . ' ' . $user->surname) }}</p>
                        <p class="text-bold"> <span class="text-muted"> {{ __('User ID') }}:</span>
                            {{ $user->id }} </p>
                        <p class="text-bold"> <span class="text-muted"> {{ __('Email') }}:</span>
                            {{ $user->email }} </p>
                        <p class="text-bold"> <span class="text-muted"> {{ __('Phone Number') }}:</span>
                            {{ $user->msisdn }}
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
                                <i class="far fa-edit"></i> {{ __('Edit User') }}</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card user-card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header cards2 text-center">
                        <h5 class="text-white font-weight-bold">{{ __('DEVICE INFORMATION') }}</h5>
                    </div>
                    <div class="card-block p-4">

                        <p class="text-bold mt-3"> <span class="text-muted"> {{ __('Device Model') }}:</span> Iphone
                            XS Max</p>
                        <p class="text-bold mt-3"> <span class="text-muted"> {{ __('Device ID') }}:</span>
                            {{ $user->device_id }}
                        </p>
                        <p class="text-bold"> <span class="text-muted"> {{ __('Device Token') }}:</span>
                            {{ $user->device_token }} </p>
                        <ul class="list-unstyled activity-leval text-center">
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                        </ul>


                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
