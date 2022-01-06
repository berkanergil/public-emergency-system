@extends('authority.dashboard')
@section('breadcrumb')
    <a>Agent Groups</a>
@endsection

@section('statistic_content')
    @php
    use App\Models\Staff;
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
                        <th>Date & Time</th>

                    </tr>
                </thead>
                <tbody class="table-light">
                    @foreach ($groups as $group)
                        @php
                            $staff = Staff::find($group->staff_id);
                            
                        @endphp
                        <tr>
                            <td><a target="_blank"
                                    href="{{ route('one_agentGroup', $group->group_id) }}">{{ $group->group_id }}</a>
                            </td>
                            <td>

                            </td>
                            <td class="text-success">Available</td>
                            <td>2021-15-15 14:33:22</td>
                        </tr>
                    @endforeach

            </table>
        </div>
        <!-- /.card-body -->
    </div>



@endsection
