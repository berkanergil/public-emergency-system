@extends('authority.dashboard')
@section('breadcrumb')
    <a>Past Archive</a>
@endsection
@section('statistic_content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold">Archieve of Past Events</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-info">
                        <th>Event ID</th>
                        <th>Emergency Type</th>
                        <th>User Name</th>
                        <th>Staff ID</th>
                        <th>Document ID</th>
                        <th>Event Status</th>
                        <th>Location</th>
                        <th>Editor</th>
                        <th>Date & Time</th>

                    </tr>
                </thead>
                <tbody class="table-light">

                    @foreach ($eventObject->pastEvents() as $event)
                    <tr>
                        <td><a target="_blank" href="{{ route('eventpage',$event->id) }}">{{ $event->id }}</a></td>
                        <td>{{ $event->eventType->title }}</td>
                        <td> @if(isset($event->user)) {{ $event->user->name." ".$event->user->surname }}  @endif </td>
                        <td> @if(isset($event->staff)) {{ $event->staff->name." ".$event->staff->surname }}  @endif</td>
                        <td class={{ $event->event_status_id==2?"bg-warning":"bg-danger"  }}>{{ $event->event_status_id }}</td>
                        <td><a href="https://www.google.com/maps/search/{{ $event->lat.",".$event->lon }}">{{ $event->lat." ".$event->lon }}</a></td>
                        <td>{{ $event->created_at }}</td>
                    </tr>
                    @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection
