@extends('layouts.dashboard')
@section('breadcrumb')
    <a>Edit Report</a>
@endsection
@section('statistic_content')
    <div class="row gutters d-flex justify-content-center align-items-center">
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card p-5 shadow p-3 mb-5 bg-white rounded">
                <div class="card-title mt-3">
                    <h3 class="create_staff_form text-bold">Edit Emergency Report: {{ $event->id }}</h3>
                    <hr class="create_staff_form">
                </div>
                <div class="card-body">
                    <form action={{ route('update_report', $event->id) }} method="post">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName"> Reporter Name</label>
                                    <input style="font-size:16px; disabled type=" text" class="form-control"
                                        id="description" name="description"
                                        value=@if (isset($event->user)) {{ Str::title($event->user->name . ' ' . $event->user->surname) }}
                                                    @else{{ Str::title($event->staff->name . ' ' . $event->staff->surname . ' ' . ' (Staff Category)') }} @endif>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="dateTime">Report Date & Time</label>
                                    <input style="font-size:16px;" type="date" class="form-control" id="dateTime"
                                        name="created_at" value={{ $event->created_at }}>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName"> Emergency Type</label>
                                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                                        name="event_type_id">
                                        <option value="" selected>-</option>
                                        @foreach ($eventTypeObject->eventTypes() as $eventType)
                                            <option value={{ $eventType->id }}
                                                {{ $event->event_type_id == $eventType->id ? 'selected' : '' }}>
                                                {{ Str::title($eventType->title) }}
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
                                                Agent Group
                                                {{ $group->group_id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="description">Event Description</label>
                                    <textarea style="font-size:16px;" type="text" class="form-control" id="description"
                                        name="description" rows="5">{{ $event->description }}</textarea>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">
                            <button type="button" id="delete" class="form-buttons3"> <i
                                    class="fas fa-trash mr-1"></i>Delete</button>
                            <button type="submit" id="save" class="p-2 form-buttons">
                                <i class="far fa-edit mr-1"></i>Save
                                Changes</button>
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

    </div>
@endsection

@section('sweetjs')
    <script>
        let _token = $('meta[name="csrf-token"]').attr('content');
        var url = "http://127.0.0.1:8000/current_archives"
        var id = {{ $event->id }};
        var button = $("#delete").on("click", function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('delete_report', $event->id) }}",
                        type: "POST",
                        data: {
                            id: id,
                            _method: "DELETE",
                            _token: _token
                        },
                        success: function() {
                            swal.fire("Done!", "It was succesfully deleted!", "success");

                            $(location).attr('href', url);
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal.fire("Error deleting!", "Please try again", "error");
                        }
                    });
                }
            })
        });
    </script>
@endsection
