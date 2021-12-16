@extends('authority.dashboard')

@section('statistic_content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card user-card">
                    <div class="card-header bg-c-blue">
                        <h5 class="font-weight-bold">Personal Information</h5>
                    </div>
                    <div class="card-block ">
                        <p class="text-bold mt-3"> <span class="text-muted"> Full Name:</span> Berkan Ergil</p>
                        <p class="text-bold"> <span class="text-muted"> Agent ID:</span> 1 </p>
                        <p class="text-bold"> <span class="text-muted"> Department:</span> Fire Department</p>
                        <p class="text-bold"> <span class="text-muted"> Email:</span> berkan@fire.com </p>
                        <p class="text-bold"> <span class="text-muted"> Phone Number:</span> 1212112</p>
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

                        <p class="text-bold mt-3"> <span class="text-muted"> Device Name:</span> Iphone XS Max</p>
                        <p class="text-bold mt-3"> <span class="text-muted"> Device ID:</span> 1212Dsy31</p>
                        <p class="text-bold"> <span class="text-muted"> Device Token:</span> 12121dfe2121 </p>
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
