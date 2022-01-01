@extends('authority.dashboard')
@section('breadcrumb')
    <a>User</a>
@endsection
@section('statistic_content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card user-card">
                    <div class="card-header bg-primary">
                        <h5 class="font-weight-bold text-center">Personal Information</h5>
                    </div>
                    <div class="card-block ">
                        <p class="text-bold mt-3"> <span class="text-muted"> Full Name:</span> {{ $user->name . ' ' . $user->surname }}</p>
                        <p class="text-bold"> <span class="text-muted"> User ID:</span> {{ $user->id }} </p>
                        <p class="text-bold"> <span class="text-muted"> Email:</span> {{ $user->email }} </p>
                        <p class="text-bold"> <span class="text-muted"> Phone Number:</span> {{ $user->msisdn }}</p>
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
                    <div class="card-header bg-c-green">
                        <h5 class="font-weight-bold">Device Information</h5>
                    </div>
                    <div class="card-block">

                        <p class="text-bold mt-3"> <span class="text-muted"> Device Name:</span> {{ $user->device_model }}</p>
                        <p class="text-bold mt-3"> <span class="text-muted"> Device ID:</span> {{ $user->device_id }}</p>
                        <p class="text-bold"> <span class="text-muted"> Device Token:</span> {{ $user->device_token }} </p>
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
