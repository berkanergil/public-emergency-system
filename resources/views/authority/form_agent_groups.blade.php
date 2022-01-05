@extends('authority.dashboard')
@section('breadcrumb')
    <a href="{{ route('form_agent_groups') }}">Form Agent Groups</a>
@endsection
@section('statistic_content')
    <div class="container-fluid bg-white rounded p-4">

        <div>
            <h5 class="text-center my-2 text-bold text-primary"> Agent Grouping Form</h5>
        </div>
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-danger text-bold">Select Agent</h6>
                    <div class="border p-5 ">
                        <select class="form-select form-select-lg mb-3 available_agents" multiple="multiple">
                            <option value="" disabled class="text-bold">Fire Department</option>
                            @foreach ($staffObject->availableAgents() as $agent)
                                <option value={{ $agent->id }}>
                                    {{ $agent->name . ' ' . $agent->surname }}
                            @endforeach


                        </select>

                        <button id="add_staff" class="btn btn-md btn-success mt-5"><i class="fas fa-plus-square"></i>
                            Add</button>
                    </div>

                </div>
            </div>
            {{-- <div class="row mt-4 text-center">
                <div class="container-fluid">
                    <h5 class="text-bold text-info">Agent Group Preview</h5>
                    <div class="container ">
                        <ul class=" list-group text-left agents">
                            <li class="  list-group-item list-group-item-info">
                                <h5>
                                    Fire Department
                                </h5>
                                <ul class="list-group">
                                    <li class="list-group-item border-0">
                                        <p>Tolgahan Dayanıklı</p>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-group-item list-group-item-info">
                                <h5>
                                    Police Department
                                </h5>
                                <ul class="list-group">
                                    <li class="list-group-item border-0 ">
                                        <p>Berkan Ergil</p>
                                    </li>
                                </ul>
                            </li>
                            <li class="list-group-item list-group-item-info">
                                <h5>
                                    Health Department
                                </h5>
                                <ul class="list-group">
                                    <li class="list-group-item border-0">
                                        <p>Mehmet Taçyıldız</p>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <form class="mt-3" action="">
                        <button type="button" id="deneme" class="btn btn-lg btn-info"><i class="fas fa-users"></i> Create Group</button>
                    </form>
                </div>
            </div> --}}
        </div>

    </div>

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
