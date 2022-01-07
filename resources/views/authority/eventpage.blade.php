@extends('authority.dashboard')
@section('breadcrumb')
    <a href="{{ route('eventpage', $event) }}">View Event ID: {{ $event->id }}</a>
@endsection

@section('statistic_content')
    @php
    use App\Models\EventStatus;
    use App\Models\Staff;

    $eventStatus = EventStatus::all()->pluck('title', 'id');
    $currentStatus = $event?->eventStatus?->title;
    $currentStatusId = $event?->eventStatus?->id;
    $group = $event?->groupEvent?->group($event?->groupEvent?->group_id);
    $bgSuccess = 'bg-success';
    $bgWarning = 'bg-warning';
    $bgDanger = 'bg-danger';
    @endphp
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit"></i>
                    Reported Event ID:{{ $event->id }}
                </h3>
            </div>
            <div class="card-body">
                <h4 class="mb-3 text-bold">{{ $event->description }}</h4>
                <div class="btn-group button-groups my-3 ">
                    <button id="mark_event" type="button" class="btn btn-lg btn-default button1 text-bold">Mark
                        Event</button>
                    <button id="send_notification" type="button" class="btn btn-lg btn-default button4 text-bold">Send
                        Notification</button>
                    <button id="upload_evidence" type="button" class="btn btn-lg btn-default button5 text-bold">Upload
                        Evidence</button>
                    <button id="deploy_agent_group" type="button" class="btn btn-lg btn-default button6 text-bold">Deploy
                        Agent Group</button>

                </div>
                <hr class="w-75">
                <ul class="nav nav-tabs text-bold" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item ">
                        <a class="nav-link active p-3" id="custom-content-below-home-tab" data-toggle="pill"
                            href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home"
                            aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-3" id="custom-content-below-operations-tab" data-toggle="pill"
                            href="#custom-content-below-operations" role="tab"
                            aria-controls="custom-content-below-operations" aria-selected="false">Operations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-3" id="custom-content-below-agentsDeployed-tab" data-toggle="pill"
                            href="#custom-content-below-agentsDeployed" role="tab"
                            aria-controls="custom-content-below-agentsDeployed" aria-selected="false">Agents Deployed</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link p-3" id="custom-content-below-evidence-tab" data-toggle="pill"
                            href="#custom-content-below-evidence" role="tab" aria-controls="custom-content-below-evidence"
                            aria-selected="false">Evidences</a>
                    </li>
                </ul>
                <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active py-5" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
                        <div class="row">
                            <div class="col-md-6 ml-5 mr-5">
                                <div class="card  shadow  bg-white rounded">
                                    <div
                                        class="card-title text-bold p-3 {{ $event->event_status_id === '1' ? 'bg-success' : ($event->event_status_id === '2' ? 'bg-warning' : 'bg-danger') }}">
                                        Emergency Information
                                        ({{ Str::title($event->eventStatus->title) }})
                                    </div>
                                    <div class=" 
                                        card-body">
                                        <ul>
                                            <li class="list-group-item border-0"><strong>Emergency Type:</strong>
                                                {{ Str::title($event->eventType->title) }}
                                            </li>
                                            <li class="list-group-item border-0"><strong>Description:</strong>
                                                {{ Str::title($event->description) }}
                                            </li>
                                            <li class="list-group-item border-0"><strong>Name Surname:</strong>
                                                @if (isset($event->user))
                                                    {{ Str::title($event->user->name . ' ' . $event->user->surname) }}
                                                    @else{{ Str::title($event->staff->name . ' ' . $event->staff->surname . ' ' . ' (Staff Category)') }}
                                                @endif
                                            </li>

                                            <li class="list-group-item border-0"><strong>Phone Number:</strong>
                                                @if (isset($event->user))
                                                    {{ $event->user->msisdn }}
                                                    @else{{ $event->staff->msisdn }}
                                                @endif
                                            </li>
                                            <li class="list-group-item border-0"><strong>Age:</strong>
                                                @if (isset($event->user))
                                                    {{ $event->user->age }}
                                                    @else{{ ' No Age !' }}
                                                @endif

                                            </li>
                                            <li class="list-group-item border-0"><strong>Email:</strong>
                                                @if (isset($event->user))
                                                    {{ $event->user->email }}
                                                    @else{{ $event->staff->email }}
                                                @endif
                                            </li>
                                            <li class="list-group-item border-0"><strong>Report Date & Time:</strong>
                                                {{ $event->created_at }}
                                            </li>
                                            <li class="list-group-item border-0"><strong>Editor:</strong> Kullanıcı
                                                Eklenecek</li>
                                            <li class="list-group-item border-0"><strong>Note:</strong>
                                                {{ $event->note }}
                                            </li>
                                        </ul>
                                        <a href="{{ route('edit_report', $event->id) }}"
                                            class="btn p-2 float-right btn-dark"><i class="far fa-edit"></i>
                                            Make Changes</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 ml-5">
                                <div class="card shadow  bg-white rounded">
                                    <div class="card-title bg-info p-3 text-bold">Device Information</div>
                                    <div class="card-body">
                                        <ul>
                                            <li class="list-group-item border-0"><strong>Device ID:</strong>
                                                @if (isset($event->user))
                                                    {{ $event->user->device_id }}
                                                    @else{{ $event->staff->device_id }}
                                                @endif
                                            </li>
                                            <li class="list-group-item border-0"><strong>Phone Model:</strong>
                                                @if (isset($event->user))
                                                    {{ $event->user->device_model }}
                                                    @else{{ $event->staff->device_model }}
                                                @endif
                                            </li>
                                            <li class="list-group-item border-0"><strong>Event Location:</strong>
                                                <a target="_blank" class="bg-danger p-2 rounded"
                                                    href="https://www.google.com/maps/search/{{ $event->lat . ',' . $event->lon }}">
                                                    {{ $event->lat . ' ' . $event->lon }}</a>
                                            </li>
                                            <li class="list-group-item border-0"><strong>Device Token:</strong>
                                                @if (isset($event->user))
                                                    {{ $event->user->device_token }}
                                                    @else{{ $event->staff->device_token }}
                                                @endif
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade py-5" id="custom-content-below-operations" role="tabpanel"
                        aria-labelledby="custom-content-below-operations-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card rounded">
                                    <div class="card-title text-bold p-3 bg-info">Operations Performed
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead class="thead">
                                                <tr>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Content</th>
                                                    <th scope="col">Editor</th>
                                                    <th scope="col">Date</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Notification</td>
                                                    <td>Agents Have Arrived</td>
                                                    <td>Tolgahan Dayanıklı (Agent)</td>
                                                    <td>2021-12-09 11:23</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade py-5" id="custom-content-below-agentsDeployed" role="tabpanel"
                        aria-labelledby="custom-content-below-agentsDeployed-tab">
                        <div class="row">
                            <div class="col-md-7">
                                <h3 class="text-bold mb-3">Agent Group:
                                    @if (isset($group[0]))
                                        <a href="{{ route('one_agentGroup', $group[0]->group_id) }}"
                                            class="text-danger">{{ $group[0]->group_id }} (Click To
                                            See
                                            More
                                            Details About the Group)</a>
                                    @else
                                        No Group

                                    @endif
                                </h3>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center align-items-center">
                            @if (isset($group[0]))
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
                                                        {{ Str::title($agent->department->title) . ' Department' }}
                                                    </h3>

                                                    <ul class="list-group list-group-unbordered mb-3">
                                                        <li class="list-group-item">
                                                            <b>Name Surname:</b> <a class="float-right">
                                                                {{ Str::title($agent->name . ' ' . $agent->surname) }}</a>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Phone Number:</b>
                                                            <aclass="float-right">{{ $agent->msisdn }}
                                                                </aclass=>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <b>Email:</b> <a
                                                                class="float-right">{{ $agent->email }}</a>
                                                        </li>
                                                    </ul>

                                                    <button type="button" data-toggle="modal"
                                                        data-target="#{{ $modal_trigger }}" href="#"
                                                        class="btn btn-info btn-block"><b>Agent
                                                            Information</b></button>
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="modal fade" id="{{ $modal_trigger }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content border border-dark">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-center text-bold text-dark"
                                                                    id="exampleModalLongTitle">
                                                                    <i class="fas fa-id-badge mr-2"></i>Agent
                                                                    Details
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body box-profile">
                                                                <h3 class="profile-username text-center text-primary">
                                                                    {{ Str::title($agent->department->title) . ' Department' }}
                                                                </h3>

                                                                <ul class="list-group list-group-unbordered mb-3">
                                                                    <li class="list-group-item border-0">
                                                                        <b>Agent Group ID:</b> <a
                                                                            class="float-right"></a>
                                                                    </li>
                                                                    <li class="list-group-item border-0">
                                                                        <b>Agent ID:</b> <a
                                                                            class="float-right">{{ $agent->id }}</a>
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
                                                                        <b>Email:</b> <a
                                                                            class="float-right">{{ $agent->msisdn }}</a>
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
                                                                <a href="{{ route('one_agent', $agent) }}"
                                                                    class="btn btn-dark btn-block"><i
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
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane fade py-5" id="custom-content-below-evidence" role="tabpanel"
                        aria-labelledby="custom-content-below-evidence-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card rounded">
                                    <div class="card-title text-bold p-3 bg-danger">Event Evidences
                                    </div>
                                    <div class="card-body">

                                        <table class="table">
                                            <thead class="thead">
                                                <tr>
                                                    <th scope="col">Document</th>
                                                    <th scope="col">Document Type</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="">File Name Example</a></td>
                                                    <td>Photo</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="">File Name Example2</a></td>
                                                    <td>Voice Recording</td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card -->
        </div>

    </section>


