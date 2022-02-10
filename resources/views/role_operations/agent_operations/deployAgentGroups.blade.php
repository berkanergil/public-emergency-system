@extends('layouts.dashboard')

@section('breadcrumb')

    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <li class="breadcrumb-item active">
                <a href="{{ route('deployAgentGroups') }}">Form Agent Groups</a>
            </li>
            </li>
            {{-- <li class="breadcrumb-item active">
                @if ($role == '1')
                    Authority Panel
                @elseif($role == '3')
                    Admin Panel
                @endif
            </li> --}}
        </ol>
    </div>

@endsection
@section('statistic_content')
    <form action="{{ route('deployAgentGroups') }}" method="post">
        @csrf
        <div class="container-fluid bg-white rounded p-4">
            <div>
                <h3 class="my-2 text-bold create_staff_form"> Agent Grouping Form</h3>
                <hr class="create_staff_form">
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h6 class="create_staff_form text-bold">Select Agent</h6>
                    <div class="p-4" style="min-width:1000px">
                        <select class=" form-select form-select-lg mb-3 available_agents" required name="agents_id[]"
                            multiple=" true">
                            @foreach ($staffObject->availableAgents() as $agent)
                                <option value={{ $agent->id }}>
                                    {{ Str::title($agent->name . ' ' . $agent->surname) .' (' .Str::title($agent->department->title) .' Department)' }}
                            @endforeach
                        </select>

                        <div class="float-right">
                            <button id="add_staff" class="form-buttons p-2 mt-5"><i class="fas fa-plus-square"></i>
                                Deploy Group</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>

@endsection


@section('sweetjs')
    <script>
        $(document).ready(function() {
            $(".available_agents").select2({
                theme: 'classic',
            })

        });
    </script>
@endsection
