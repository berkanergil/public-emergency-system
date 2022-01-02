@extends('authority.dashboard')
@section('breadcrumb')
    <a>Agent Profile</a>
@endsection
@section('statistic_content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card user-card">
                    <div class="card-header bg-success">
                        <h5 class="font-weight-bold">Personal Information</h5>
                    </div>
                    <div class="card-block p-4">
                        <p class="text-bold mt-3"> <span class="text-muted"> Full Name:</span>
                            {{ $staff->name . ' ' . $staff->surname }}</p>
                        <p class="text-bold"> <span class="text-muted"> Agent ID:</span> {{ $staff->id }} </p>
                        <p class="text-bold"> <span class="text-muted"> Department:</span>
                            {{ $staff->department_id }}</p>
                        <p class="text-bold"> <span class="text-muted"> Email:</span> {{ $staff->email }} </p>
                        <p class="text-bold"> <span class="text-muted"> Phone Number:</span> {{ $staff->msisdn }}
                        </p>
                        <ul class="list-unstyled activity-leval text-center">
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card user-card">
                    <div class="card-header bg-primary">
                        <h5 class="font-weight-bold">Device Information</h5>
                    </div>
                    <div class="card-block p-4">

                        <p class="text-bold mt-3"> <span class="text-muted"> Device Name:</span> Iphone XS Max</p>
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