@endsection
@section('sweetjs')
    <script>
        var eventStatus = @json($eventStatus);
        var currentStatus = @json($currentStatus);
        var currentStatusId = @json($currentStatusId);
        let _token = $('meta[name="csrf-token"]').attr('content');
        $("#mark_event").on("click", function() {
            Swal.fire({
                title: 'Mark Events As',
                input: 'select',
                inputOptions: eventStatus,
                inputPlaceholder: currentStatus,
                inputValue: currentStatusId,
                showCancelButton: true,
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        if (value === '') {
                            resolve('You need to select oranges :)')
                        } else {
                            $.ajax({
                                url: "{{ route('update_report', $event->id) }}",
                                type: "POST",
                                data: {
                                    event_status_id: value,
                                    _method: "PUT",
                                    _token: _token
                                },
                                success: function() {
                                    swal.fire({
                                        title: "Updated!",
                                        text: "Your row has been updated.",
                                        type: "success",
                                        timer: 3000
                                    }).then(function() {
                                        location.reload(true);
                                    });
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    swal.fire("Error deleting!", "Please try again",
                                        "error");
                                }
                            });
                        }
                    })
                }
            })
        })
        $("#upload_evidence").on("click", function() {
            Swal.fire({
                title: 'Upload Evidence',
                input: 'file',
                inputValue: currentStatusId,
                showCancelButton: true,
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        if (value === '') {
                            resolve('You need to select oranges :)')
                        } else {
                            $.ajax({
                                url: "{{ route('uploadEvidence', $event->id) }}",
                                type: "POST",
                                data: {
                                    event_status_id: value,
                                    _token: _token
                                },
                                success: function() {
                                    swal.fire({
                                        title: "Updated!",
                                        text: "Your row has been updated.",
                                        type: "success",
                                        timer: 50000
                                    });

                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    swal.fire("Error deleting!", "Please try again",
                                        "error");
                                }
                            });
                        }
                    })
                }
            })
        })
    </script>
@endsection
