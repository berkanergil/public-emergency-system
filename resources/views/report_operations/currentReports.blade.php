@extends('layouts.dashboard')
@section('breadcrumb')
    <a href="{{ route('currentReports') }}">Current Reports</a>
@endsection
@section('statistic_content')
    <div class="card  p-5 shadow p-3 mb-5 bg-white rounded">
        <div class="card-title">
            <h2 class="create_staff_form text-bold">Current Reports</h2>
            <hr class="create_staff_form">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-primary">
                        <th>ID</th>
                        <th>Emergency Type</th>
                        <th>User Name</th>
                        <th>Staff Name</th>
                        <th>Event Status</th>
                        <th>Location</th>
                        <th>Date & Time</th>

                    </tr>
                </thead>
                <tbody class="table-light">
                    {{-- @foreach ($eventObject->currentEvents() as $event)
                        <tr>
                            <td><a target="_blank" href="{{ route('report', $event->id) }}">{{ $event->id }}</a>
                            </td>
                            <td>{{ Str::title($event->eventType->title) }}</td>
                            <td> @if (isset($event->user)) {{ Str::title($event->user->name . ' ' . $event->user->surname) }}  @endif </td>
                            <td> @if (isset($event->staff)) {{ Str::title($event->staff->name . ' ' . $event->staff->surname) }}  @endif</td>
                            <td class={{ $event->event_status_id == 2 ? 'bg-warning' : 'bg-danger' }}>
                                @if ($event->event_status_id == 2)
                                    Being Handled

                                @elseif ($event->event_status_id == 3)
                                    Not Handled
                                @endif
                            </td>
                            <td><a target="_blank"
                                    href="https://www.google.com/maps/search/{{ $event->lat . ',' . $event->lon }}">{{ substr($event->lat, 0, 7) . ' - ' . substr($event->lon, 0, 7) }}</a>
                            </td>
                            <td>{{ $event->created_at }}</td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
