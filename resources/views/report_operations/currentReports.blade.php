@extends('layouts.dashboard')
@section('breadcrumb')
    <a href="{{ route('currentReports') }}">
        Current Reports</a>
@endsection

@section('statistic_content')
    @php
    use Illuminate\Support\Facades\App;
    $locale = App::currentLocale();
    Log::info($locale);

    @endphp
    <div class="card p-5 shadow p-3 mb-5 bg-white rounded">
        <div class="card-title">
            <h2 class="create_staff_form text-bold">{{ __('Current Reports') }}</h2>
            <hr class="create_staff_form">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="currentReports" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-primary">
                        <th>ID</th>
                        <th>{{ __('Emergency Type') }}</th>
                        <th>{{ __('User Name') }}</th>
                        <th>{{ __('Staff Name') }}</th>
                        <th>{{ __('Event Status') }}</th>
                        <th>{{ __('Location') }}</th>
                        <th>{{ __('Date & Time') }}</th>

                    </tr>
                </thead>
                <tbody class="table-light">
                    {{-- @foreach ($eventObject->currentEvents() as $event)
                        <tr>
                            <td><a target="_blank" href="{{ route('report', $event->id) }}">{{ $event->id }}</a>
                            </td>

                            @if ($locale == 'en')
                                <td>{{ Str::title($event->eventType->title) }}</td>
                            @else
                                <td>{{ Str::title($event->eventType->tr) }}</td>
                            @endif

                            <td>
                                @if (isset($event->user))
                                    {{ Str::title($event->user->name . ' ' . $event->user->surname) }}
                                @endif
                            </td>
                            <td>
                                @if (isset($event->staff))
                                    {{ Str::title($event->staff->name . ' ' . $event->staff->surname) }}
                                @endif
                            </td>
                            @if ($locale == 'en')
                                <td class={{ $event->event_status_id == 2 ? 'bg-warning' : 'bg-danger' }}>
                                    @if ($event->event_status_id == 2)
                                        Being Handled
                                    @elseif ($event->event_status_id == 3)
                                        Not Handled
                                    @endif
                                </td>
                            @else
                                <td class={{ $event->event_status_id == 2 ? 'bg-warning' : 'bg-danger' }}>
                                    @if ($event->event_status_id == 2)
                                        Müdahale Ediliyor
                                    @elseif ($event->event_status_id == 3)
                                        Müdahale Edilmedi
                                    @endif
                                </td>
                            @endif

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
