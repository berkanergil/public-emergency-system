@extends('authority.dashboard')
@section('breadcrumb')
<a>Form Agent Groups</a>
@endsection
@section('statistic_content')
<form action="{{ route("form_agent_groups") }}" method="post">
    @csrf
    <div class="container-fluid bg-white rounded p-4">

        <div>
            <h5 class="text-center my-2 text-bold text-info"> Agent Grouping Form</h5>
        </div>
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-12">
                    <h6 class="text-danger text-bold">Select Agent</h6>
                    <div class="border p-5 ">
                        <select class="form-select form-select-lg mb-3 available_agents " required name="agents_id[]"
                            multiple="true">
                            @foreach ($staffObject->availableAgents() as $agent)
                            <option value={{ $agent->id }}>{{ $agent->name." ".$agent->surname}}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-md btn-info"><i class="fas fa-plus-square"></i> Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection


@section("sweetjs")
<script>
        if ($('.available_agents').length > 0) {
    $('.available_agents').select2();    
  };

</script>
@endsection