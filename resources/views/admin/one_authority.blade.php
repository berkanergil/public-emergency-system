@extends('admin.adminDasboard')
@section('breadcrumb')
    <a>Authority</a>
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
                        <p class="text-bold mt-3"> <span class="text-muted"> Full Name:</span> {{ $staff->name." ".$staff->surname }}</p>
                        <p class="text-bold"> <span class="text-muted"> User ID:</span> {{ $staff->id }} </p>
                        <p class="text-bold"> <span class="text-muted"> Email:</span> {{ $staff->email }} </p>
                        <p class="text-bold"> <span class="text-muted"> Phone Number:</span> {{ $staff->msisdn }}</p>
                        <ul class="list-unstyled activity-leval text-center">
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                        </ul>
                        <a href="" class="btn btn-outline-primary float-right text-bold"> <i class="far fa-edit"></i>
                            Edit
                            User</a>

                            
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
