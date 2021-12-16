@extends('authority.dashboard')

@section('statistic_content')
    <div class="card">
        <div class="card-title">
            <h5 class="text-center mt-2 text-bold"> Agent Grouping Form</h5>
        </div>
        <div class="card-body">
            <form>
                <div class="form-row d-flex justify-content-center align-items-center my-5">
                    <div class="form-group col-md-5 bg-danger">
                        <label for="inputState">Departments</label>
                        <select id="inputState" class="form-control text-center">
                            <option>Null</option>
                            <option>Fire Department</option>
                            <option>Health Department</option>
                            <option>Police Department</option>
                        </select>
                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items-center my-5">

                    <div class="form-group col-md-5 bg-info">
                        <label for="inputState">Available Agents</label>
                        <select id="inputState" class="form-control text-center" style="min-height: 15vh">
                            <option>Null</option>
                            <option>Berkan Ergil (Fire)</option>
                            <option>Mehmet Taçyıldız (Police)</option>
                            <option>Tolgahan Dayanıklı (Health)</option>
                            <option>Berkan Ergil (Fire)</option>
                            <option>Mehmet Taçyıldız (Police)</option>
                            <option>Tolgahan Dayanıklı (Health)</option>
                            <option>Berkan Ergil (Fire)</option>
                            <option>Mehmet Taçyıldız (Police)</option>
                            <option>Tolgahan Dayanıklı (Health)</option>
                            <option>Berkan Ergil (Fire)</option>
                            <option>Mehmet Taçyıldız (Police)</option>
                            <option>Tolgahan Dayanıklı (Health)</option>
                        </select>
                    </div>
                </div>

        </div>
        <div class="form-group">

        </div>
        </form>
    </div>
    </div>


@endsection
