@extends('authority.dashboard')
@section('breadcrumb')
    <a href="{{ route('one_authority', $staff) }}">Authority ID: {{ $staff->id }}</a>
@endsection
@section('statistic_content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card user-card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header text-center bg-blue">
                        <h5 class="text-weight-bold">Personal Information</h5>
                    </div>
                    <div class="card-block p-4">
                        <p class="text-bold mt-3"> <span class="text-muted"> Full Name:</span>
                            {{ $staff->name . ' ' . $staff->surname }}</p>
                        <p class="text-bold"> <span class="text-muted"> Authority ID:</span> {{ $staff->id }}
                        </p>
                        <p class="text-bold"> <span class="text-muted"> Email:</span> {{ $staff->email }} </p>
                        <p class="text-bold"> <span class="text-muted"> Phone Number:</span> {{ $staff->msisdn }}
                        </p>
                        <ul class="list-unstyled activity-leval text-center">
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                        </ul>
                        <a href="{{ route('editAuthority', ['id' => $staff->id]) }}"
                            class="btn btn-outline-primary float-right text-bold"> <i class="far fa-edit"></i>
                            Edit
                            User</a>


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
