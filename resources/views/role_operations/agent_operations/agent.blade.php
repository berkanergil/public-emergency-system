@extends('layouts.dashboard')

@php
use App\Models\Staff;
$role = Staff::find(Auth::id())->staff_role_id;
@endphp

@section('breadcrumb')
    <a href="{{ route('agent', $staff) }}">Agent ID: {{ $staff->id }} Profile</a>
@endsection
@section('statistic_content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card user-card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header cards text-center">
                        <h5 class=" text-white">PERSONAL INFORMATION</h5>
                    </div>
                    <div class="card-block p-4">
                        <p class="text-bold mt-3"> <span class="text-muted"> Full Name:</span>
                            {{ Str::title($staff->name . ' ' . $staff->surname) }}</p>
                        <p class="text-bold"> <span class="text-muted"> Agent ID:</span> {{ $staff->id }} </p>
                        <p class="text-bold"> <span class="text-muted"> Department:</span>
                            @if ($staff->department_id == 1)
                                Police Department
                            @elseif ($staff->department_id == 2)
                                Health Department

                            @else
                                Fire Department
                            @endif
                        </p>
                        <p class="text-bold"> <span class="text-muted"> Email:</span> {{ $staff->email }} </p>
                        <p class="text-bold"> <span class="text-muted"> Phone Number:</span> {{ $staff->msisdn }}
                        </p>
                        <ul class="list-unstyled activity-leval text-center">
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                        </ul>
                        @if ($role == '3')
                            <a href="{{ route('editAgent', $staff->id) }}" class="form-buttons float-right">
                                <i class="far fa-edit"></i> Edit
                                User</a>
                        @endif


                    </div>

                </div>

            </div>

            <div class="col-md-6">
                <div class="card user-card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header cards2 text-center">
                        <h5 class="text-white ">DEVICE INFORMATION</h5>
                    </div>
                    <div class="card-block p-4">

                        <p class="text-bold mt-3"> <span class="text-muted"> Device Name:</span>
                            {{ $staff->device_model }}</p>
                        <p class="text-bold mt-3"> <span class="text-muted"> Device ID:</span> {{ $staff->device_id }}
                        </p>
                        <p class="text-bold"> <span class="text-muted"> Device Token:</span>
                            {{ $staff->device_token }} </p>
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
