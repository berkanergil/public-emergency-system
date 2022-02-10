@extends('authority.dashboard')
@section('breadcrumb')
    <a href="">Agent Group</a>
@endsection
@section('statistic_content')
    @php
    use App\Models\Staff;
    @endphp
    <div class="container-fluid">
        <div class="row card-info card-outline pt-3">
            <div class="row">
                <div class="col-md-6">

                    <h3 class="text-bold mb-3">Agent Group: <span class="text-danger">{{ $group[0]->group_id }}</span>
                    </h3>
                </div>
                <div class="col-md-6">
                    <button class="btn form-buttons3 btn-md p-2  float-right mb-5"><i class="fas fa-edit"></i> Edit
                        Agent Group</button>

                </div>

            </div>
            @foreach ($group as $row)
                @php
                    $agent = Staff::find($row->staff_id);
                    $modal_trigger = 'agent' . $agent?->id;
                @endphp
                @if (isset($agent))
                    <div class="col-md-4">
                        <div class="card card-primary card-outline shadow  bg-white rounded">
                            <div class="card-body box-profile">

                                <h3 class="profile-username text-center text-danger text-bold">
                                    {{ Str::title($agent->department->title) . ' Department' }}</h3>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Name Surname:</b> <a
                                            class="float-right">{{ Str::title($agent->name . ' ' . $agent->surname) }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Phone Number:</b> <a class="float-right">{{ $agent->msisdn }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email:</b> <a class="float-right">{{ $agent->email }}</a>
                                    </li>
                                </ul>

                                <button type="button" data-toggle="modal" data-target="#{{ $modal_trigger }}" href="#"
                                    class="btn btn-info btn-block"><b>Agent
                                        Information</b></button>
                            </div>
                            <!-- /.card-body -->
                            <div class="modal fade" id="{{ $modal_trigger }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content border border-dark">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center text-bold text-dark"
                                                id="exampleModalLongTitle">
                                                <i class="fas fa-id-badge mr-2"></i>Agent
                                                Details
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body box-profile">
                                            <h3 class="profile-username text-center text-primary">
                                                {{ Str::title($agent->department->title) . ' Department' }}</h3>

                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item border-0">
                                                    <b>Agent Group ID:</b> <a class="float-right"></a>
                                                </li>
                                                <li class="list-group-item border-0">
                                                    <b>Agent ID:</b> <a class="float-right">{{ $agent->id }}</a>
                                                </li>
                                                <li class="list-group-item border-0">
                                                    <b>Name Surname:</b> <a
                                                        class="float-right">{{ Str::title($agent->name . ' ' . $agent->surname) }}
                                                    </a>
                                                </li>
                                                <li class="list-group-item border-0">
                                                    <b>Phone Number:</b> <a
                                                        class="float-right">{{ $agent->msisdn }}</a>
                                                </li>
                                                <li class="list-group-item border-0">
                                                    <b>Email:</b> <a class="float-right">{{ $agent->msisdn }}</a>
                                                </li>
                                                <li class="list-group-item border-0">
                                                    <b>Device ID:</b> <a
                                                        class="float-right">{{ $agent->device_id }}</a>
                                                </li>
                                                <li class="list-group-item border-0">
                                                    <b>Device Token:</b> <a
                                                        class="float-right">{{ $agent->device_token }}</a>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ route('agent', $agent) }}" class="btn btn-dark btn-block"><i
                                                    class="fas fa-user mr-2"></i>Visit
                                                Profile</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            @endforeach

        </div>
    </div>
@endsection
