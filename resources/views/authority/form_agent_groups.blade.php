@extends('authority.dashboard')
@section('breadcrumb')
    <a>Form Agent Groups</a>
@endsection
@section('statistic_content')
    <div class="container-fluid bg-white rounded p-4">

        <div>
            <h5 class="text-center my-2 text-bold text-info"> Agent Grouping Form</h5>
        </div>
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-danger text-bold">Select Department</h6>
                    <div class="border p-5 ">
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option selected>None</option>
                            <option value="">Fire Department</option>
                            <option value="">Police Department</option>
                            <option value="">Health Department</option>
                        </select>
                        <button class="btn btn-md btn-info"><i class="fas fa-plus-square"></i> Add</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6 class="text-danger text-bold">Select Agent</h6>
                    <div class="border p-5 ">
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option selected>None</option>
                            <option disabled class="text-dark text-bold" value="1">Fire Department</option>
                            <option value="1">Berkan Ergil</option>
                            <option value="1">Tolgahan Dayanıklı </option>
                            <option value="1">Mehmet Taçyıldız</option>
                            <option value="" disabled>______________________________________________________________________
                            </option>
                            <option disabled class="text-dark text-bold" value="1">Police Department</option>
                            <option value="1">Berkan Ergil</option>
                            <option value="1">Tolgahan Dayanıklı </option>
                            <option value="1">Mehmet Taçyıldız</option>
                            <option value="" disabled>______________________________________________________________________
                            </option>
                            <option disabled class="text-dark text-bold" value="1">Health Department</option>
                            <option value="1">Berkan Ergil</option>
                            <option value="1">Tolgahan Dayanıklı </option>
                            <option value="1">Mehmet Taçyıldız</option>
                            </option>
                        </select>
                        <button class="btn btn-md    btn-info"><i class="fas fa-plus-square"></i> Add</button>
                    </div>

                </div>
            </div>
            <div class="row mt-4 text-center">
                <div class="container-fluid">
                    <h5 class="text-bold text-info">Agent Group Preview</h5>
                    <div class="container ">
                        <ul class=" list-group text-left ">
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
                        <button class="btn btn-lg btn-info"><i class="fas fa-users"></i> Create Group</button>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection
