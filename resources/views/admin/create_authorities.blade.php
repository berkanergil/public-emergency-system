@extends('authority.dashboard')

@section('breadcrumb')
    <a href="">Create Authorities</a>
@endsection

@section('statistic_content')
    <div class="container-fluid">
        <div class="row gutters">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <form action="{{ route('create_authorities') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="card-header">
                                <div class=" text-center">
                                    <h4 class="text-primary text-bold">Create Authority</h4>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-bold text-info">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="name"><i class="far fa-id-card"></i> Name </label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter full name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="surname"><i class="far fa-id-card"></i> Surname </label>
                                        <input type="text" class="form-control" id="surname" name="surname"
                                            placeholder="Enter full name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="email"><i class="far fa-envelope"></i> Email </label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter email ID">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="msisdn"><i class="fas fa-mobile-alt"></i> Phone </label>
                                        <input type="text" class="form-control" id="msisdn" name="msisdn"
                                            placeholder="Enter phone number">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="website"><i class="fas fa-user-tag"></i> Staff Role </label>
                                        <input type="number" class="form-control" id="staff_role_id" name="staff_role_id"
                                            value="1" placeholder="Web Authority">
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-info text-bold">Password Settings</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="password"><i class="fas fa-key"></i> Password</label>
                                        <input type="name" class="form-control" id="password" name="password"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="passwordRepeat"><i class="fas fa-key"></i> Confirm Password</label>
                                        <input type="name" class="form-control" id="passwordRepeat" placeholder="">
                                    </div>
                                </div>

                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-secondary"><i class="far fa-window-close"></i>
                                            Cancel</button>
                                        <button type="submit" class="btn btn-success"><i class="fas fa-user-plus"></i>
                                            Create</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card ">
                    <div class="card-body mt-4">
                        <div class="account-settings">
                            <h5 class="text-primary text-center text-bold">Generate Random Password</h5>
                            <div class="card-body">
                                <main class="d-flex flex-column align-items-center">
                                    <form class="form-group">
                                        <input type="text" class="form-control" id="generatedPassword"
                                            placeholder="Generate Password">
                                    </form>

                                    <form class="form-group">
                                        <button type="button" class="btn btn-primary">Generate</button>
                                        <button type="button" class="btn btn-outline-primary">Copy</button>
                                    </form>

                                    <form class="form-inline">
                                        <div class="form-group">
                                            <label for="pwLength">Length</label>
                                            <select class="custom-select" id="pwLength">
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option selected="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                            </select>
                                            <div class="row">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" id="caps">
                                                    A-Z
                                                </label>
                                            </div>
                                            <div class="row">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" id="special">
                                                    !-?
                                                </label>
                                            </div>
                                            <div class="row">

                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox" id="numbers"
                                                        checked="checked">
                                                    1-9
                                                </label>
                                            </div>
                                    </form>
                                </main>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
