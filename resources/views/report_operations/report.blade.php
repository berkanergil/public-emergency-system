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
    use App\Models\Notes;
    use Illuminate\Support\Facades\App;

    $locale = App::currentLocale();

    $noteObject = new Notes();
    $groupObject = new Group();
    $eventObject = new Event();
    $eventStatus = EventStatus::where('id', '!=', '4')
        ->get()
        ->pluck('title', 'id');

    $currentStatus = $event?->eventStatus?->title;
    $currentStatusId = $event?->eventStatus?->id;
    $groups = $event?->groupEvent?->group($event?->groupEvent?->group_id);
    $documentModalTrigger = 'document' . $event?->document?->id;
    $bgWarning = 'bg-warning';
    $bgDanger = 'bg-danger';
    $bgInfo = 'bg-info';
    $availableGroups = $groupObject->availableGroups();
    $notMergedEvents = $eventObject->notMergedEvents();
    $history = $eventObject->history($event->id);
    @endphp
    <section class="content container-fluid">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit"></i>
                    {{ __('Reported Event ID') }}:{{ $event->id }}
                </h3>
            </div>
            <div class="card-body">
                <h4 class="mb-3 text-bold">{{ $event->description }}</h4>
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="btn-group button-groups my-3 ">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button id="mark_event" type="button"
                                        class="btn btn-lg btn-default button1 text-bold"><i class="fas fa-highlighter"></i>
                                        {{ __('Mark Report') }}</button>
                                    <button id="make_notes" type="button"
                                        class="btn btn-lg btn-default button2 text-bold"><i class="fas fa-sticky-note"></i>
                                        {{ __('Make Notes') }}</button>

                                    @if ($event->status->id == '1' || $event->status->id == '4')
                                        <button disabled id="send_sms" type="button"
                                            class="btn btn-lg btn-default button4 text-bold"><i class="fas fa-envelope"></i>
                                            {{ __('Send SMS') }}</button>
                                        <button disabled id="send_notification" type="button"
                                            class="btn btn-lg btn-default button7 text-bold"><i class="fas fa-bell"></i>
                                            {{ __('Send Notification') }}</button>
                                        <button disabled id="upload_evidence" type="button"
                                            class="btn btn-lg btn-default button5 text-bold"><i
                                                class="fas fa-file-upload"></i>
                                            {{ __('Upload Evidence') }}</button>
                                        <button disabled data-target=".bd-example-modal-lg" data-toggle="modal"
                                            id="deploy_agent_group" type="button"
                                            class="btn btn-lg btn-default button6 text-bold"><i class="fas fa-users"></i>
                                            {{ __('Deploy Agent Group') }}</button>
                                        <button disabled data-target="#mergeEventsModel" data-toggle="modal"
                                            id="merge_event" type="button"
                                            class="btn btn-lg btn-default button8 text-bold"><i class="fa-solid fa-ban"></i>
                                            {{ __('Merge Report') }}</button>
                                    @else
                                        <button id="send_sms" type="button" class="btn btn-lg button4 text-bold"><i
                                                class="fas fa-envelope"></i> {{ __('Send SMS') }}</button>
                                        <button id="send_notification" type="button"
                                            class="btn btn-lg btn-default button7 text-bold"><i class="fas fa-bell"></i>
                                            {{ __('Send Notification') }}</button>
                                        <button id="upload_evidence" type="button"
                                            class="btn btn-lg btn-default button5 text-bold"><i
                                                class="fas fa-file-upload"></i>
                                            {{ __('Upload Evidence') }}</button>
                                        <button data-target=".bd-example-modal-lg" data-toggle="modal"
                                            id="deploy_agent_group" type="button"
                                            class="btn btn-lg btn-default button6 text-bold"><i class="fas fa-users"></i>
                                            {{ __('Deploy Agent Group') }}</button>
                                        <button data-target="#mergeEventsModel" data-toggle="modal" id="merge_event"
                                            type="button" class="btn btn-lg btn-default button8 text-bold"><i
                                                class="fa-solid fa-ban"></i>
                                            {{ __('Merge Report') }}</button>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg agentGroupModal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title create_staff_form text-bold " id="exampleModalLongTitle">
                                    {{ __('Available Groups') }}
                                    <hr class="create_staff_form ">

                            </div>

                            <div class="modal-body">
                                <table border='1' id="myTable"
                                    class="table table-hover table-bordered text-center table-striped">
                                    <tr class="table-success ">
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Departments') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                    @foreach ($availableGroups as $group)
                                        @php
                                            $groupMembers = $groupObject->groupMembers($group->group_id);
                                        @endphp
                                        <tr class="table-light">
                                            <td class='pd-price'>{{ $group->group_id }}</td>
                                            <td class='pd-name'>
                                                @foreach ($groupMembers as $member)
                                                    @if ($loop->last)
                                                        {{ Str::title($member->name . ' ' . '(' . $member->department->title) }}
                                                        Department)
                                                    @else
                                                        {{ Str::title($member->name . ' ' . $member->surname . ' ' . '(' . $member->department->title) }}
                                                        Department),
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <button class="btn btn-success btnSelect"><i
                                                        class="fas fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg mergeEventsModel " id="mergeEventsModel" tabindex="-1"
                    role="dialog" aria-labelledby="mergeEventsModel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg mergeEventsModel">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title create_staff_form text-bold " id="exampleModalLongTitle">
                                    {{ __('Reports List') }}
                                </h3>
                                <hr class="create_staff_form ">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table border='1' id="myTable2"
                                    class="table table-hover table-bordered text-center table-striped">
                                    <tr class="table-info ">
                                        <th>{{ __('ID') }}</th>
                                        <th>{{ __('Emergency Type') }}</th>
                                        <th>{{ __('Description') }}</th>
                                        <th>{{ __('Location') }}</th>
                                        <th>{{ __('Merge') }}</th>
                                    </tr>
                                    @foreach ($notMergedEvents as $nevent)
                                        <tr class="table-light">
                                            <td class='eventrow'>{{ $nevent->id }}</td>
                                            <td>{{ Str::title($nevent->eventType->title) }}</td>
                                            <td>{{ $nevent->description }}</td>
                                            <td class='text-primary'>
                                                {{ substr($event->lat, 0, 7) . ' - ' . substr($event->lon, 0, 7) }}</td>
                                            <td>
                                                <button class="btn btn-info btnSelect2"><i
                                                        class="fa-solid fa-square-check"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <hr class="w-75">
            <ul class="nav nav-tabs text-bold" id="custom-content-below-tab" role="tablist">
                <li class="nav-item ">
                    <a class="nav-link active p-3" id="custom-content-below-home-tab" data-toggle="pill"
                        href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home"
                        aria-selected="true">{{ __('Home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-3" id="custom-content-below-operations-tab" data-toggle="pill"
                        href="#custom-content-below-operations" role="tab" aria-controls="custom-content-below-operations"
                        aria-selected="false">{{ __('Operations') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-3" id="custom-content-below-agentsDeployed-tab" data-toggle="pill"
                        href="#custom-content-below-agentsDeployed" role="tab"
                        aria-controls="custom-content-below-agentsDeployed"
                        aria-selected="false">{{ __('Agents Deployed') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-3" id="custom-content-below-notes-tab" data-toggle="pill"
                        href="#custom-content-below-notes" role="tab" aria-controls="custom-content-below-notes"
                        aria-selected="false">
                        {{ __('Notes') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-3" id="custom-content-below-evidence-tab" data-toggle="pill"
                        href="#custom-content-below-evidence" role="tab" aria-controls="custom-content-below-evidence"
                        aria-selected="false">{{ __('Evidences') }}</a>
                </li>
            </ul>
            <div class="tab-content px-3" id="custom-content-below-tabContent">
                <div class="tab-pane fade show active py-5" id="custom-content-below-home" role="tabpanel"
                    aria-labelledby="custom-content-below-home-tab">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 mx-auto">
                            <div class="card  shadow  bg-white rounded">
                                <div
                                    class="card-title text-bold p-3 {{ $event->event_status_id == '1'? 'bg-success': ($event->event_status_id == '2'? 'bg-warning': ($event->event_status_id == '4'? 'bg-info': 'bg-danger')) }}">
                                    {{ __('Emergency Information') }}
                                    (
                                    @if ($locale == 'en')
                                        {{ Str::title($event->eventStatus->title) }}
                                    @else
                                        {{ Str::title($event->eventStatus->tr) }}
                                    @endif
                                    )
                                </div>
                                <div class="card-body">
                                    <ul>
                                        <li class="list-group-item border-0"><strong>{{ __('Emergency Type') }}:</strong>
                                            @if ($locale == 'en')
                                                {{ Str::title($event->eventType->title) }}
                                            @else
                                                {{ Str::title($event->eventType->tr) }}
                                            @endif
                                        </li>
                                        <li class="list-group-item border-0"><strong>{{ __('Description') }}:</strong>
                                            {{ Str::title($event->description) }}
                                        </li>
                                        <li class="list-group-item border-0"><strong>{{ __('Name Surname') }}:</strong>
                                            @if (isset($event->user))
                                                {{ Str::title($event->user->name . ' ' . $event->user->surname) }}
                                                @else{{ Str::title($event->staff->name . ' ' . $event->staff->surname . ' ' . ' (Staff Category)') }}
                                            @endif
                                        </li>

                                        <li class="list-group-item border-0"><strong>{{ __('Phone Number') }}:</strong>
                                            @if (isset($event->user))
                                                {{ $event->user->msisdn }}
                                                @else{{ $event->staff->msisdn }}
                                            @endif
                                        </li>
                                        <li class="list-group-item border-0"><strong>{{ __('Age') }}:</strong>
                                            @if (isset($event->user))
                                                {{ $event->user->age }}
                                                @else{{ ' No Age !' }}
                                            @endif

                                        </li>
                                        <li class="list-group-item border-0"><strong>{{ __('Email') }}:</strong>
                                            @if (isset($event->user))
                                                {{ $event->user->email }}
                                                @else{{ $event->staff->email }}
                                            @endif
                                        </li>
                                        <li class="list-group-item border-0">
                                            <strong>{{ __('Report Date & Time') }}:</strong>
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
                                            <strong>{{ __('Editor') }}: </strong>{{ Str::title($editor_name) }}
                                        </li>
                                    </ul>
                                    <a href="{{ route('edit_report', $event->id) }}" class="form-buttons float-right"><i
                                            class=" far fa-edit"></i>
                                        {{ __('Edit Report') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12 mx-auto">
                            <div class="card shadow  bg-white rounded">
                                <div class="card-title bg-info p-3 text-bold"> {{ __('Device Information') }}</div>
                                <div class="card-body">
                                    <ul>
                                        <li class="list-group-item border-0"><strong>{{ __('Device ID') }}:</strong>
                                            @if (isset($event->user))
                                                {{ $event->user->device_id }}
                                                @else{{ $event->staff->device_id }}
                                            @endif
                                        </li>
                                        <li class="list-group-item border-0"><strong>{{ __('Phone Model') }}:</strong>
                                            @if (isset($event->user))
                                                {{ $event->user->device_model }}
                                                @else{{ $event->staff->device_model }}
                                            @endif
                                        </li>
                                        <li class="list-group-item border-0"><strong>{{ __('Event Location') }}:</strong>
                                            <a target="_blank" class="bg-danger p-2 rounded"
                                                href="https://www.google.com/maps/search/{{ $event->lat . ',' . $event->lon }}">
                                                {{ substr($event->lat, 0, 7) . ' - ' . substr($event->lon, 0, 7) }}</a>
                                        </li>
                                        <li class="list-group-item border-0"><strong>{{ __('Device Token') }}:</strong>
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
                                <div class="card-title text-bold p-3 bg-info">{{ __('Operations Performed') }}
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead class="thead">
                                            <tr>
                                                <th scope="col">{{ __('Content') }}</th>
                                                <th scope="col">{{ __('Editor') }}</th>
                                                <th scope="col">{{ __('Date & Time') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($history['create']['creator_name']))
                                                <tr>
                                                    <td>{{ __('Report Created') }}</td>
                                                    <td><a
                                                            href="{{ $history['create']['creator_type'] == 'staff'? route('agent', $history['create']['creator_id']): route('user', $history['create']['creator_id']) }}">{{ $history['create']['creator_name'] }}
                                                            ({{ $history['create']['creator_type'] }})</a></td>
                                                    <td>{{ $history['create']['created_at'] }}</td>
                                                </tr>
                                            @endif
                                            @if (isset($history['group']['group_id']))
                                                <tr>
                                                    <td>{{ __('Group Deployed ') }}<a
                                                            href="{{ route('agentGroup', $history['group']['group_id']) }}">({{ __('Group') }}
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
                                                        <td>{{ __('Report Status Changed') }}
                                                            ({{ $mark['event_status_name'] }})
                                                        </td>
                                                        <td><a
                                                                href="{{ route('agent', $mark['staff_id']) }}">{{ Str::title($mark['staff_name']) }}</a>
                                                        </td>
                                                        <td>{{ $mark['created_at'] }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            {{-- @if (isset($history['note']))
                                                @foreach ($history['note'] as $note)
                                                    <tr>
                                                        <td>{{ __('Note Added') }}</td>
                                                        <td>
                                                            {{ Str::title($note['creator_name']) }}
                                                        </td>
                                                        <td>{{ $note["created_at"] }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif --}}
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
                        <div class="col-md-7 col-sm-12">
                            <h3 class="text-bold mb-3">{{ __('Agent Group') }}:
                                @if (isset($groups[0]))
                                    <a href="{{ route('agentGroup', $groups[0]->group_id) }}"
                                        class="text-danger">{{ $groups[0]->group_id }} ( <i
                                            class="fas fa-eye"></i>
                                        {{ __('More Details') }})</a>
                                @else
                                    {{ __('No Group') }}
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
                                                    @if ($locale == 'en')
                                                        {{ Str::title($agent->department->title) . ' Department' }}
                                                    @else
                                                        {{ Str::title($agent->department->tr) . ' Departmanı' }}
                                                    @endif

                                                </h3>

                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b>{{ __('Name Surname') }}:</b> <a class="float-right">
                                                            {{ Str::title($agent->name . ' ' . $agent->surname) }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>{{ __('Phone Number') }}:</b>
                                                        <aclass="float-right">{{ $agent->msisdn }}
                                                            </aclass=>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Email:</b> <a class="float-right">{{ $agent->email }}</a>
                                                    </li>
                                                </ul>

                                                <button type="button" data-toggle="modal"
                                                    data-target="#{{ $modal_trigger }}" href="#"
                                                    class="btn btn-info btn-block"><b>{{ __('Agent Information') }}</b></button>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="modal fade" id="{{ $modal_trigger }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content border border-dark">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-center text-bold text-dark"
                                                                id="exampleModalLongTitle">
                                                                <i
                                                                    class="fas fa-id-badge mr-2"></i>{{ __('Agent Details') }}
                                                            </h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body box-profile">
                                                            <h3 class="profile-username text-center text-primary">
                                                                @if ($locale == 'en')
                                                                    {{ Str::title($agent->department->title) . ' Department' }}
                                                                @else
                                                                    {{ Str::title($agent->department->tr) . ' Departmanı' }}
                                                                @endif
                                                            </h3>

                                                            <ul class="list-group list-group-unbordered mb-3">
                                                                <li class="list-group-item border-0">
                                                                    <b>{{ __('Agent Group ID') }}:</b> <a
                                                                        class="float-right"></a>
                                                                </li>
                                                                <li class="list-group-item border-0">
                                                                    <b>{{ __('Agent ID') }}:</b> <a
                                                                        class="float-right">{{ $agent->id }}</a>
                                                                </li>
                                                                <li class="list-group-item border-0">
                                                                    <b>{{ __('Name Surname') }}:</b> <a
                                                                        class="float-right">{{ Str::title($agent->name . ' ' . $agent->surname) }}
                                                                    </a>
                                                                </li>
                                                                <li class="list-group-item border-0">
                                                                    <b>{{ __('Phone Number') }}:</b> <a
                                                                        class="float-right">{{ $agent->msisdn }}</a>
                                                                </li>
                                                                <li class="list-group-item border-0">
                                                                    <b>{{ __('Email') }}:</b> <a
                                                                        class="float-right">{{ $agent->msisdn }}</a>
                                                                </li>
                                                                <li class="list-group-item border-0">
                                                                    <b>{{ __('Device ID') }}:</b> <a
                                                                        class="float-right">{{ $agent->device_id }}</a>
                                                                </li>
                                                                <li class="list-group-item border-0">
                                                                    <b>{{ __('Device Token') }}:</b> <a
                                                                        class="float-right">{{ $agent->device_token }}</a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="{{ route('agent', $agent) }}"
                                                                class="btn btn-dark btn-block"><i
                                                                    class="fas fa-user mr-2"></i>{{ __('Visit Profile') }}</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endif
                            @endforeach
                            <div class="container-fluid">
                                <button type="button" class="btn btn-md p-2 float-right btn-default button3 text-bold"><i
                                        class="fas fa-user-times"></i> {{ __('Remove Agent Group') }}
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade py-5" id="custom-content-below-notes" role="tabpanel"
                    aria-labelledby="custom-content-below-notes-tab">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card rounded ">
                                <div class="card-title text-bold p-3 bg-warning "><span class="text-white">
                                        {{ __('Event Notes') }}</span>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead class="thead">
                                            <tr>
                                                <th scope="col-4">{{ __('Notes') }}</th>
                                                <th scope="col-4">{{ __('Editor') }}</th>
                                                <th scope="col-4">{{ __('Updated At') }} </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($event->eventNotes as $note)
                                                <tr>
                                                    <td>{{ $note->note }}</td>
                                                    <td>{{ Str::title($note->editor->name . ' ' . $note->editor->surname) }}
                                                    </td>
                                                    <td>{{ $note->updated_at }}</td>
                                                </tr>
                                            @endforeach

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
                                <div class="card-title text-bold p-3 bg-danger">{{ __('Event Evidences') }}
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <thead class="thead">
                                            <tr>
                                                <th scope="col">{{ __('Document Type') }}</th>
                                                <th scope="col">{{ __('Document') }}</th>
                                                <th scope="col">{{ __('Uploaded At') }}</th>

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
                                                    tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header text-center">
                                                                <h5 class="modal-title text-bold text-dark "
                                                                    id="exampleModalLongTitle">
                                                                    {{ __('Document ID') }}:
                                                                    {{ $event->document->id }}</h5>
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
                title: '<i class="fas fa-highlighter"></i> Mark Events As',
                input: 'select',
                inputOptions: eventStatus,
                inputPlaceholder: currentStatus,
                inputValue: currentStatusId,
                confirmButtonColor: "#1FAB45",
                confirmButtonText: 'Mark',
                showCancelButton: true,
                inputValidator: (value) => {
                    return new Promise((resolve) => {
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
                                            title: "{{ __('Updated') }}",
                                            text: "{{ __('Your event has been updated.') }}",
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
                                            "{{ __('Error Updating!') }}",
                                            "{{ __('Please try again') }}",
                                            "error");
                                    }
                                });
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                swal.fire("{{ __('Error Updating') }}",
                                    "{{ __('Please Try Again') }}",
                                    "error");
                            }
                        });


                    })
                }
            })
        })
        $("#upload_evidence").on("click", function() {
            Swal.fire({
                title: '<i class="fa-solid fa-file-arrow-up"></i> Select File',
                input: 'file',
                confirmButtonColor: "#1FAB45",
                confirmButtonText: 'Upload File',
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
        $('#make_notes').on('click', function() {
            Swal.fire({
                title: "Add Note",
                input: "textarea",
                showCancelButton: true,
                confirmButtonColor: "#1FAB45",
                confirmButtonText: "Add Note",
                cancelButtonText: "Cancel",
                buttonsStyling: true
            }).then(function() {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('store_notes') }}",
                        data: {
                            event_id: "{{ $event->id }}",
                            note: $('textarea').val(),
                            editor_id: "{{ Auth::user()->id }}",
                            _token: _token
                        },
                        success: function(response) {
                            Swal.fire(
                                "Sccess!",
                                "Your note has been saved!",
                                "success"
                            )
                        },
                        failure: function(response) {
                            Swal.fire(
                                "Internal Error",
                                "Oops, your note was not saved.",
                                "error"
                            )
                        }
                    });
                },
                function(dismiss) {
                    if (dismiss === "cancel") {
                        swal(
                            "Cancelled",
                            "Canceled Note",
                            "error"
                        )
                    }
                })

        });
    </script>
    <script>
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
        $(document).ready(function() {
            $("#myTable2").on('click', '.btnSelect', function() {
                var currentRow = $(this).closest("tr");
                console.log("geldim");
                var id2 = currentRow.find(".pd-price").html();
                $.ajax({
                    url: "{{ route('mark_event', $event->id) }}",
                    type: "POST",
                    event_status_id: 4,
                    event_id: "{{ $event->id }}",
                    staff_id: "{{ Auth::id() }}",
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
                        swal.fire("Error merging!", "Please try again",
                            "error");
                    }
                });

            });
        })
    </script>
@endsection
