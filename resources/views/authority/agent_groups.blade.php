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
            <h3 class="card-title text-bold">Agent Groups</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-warning">
                        <th>Group ID</th>
                        <th>Agent Departments</th>
                        <th>Status</th>
                        <th>Disband Group</th>

                    </tr>
                </thead>
                <tbody class="table-light">
                    @foreach ($groups as $group)
                        @php
                            $groupObject = new Group();
                            $groupMembers = $groupObject->groupMembers($group->group_id);
                            $currentEvent = $groupObject->event($group->group_id);
                             $currentEvent= Event::find($currentEvent?->id);
                        @endphp
                        <tr>
                            <td><a target="_blank"
                                    href="{{ route('one_agentGroup', $group->group_id) }}">{{ $group->group_id }}</a>
                            </td>
                            <td>
                                @foreach ($groupMembers as $member)
                                    {{ Str::title($member->department->title) }} Department,
                                @endforeach

                            </td>

                            <td class="text-success">{{ isset($currentEvent)?$currentEvent->status->title:"not assigned" }}</td>

                        </tr>
                    @endforeach

            </table>
        </div>
        <!-- /.card-body -->
    </div>



@endsection
