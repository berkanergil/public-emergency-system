@extends('authority.dashboard')
@section('breadcrumb')
    <a>Agent Groups</a>
@endsection

@section('statistic_content')
    @php
    use App\Models\Staff;
    use App\Models\Group;
    use App\Models\Event;
    @endphp
    <div class="card">
        <div class="card-header">
            <h3 class="card-title create_staff_form text-bold">Agent Groups</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="myTable" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-success">
                        <th class="create_staff_form">Group ID</th>
                        <th class="create_staff_form">Agent Departments</th>
                        <th class="create_staff_form">Status</th>
                        <th class="create_staff_form">Disband Group</th>

                    </tr>
                </thead>
                <tbody class="table-light">
                    @foreach ($groups as $group)
                        @php
                            $groupObject = new Group();
                            $groupMembers = $groupObject->groupMembers($group->group_id);
                            $currentEvent = $groupObject->event($group->group_id);
                            $currentEvent = Event::find($currentEvent?->id);
                            $loop->last;
                            
                        @endphp
                        <tr>
                            <td><a target="_blank"
                                    href="{{ route('agentGroup', $group->group_id) }}">{{ $group->group_id }}</a>
                            </td>
                            <td>
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

                            @if (!isset($currentEvent))
                                <td id="{{ $group->group_id }}" class=" availablity bg-success">
                                    Available</td>
                            @elseif ($currentEvent->status->id == 1)
                                <td id="{{ $group->group_id }}" class="availablity bg-success">
                                    Available</td>
                            @else
                                <td id="{{ $group->group_id }}" class="availablity bg-danger">
                                    Not Available</td>
                            @endif

                            <td> <button type="button" class="btn btn-danger btnSelect"><i
                                        class="fas fa-user-times"></i></button>
                            </td>
                        </tr>
                    @endforeach

            </table>
        </div>
        <!-- /.card-body -->
    </div>
    {{-- url: "{{ route('disbandGroups', $group->id) }}", --}}


@endsection
{{-- @section('sweetjs')
    <script>
        $(document).ready(function() {

            $("#myTable").on('click', '.btnSelect', function() {
                var currentRow = $(this).closest("tr");

                var id = currentRow.find(".availablity").attr('id');
                let _token = $('meta[name="csrf-token"]').attr('content');

                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                cancelButtonText: '<i class="far fa-window-close"></i> Cancel',
                confirmButtonText: '<i class="far fa-trash-alt"></i> Disband'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    url: "{{ route('disbandGroups') }}",
                    type: "POST",
                    data: {
                        group_id: id,
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
                } else {
                    Swal.fire(
                        'Error!',
                        'Group is not disbanded.',
                        'error'
                    )
                }
            })

            });
        });
    </script>


@endsection --}}
