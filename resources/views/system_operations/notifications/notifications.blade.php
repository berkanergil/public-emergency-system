@extends('layouts.dashboard')

@php
use App\Models\Notification;
@endphp
@section('statistic_content')
    <div class="card  p-5 shadow p-3 mb-5 bg-white rounded">
        <div class="card-title">
            <h2 class="create_staff_form text-bold">All Notifications</h2>
            <hr class="create_staff_form">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="notifications" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-success">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    @foreach ($notificationObject->notifications() as $notification)
                        <tr>
                            <td><a href="{{ route('notification', $notification->id) }}">{{ $notification->id }}</a></td>
                            <td>{{ $notification->title }}</td>
                            <td>{{ $notification->notification }}</td>
                            <td>{{ $notification->created_at }}</td>
                        </tr>
                    @endforeach

            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
