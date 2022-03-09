@extends('layouts.dashboard')

@php
use App\Models\Staff;
use Illuminate\Support\Facades\App;

$role = Staff::find(Auth::id())->staff_role_id;
$locale = App::currentLocale();
@endphp

@section('breadcrumb')
    <a href="{{ route('agent', $staff) }}">{{ __('Agent ID') }}: {{ $staff->id }} Profile</a>
@endsection
@section('statistic_content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card user-card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header cards text-center">
                        <h5 class=" text-white">{{ __('PERSONAL INFORMATION') }}</h5>
                    </div>
                    <div class="card-block p-4">
                        <p class="text-bold mt-3"> <span class="text-muted"> {{ __('Full Name') }}:</span>
                            {{ Str::title($staff->name . ' ' . $staff->surname) }}</p>
                        <p class="text-bold"> <span class="text-muted"> {{ __('Agent ID') }}:</span>
                            {{ $staff->id }} </p>

                        @if ($locale == 'en')
                            <p class="text-bold"> <span class="text-muted"> {{ __('Department') }}:</span>
                                @if ($staff->department_id == 1)
                                    {{ __('Police Department') }}
                                @elseif ($staff->department_id == 2)
                                    {{ __('Health Department') }}
                                @else
                                    {{ __('Fire Department') }}
                                @endif
                            </p>
                        @else
                            <p class="text-bold"> <span class="text-muted"> {{ __('Department') }}:</span>
                                @if ($staff->department_id == 1)
                                    {{ __('Polis Departmanı') }}
                                @elseif ($staff->department_id == 2)
                                    {{ __('Sağlık Departmanı') }}
                                @else
                                    {{ __('İtfaiye Departmanı') }}
                                @endif
                            </p>
                        @endif

                        <p class="text-bold"> <span class="text-muted"> {{ __('Email') }}:</span>
                            {{ $staff->email }} </p>
                        <p class="text-bold"> <span class="text-muted"> {{ __('Phone Number') }}:</span>
                            {{ $staff->msisdn }}
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
                                <i class="far fa-edit"></i> {{ __('Edit User') }}</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card user-card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header cards2 text-center">
                        <h5 class="text-white ">{{ __('DEVICE INFORMATION') }}</h5>
                    </div>
                    <div class="card-block p-4">

                        <p class="text-bold mt-3"> <span class="text-muted"> {{ __('Device Model') }}:</span>
                            {{ $staff->device_model }}</p>
                        <p class="text-bold mt-3"> <span class="text-muted"> {{ __('Device ID') }}:</span>
                            {{ $staff->device_id }}
                        </p>
                        <p class="text-bold"> <span class="text-muted"> {{ __('Device Token') }}:</span>
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
