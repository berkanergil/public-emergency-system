@extends('layouts.dashboard')

@php
use App\Models\Staff;
$role = Staff::find(Auth::id())->staff_role_id;
@endphp


@section('statistic_content')
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-8">
                <div class="card user-card shadow p-3 mb-5 bg-white rounded">
                    <div class="card-header cards text-center">
                        <h5 class=" text-white">{{ __('MESSAGE INFORMATION') }}</h5>
                    </div>
                    <div class="card-block p-4">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-bold mt-3"> <span class="text-muted"> {{ __('Message Title') }}:</span>
                                    {{ Str::title($message->title) }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="text-bold"> <span class="text-muted">
                                        {{ __('Message Description') }}:</span>
                                    {{ Str::title($message->message) }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p class="text-bold"> <span class="text-muted">
                                        {{ __('Creation Date & Time') }}:</span>
                                    {{ $message->created_at }}
                                </p>
                            </div>
                        </div>

                        <ul class="list-unstyled activity-leval text-center">
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                            <li class="active"></li>
                        </ul>
                        <a href="{{ route('editMessage', $message->id) }}" class="form-buttons float-right">
                            <i class="far fa-edit"></i> {{ __('Edit SMS') }}</a>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
