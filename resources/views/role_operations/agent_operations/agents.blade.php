@extends('layouts.dashboard')
@section('breadcrumb')
    <a href="{{ route('agents') }}">All Agents</a>
@endsection
@php
use Illuminate\Support\Facades\App;

$locale = App::currentLocale();
@endphp
@section('statistic_content')
    <div class="card  p-5 shadow p-3 mb-5 bg-white rounded">
        <div class="card-title">
            <h2 class="create_staff_form text-bold">{{ __('All Agents') }}</h2>
            <hr class="create_staff_form">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="agents" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-primary">
                        <th class="create_staff_form">{{ __('ID') }}</th>
                        <th class="create_staff_form">{{ __('Agent Department') }}</th>
                        <th class="create_staff_form">{{ __('Name Surname') }}</th>
                        <th class="create_staff_form">{{ __('Email') }}</th>
                        <th class="create_staff_form">{{ __('Phone Number') }}</th>
                        <th class="create_staff_form">{{ __('Date & Time') }}</th>

                    </tr>
                </thead>
                <tbody class="table-light">

                    @foreach ($staffObject->agents() as $authority)
                        <tr>
                            <td><a target="_blank" href="{{ route('agent', $authority->id) }}">{{ $authority->id }}</a>
                            </td>
                            <td>
                                @if ($locale == 'en')
                                    {{ Str::title($authority->department?->title) }} Department
                                @else
                                    {{ Str::title($authority->department?->tr) }} Departmanı
                                @endif
                            </td>
                            <td>{{ Str::title($authority->name . ' ' . $authority->surname) }}</td>
                            <td>{{ $authority->email }}</td>
                            <td>{{ $authority->msisdn }}</td>
                            <td>{{ $authority->created_at }}</td>
                        </tr>
                    @endforeach
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
