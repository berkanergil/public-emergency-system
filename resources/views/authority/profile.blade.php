@extends('authority.dashboard')
@section('breadcrumb')
    <a>Profile</a>
@endsection
@section('statistic_content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card user-card">
                    <div class="card-header bg-c-blue">
                        <h5 class="font-weight-bold">Personal Information</h5>
                    </div>
                    <div class="card-block ">
                        <p class="text-bold mt-3"> <span class="text-muted"> Full Name:</span> Tolgahan Dayanıklı</p>
                        <p class="text-bold"> <span class="text-muted"> Authority ID:</span> 1 </p>
                        <p class="text-bold"> <span class="text-muted"> Email:</span>
                            TOLGAHAN.DAYANIKLI@authority.com </p>
                        <p class="text-bold"> <span class="text-muted"> Phone Number:</span> 1212112</p>
                        <ul class="list-unstyled activity-leval text-center">
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                        </ul>
                        <a href="{{ route('edit_profile') }}" class="btn btn-primary float-right"><i
                                class="far fa-edit"></i> Edit Profile</a>

                    </div>

                </div>
            </div>



        </div>
    </div>
@endsection
