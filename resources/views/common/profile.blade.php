@extends('authority.dashboard')
@section('breadcrumb')
    <a class="{{ route('profile', $staff) }}">Profile</a>
@endsection
@section('statistic_content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card user-card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header  cards text-center">
                        <h5 class="text-white font-weight-bold">PERSONAL INFORMATION</h5>
                    </div>
                    <div class="card-block ">
                        <p class="text-bold mt-4"> <span class="text-muted"> Full Name:</span>
                            {{ Str::title($staff->name . ' ' . $staff->surname) }}</p>
                        <p class="text-bold"> <span class="text-muted"> Authority ID:</span>{{ $staff->id }}
                        </p>
                        <p class="text-bold"> <span class="text-muted"> Email:</span>
                            {{ $staff->email }} </p>
                        <p class="text-bold"> <span class="text-muted"> Phone Number:</span> {{ $staff->msisdn }}
                        </p>
                        <ul class="list-unstyled activity-leval text-center">
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                        </ul>
                        <a href="{{ route('editProfile', $staff) }}" class="btn form-buttons float-right"><i
                                class="far fa-edit"></i> Edit Profile</a>
                    </div>

                </div>
            </div>



        </div>
    </div>
@endsection
