@extends('authority.dashboard')
@section('breadcrumb')
    <a>Current Archive</a>
@endsection
@section('statistic_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold">Current Events</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-primary">
                        <th>Event ID</th>
                        <th>Emergency Type</th>
                        <th>User Name</th>
                        <th>Staff ID</th>
                        <th>Event Status</th>
                        <th>Location</th>
                        <th>Date & Time</th>

                    </tr>
                </thead>
                <tbody class="table-light">
                    @foreach ($eventObject->currentEvents() as $event)
                    <tr>
                        <td><a target="_blank" href="{{ route('eventpage',$event->id) }}">{{ $event->id }}</a></td>
                        <td>{{ $event->event_type_id }}</td>
                        <td>{{ $event->user_id }}</td>
                        <td>{{ $event->staff_id }}</td>
                        <td class={{ $event->event_status_id==2?"bg-warning":"bg-danger"  }}>{{ $event->event_status_id }}</td>
                        <td><a href="">{{ $event->lat." ".$event->lon }}</a></td>
                        <td>{{ $event->created_at }}</td>
                    </tr>
                    @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
