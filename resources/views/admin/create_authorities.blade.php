@extends('authority.dashboard')

@section('breadcrumb')
    <a href="">Create Authorities</a>
@endsection

@section('statistic_content')
    <div class="container-fluid">
        <div class="row gutters">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <form action="{{ route('create_agents') }}" method="post">
                        @csrf
                        <div class="card-body">
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
                                        <input type="url" class="form-control" disabled id="website" name="staff_role_id"
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
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <h5 class="text-danger"><i class="fas fa-exclamation-circle"></i> Restrictions: </h5>
                                    <ul class="list-group">
                                        <li class="list-group-item border-0">
                                            <p>Must be at least 8 characters</p>
                                            <p>Must contain special symbol</p>
                                            <p>Must contain uppercase letter</p>
                                            <p>Must contain numbers</p>
                                        </li>


                                    </ul>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="button" class="btn btn-secondary">Cancel</button>
                                        <button type="submit" class="btn btn-info">Create</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <h5 class="text-info">Generate Random Password</h5>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
