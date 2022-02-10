@extends('layouts.dashboard')
@section('breadcrumb')
    <a href="{{ route('report', $event) }}">View Event ID: {{ $event->id }}</a>
@endsection

@section('statistic_content')
    @php
    use App\Models\EventStatus;
    use App\Models\Staff;
    use App\Models\Document;
    use App\Models\Group;
    use App\Models\Event;

    $groupObject = new Group();
    $eventObject = new Event();
    $eventStatus = EventStatus::all()->pluck('title', 'id');
    $currentStatus = $event?->eventStatus?->title;
    $currentStatusId = $event?->eventStatus?->id;
    $groups = $event?->groupEvent?->group($event?->groupEvent?->group_id);
    $documentModalTrigger = 'document' . $event?->document?->id;
    $bgWarning = 'bg-warning';
    $bgDanger = 'bg-danger';
    $availableGroups = $groupObject->availableGroups();
    $history = $eventObject->history($event->id);
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
                    <button id="mark_event" type="button" class="btn btn-lg btn-default button1 text-bold"><i
                            class="fas fa-highlighter"></i> Mark
                        Event</button>
                    <button id="send_notification" type="button" class="btn btn-lg btn-default button2 text-bold"><i
                            class="fas fa-sticky-note"></i> Make
                        Notes</button>

                    @if ($event->status->id == '1')
                        <button disabled id="send_sms" type="button" class="btn btn-lg btn-default button4 text-bold"><i
                                class="fas fa-envelope"></i> Send
                            SMS</button>
                        <button disabled id="send_notification" type="button"
                            class="btn btn-lg btn-default button7 text-bold"><i class="fas fa-bell"></i> Send
                            Notification</button>
                        <button disabled id="upload_evidence" type="button"
                            class="btn btn-lg btn-default button5 text-bold"><i class="fas fa-file-upload"></i> Upload
                            Evidence</button>
                        <button disabled data-target=".bd-example-modal-lg" data-toggle="modal" id="deploy_agent_group"
                            type="button" class="btn btn-lg btn-default button6 text-bold"><i class="fas fa-users"></i>
                            Deploy
                            Agent Group</button>

                    @else
                        <button id="send_sms" type="button" class="btn btn-lg btn-default button4 text-bold"><i
                                class="fas fa-envelope"></i> Send
                            SMS</button>
                        <button id="send_notification" type="button" class="btn btn-lg btn-default button7 text-bold"><i
                                class="fas fa-bell"></i> Send
                            Notification</button>
                        <button id="upload_evidence" type="button" class="btn btn-lg btn-default button5 text-bold"><i
                                class="fas fa-file-upload"></i> Upload
                            Evidence</button>
                        <button data-target=".bd-example-modal-lg" data-toggle="modal" id="deploy_agent_group" type="button"
                            class="btn btn-lg btn-default button6 text-bold"><i class="fas fa-users"></i> Deploy
                            Agent Group</button>
                    @endif


                </div>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-bold text-primary " id="exampleModalLongTitle">Available
                                    Groups</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <table border='1' id="myTable" class="table table-hover table-bordered text-center">
                                    <tr class="table-danger">
                                        <th>Id</th>
                                        <th>Departments</th>

                                        <th>Action</th>
                                    </tr>
                                    @foreach ($availableGroups as $group)
                                        @php
                                            $groupMembers = $groupObject->groupMembers($group->group_id);
                                        @endphp
                                        <tr class="table-light">
                                            <td class='pd-price'>{{ $group->group_id }}</td>
                                            <td class='pd-name'>
                                                @foreach ($groupMembers as $member)
                                                    {{ $member->department->title }}
                                                @endforeach
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btnSelect"><i
                                                        class="fas fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
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
                            aria-controls="custom-content-below-agentsDeployed" aria-selected="false">Agents
                            Deployed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-3" id="custom-content-below-notes-tab" data-toggle="pill"
                            href="#custom-content-below-notes" role="tab" aria-controls="custom-content-below-notes"
                            aria-selected="false">
                            Notes</a>
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
                                        class="card-title text-bold p-3 {{ $event->event_status_id == '1'? 'bg-success': ($event->event_status_id == '2'? 'bg-warning': 'bg-danger') }}">
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
                                            @php
                                                use App\Models\StaffEvent;
                                                $editor_name = '';
                                                $staffEvent = StaffEvent::where('event_id', $event->id)
                                                    ->orderBy('created_at', 'desc')
                                                    ->first();
                                                if (isset($staffEvent)) {
                                                    $editor = Staff::find($staffEvent->staff_id);
                                                    if (isset($editor)) {
                                                        $editor_name = $editor->name . ' ' . $editor->surname;
                                                    }
                                                }
                                                
                                            @endphp
                                            <li class="list-group-item border-0">
                                                <strong>Editor: </strong>{{ Str::title($editor_name) }}
                                            </li>
                                            <li class="list-group-item border-0"><strong>Note:</strong>
                                                {{ Str::title($event->note) }}
                                            </li>
                                        </ul>
                                        <a href="{{ route('edit_report', $event->id) }}"
                                            class="form-buttons float-right"><i class=" far fa-edit"></i>
                                            Edit Report</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 ">
                                <div class="card shadow  bg-white rounded">
                                    <div class="card-title bg-info p-3 text-bold"> Device
                                        Information</div>
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
                                                    <th scope="col">Content</th>
                                                    <th scope="col">Editor</th>
                                                    <th scope="col">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (isset($history['create']['creator_name']))
                                                    <tr>
                                                        <td>Event Created</td>
                                                        <td><a
                                                                href="{{ $history['create']['creator_type'] == 'staff'? route('agent', $history['create']['creator_id']): route('user', $history['create']['creator_id']) }}">{{ $history['create']['creator_name'] }}
                                                                ({{ $history['create']['creator_type'] }})</a></td>
                                                        <td>{{ $history['create']['created_at'] }}</td>
                                                    </tr>
                                                @endif
                                                @if (isset($history['group']['group_id']))
                                                    <tr>
                                                        <td>Group Created <a
                                                                href="{{ route('agentGroup', $history['group']['group_id']) }}">(Group
                                                                {{ $history['group']['group_id'] }})</a></td>
                                                        <td><a
                                                                href="{{ route('agent', $history['group']['assigner_staff_id']) }}">{{ $history['group']['assigner_staff_name'] }}</a>
                                                        </td>
                                                        <td>{{ $history['group']['created_at'] }}</td>
                                                    </tr>
                                                @endif
                                                @if (isset($history['mark'][0]))
                                                    @foreach ($history['mark'] as $mark)
                                                        <tr>
                                                            <td>Event Status Changed ({{ $mark['event_status_name'] }})
                                                            </td>
                                                            <td><a
                                                                    href="{{ route('agent', $mark['staff_id']) }}">{{ Str::title($mark['staff_name']) }}</a>
                                                            </td>
                                                            <td>{{ $mark['created_at'] }}</td>
                                                        </tr>
                                                    @endforeach

                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade py-5" id="custom-content-below-agentsDeployed" role="tabpanel"
                        aria-labelledby="custom-content-below-agentsDeployed-tab">
                        <button type="button" class="btn btn-md p-2 float-right btn-default button3 text-bold"><i
                                class="fas fa-user-times"></i> Remove Agent
                            Group
                        </button>
                        <div class="row">
                            <div class="col-md-7">
                                <h3 class="text-bold mb-3">Agent Group:
                                    @if (isset($groups[0]))
                                        <a href="{{ route('agentGroup', $groups[0]->group_id) }}"
                                            class="text-danger">{{ $groups[0]->group_id }} ( <i
                                                class="fas fa-eye"></i> More
                                            Details)</a>
                                    @else
                                        No Group
                                    @endif
                                </h3>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center align-items-center">
                            @if (isset($groups[0]))
                                @foreach ($groups as $row)
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
                                                                <a href="{{ route('agent', $agent) }}"
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
                    <div class="tab-pane fade py-5" id="custom-content-below-notes" role="tabpanel"
                        aria-labelledby="custom-content-below-notes-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card rounded ">
                                    <div class="card-title text-bold p-3 bg-warning "><span class="text-white">
                                            Event Notes</span>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead class="thead">
                                                <tr>
                                                    <th scope="col">Notes</th>
                                                    <th scope="col">Editor</th>
                                                    <th scope="col">Updated At</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (isset($event->document->path))
                                                    <tr>
                                                        <td>{{ Str::title($event->document->type) }}</td>
                                                        <td> <a type="button" data-toggle="modal"
                                                                data-target="#{{ $documentModalTrigger }}"
                                                                href="{{ asset($event->document->path) }}">
                                                                {{ $event->document->id }}</a>
                                                        </td>
                                                        <td>{{ $event->document->created_at }}</td>
                                                    </tr>
                                                    <div class="modal fade" id="{{ $documentModalTrigger }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header text-center">
                                                                    <h5 class="modal-title text-bold text-dark "
                                                                        id="exampleModalLongTitle">
                                                                        Document ID: {{ $event->document->id }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img class="img-fluid"
                                                                        src="{{ asset($event->document->path) }}">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>

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
                                                    <th scope="col">Document Type</th>
                                                    <th scope="col">Document</th>
                                                    <th scope="col">Uploaded At</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (isset($event->document->path))
                                                    <tr>
                                                        <td>{{ Str::title($event->document->type) }}</td>
                                                        <td> <a type="button" data-toggle="modal"
                                                                data-target="#{{ $documentModalTrigger }}"
                                                                href="{{ asset($event->document->path) }}">
                                                                {{ $event->document->id }}</a>
                                                        </td>
                                                        <td>{{ $event->document->created_at }}</td>
                                                    </tr>
                                                    <div class="modal fade" id="{{ $documentModalTrigger }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header text-center">
                                                                    <h5 class="modal-title text-bold text-dark "
                                                                        id="exampleModalLongTitle">
                                                                        Document ID: {{ $event->document->id }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img class="img-fluid"
                                                                        src="{{ asset($event->document->path) }}">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

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
                                    $.ajax({
                                        url: "{{ route('mark_event', $event->id) }}",
                                        type: "POST",
                                        data: {
                                            event_status_id: value,
                                            event_id: "{{ $event->id }}",
                                            staff_id: "{{ Auth::id() }}",
                                            _token: _token
                                        },
                                        success: function() {
                                            swal.fire({
                                                icon: 'success',
                                                title: "Updated!",
                                                text: "Your row has been updated.",
                                                type: "success",
                                                timer: 3000
                                            }).then(function() {
                                                location.reload(
                                                    true);
                                            });
                                        },
                                        error: function(xhr, ajaxOptions,
                                            thrownError) {
                                            swal.fire(
                                                "Error updating(2)!",
                                                "Please try again",
                                                "error");
                                        }
                                    });
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    swal.fire("Error updating!", "Please try again",
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
                title: 'Select image',
                input: 'file',
                inputAttributes: {
                    'accept': 'image/*',
                    'aria-label': 'Upload your profile picture'
                },
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        if (value === '') {
                            resolve('You need to select oranges :)')
                        } else {
                            var fd = new FormData();

                            // Check file selected or not
                            if (value) {
                                fd.append('file', value);
                                fd.append('_token', _token);
                                fd.append('type', "photo");

                                $.ajax({
                                    url: "{{ route('store_evidence', $event->id) }}",
                                    type: 'post',
                                    data: fd,
                                    contentType: false,
                                    processData: false,
                                    success: function(response) {
                                        if (response) {
                                            Swal.fire({
                                                icon: 'success',
                                                title: 'Done',
                                                text: 'You have uploaded an evidence!',
                                            }).then(
                                                function() {
                                                    location.reload();
                                                }
                                            )
                                        } else {
                                            Swal.fire({
                                                icon: 'error',
                                                title: 'Error',
                                                text: 'Could not upload the evidence!',
                                            })
                                        }
                                    },
                                });
                            } else {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'No File',
                                    text: 'Please select a file!',
                                })
                            }
                        }
                    })
                }
            })
        })

        $(document).ready(function() {

            $("#myTable").on('click', '.btnSelect', function() {
                var currentRow = $(this).closest("tr");

                var id = currentRow.find(".pd-price").html();
                console.log(id);
                $.ajax({
                    url: "{{ route('update_report', $event->id) }}",
                    type: "POST",
                    data: {
                        group_id: id,
                        _method: "PUT",
                        _token: _token
                    },
                    success: function() {
                        swal.fire({
                            icon: 'success',
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

            });
        });
    </script>
@endsection
