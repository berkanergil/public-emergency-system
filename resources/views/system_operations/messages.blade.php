@extends('layouts.dashboard')

@php
use App\Models\Message;

@endphp
@section('statistic_content')
    <div class="card  p-5 shadow p-3 mb-5 bg-white rounded">
        <div class="card-title">
            <h2 class="create_staff_form text-bold">{{ __('All Messages') }}</h2>
            <hr class="create_staff_form">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-light">
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Date & Time') }}</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    @foreach ($messageObject->messages() as $message)
                        <tr>
                            <td><a target="_blank" href="{{ route('message', $message->id) }}">{{ $message->id }}</a>
                            </td>
                            <td>{{ $message->title }}</td>
                            <td>{{ $message->message }}</td>
                            <td>{{ $message->created_at }}</td>
                        </tr>
                    @endforeach

            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
