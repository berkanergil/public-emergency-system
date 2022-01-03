@extends('authority.dashboard')
@section('breadcrumb')
    <a>Edit Report</a>
@endsection
@section('statistic_content')
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card h-100 shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body text-center">
                        <div class="account-settings mt-5">
                            <div class="user-profile">
                                <h5 class="text-danger text-bold mt-4">Event ID: {{ $event->id }}</h5>
                                <h6 class="text-bold mt-4">Editor: Editor Eklenecek</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <form action={{ route('update_report', $event->id) }} method="post">
                    <div class="card h-100 shadow p-3 mb-5 bg-white rounded">
                        <div class="card-title text-center mt-3">
                            <h3 class="text-danger">Edit Emergency Report</h3>
                        </div>
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h5 class="mb-4 text-info"><u>Event Details</u></h5>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName"> Emergency Type</label>
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                                            name="event_type_id">
                                            <option value="" selected>-</option>
                                            @foreach ($eventTypeObject->eventTypes() as $eventType)
                                                <option value={{ $eventType->id }}
                                                    {{ $event->event_type_id == $eventType->id ? 'selected' : '' }}>
                                                    {{ $eventType->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Agent Group Deployed</label>
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                                            name="group_id">
                                            <option value="" selected>-</option>
                                            @foreach ($groupObject->groups() as $group)
                                                <option value={{ $group->group_id }}
                                                    {{ $event->groupEvent?->group_id == $group->group_id ? 'selected' : '' }}>
                                                    group
                                                    {{ $group->group_id }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="dateTime">Report Date & Time</label>
                                        <input type="date" class="form-control" id="dateTime" name="created_at"
                                            value={{ $event->created_at }}>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="description">Event Description</label>
                                        <input type="text" class="form-control" id="description" name="description"
                                            value={{ $event->description }}>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Event Status</label>
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                                            name="event_status_id">
                                            @foreach ($eventStatusObject->eventStatuses() as $eventStatus)
                                                <option value={{ $eventStatus->id }}
                                                    {{ $event->id == $event->event_status_id ? 'selected' : '' }}>
                                                    {{ $eventStatus->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="button" id="submit" class="btn btn-secondary"><i
                                                class="far fa-window-close mr-1"></i> Cancel</button>
                                        <button type="button" id="delete"  class="btn btn-danger"> <i
                                                class="fas fa-trash mr-1"></i>Delete</button>
                                        <button type="submit" id="save" class="btn btn-success">
                                            <i class="far fa-edit mr-1"></i>Save
                                            Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="_method" value="PUT">
                    @csrf
                </form>

            </div>
        </div>
    </div>

@endsection

@section('sweetjs')
    {{-- <script>
        var button = $("#save").on("click", function() {
            Swal.fire('Any fool can use a computer')
        });
    </script> --}}
@endsection
