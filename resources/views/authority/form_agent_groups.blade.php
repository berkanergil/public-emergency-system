@extends('authority.dashboard')

@section('breadcrumb')

    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <li class="breadcrumb-item active">
                <a href="{{ route('form_agent_groups') }}">Form Agent Groups</a>
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
    <form action="{{ route('form_agent_groups') }}" method="post">
        @csrf
        <div class="container-fluid bg-white rounded p-4">

            <div>
                <h5 class="text-center my-2 text-bold text-primary"> Agent Grouping Form</h5>
            </div>
            <div class="container-fluid mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-danger text-bold">Select Agent</h6>
                        <div class="border p-5 ">
                            <select class="form-select form-select-lg mb-3 available_agents" required name="agents_id[]"
                                multiple=" true">
                                @foreach ($staffObject->availableAgents() as $agent)
                                    <option value={{ $agent->id }}>
                                        {{-- {{ $agent->name . ' ' . $agent->surname . '(' . $agent->department->title . ')' }} --}}
                                @endforeach
                            </select>

                            <button id="add_staff" class="btn btn-md btn-success mt-5"><i class="fas fa-plus-square"></i>
                                Add</button>
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
