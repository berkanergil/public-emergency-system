@extends('authority.dashboard')

@section('breadcrumb')
    <a href="">Create Agents</a>
@endsection

@section('statistic_content')
    <div class="container-fluid ">
        <div class="row gutters">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <form class="validatedForm" action="{{ route('create_authorities') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="card-header text-center">
                                <h4 class="text-bold text-primary">Create Agent</h4>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-bold text-info">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="name"><i class="far fa-id-card"></i> Name</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter name"
                                            name="name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName"><i class="far fa-id-card"></i> Surname</label>
                                        <input type="text" class="form-control" id="fullName" placeholder="Enter surname"
                                            name="surname">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail"><i class="far fa-envelope"></i> Email</label>
                                        <input type="email" class="form-control" id="eMail" placeholder="Enter email ID"
                                            name="email">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone"><i class="fas fa-mobile-alt"></i> Phone</label>
                                        <input type="text" class="form-control" id="phone"
                                            placeholder="Enter phone number" name="msisdn">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="staff_role_id"><i class="fas fa-user-tag"></i> Staff Role</label>
                                        <input type="number" class="form-control" id="staff_role_id" name="staff_role_id"
                                            value="2">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="department_id"><i class="fas fa-user-tag"></i> Department
                                            Name</label>
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                                            name="department_id">
                                            <option value="" selected>-</option>
                                            @foreach ($departmentTypeObject->departments() as $departmentType)
                                                <option value={{ $departmentType->id }}
                                                    {{ $departmentType->title == $departmentType->id ? 'selected' : '' }}>
                                                    {{ $departmentType->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-info text-bold">Password Settings</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="Street"><i class="fas fa-key"></i> Password</label>
                                        <input type="password" class="form-control" id="password" placeholder=""
                                            name="password">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="confirm_password"><i class="fas fa-key"></i> Confirm
                                            Password</label>
                                        <input type="password" class="form-control" id="confirm_password" placeholder="">
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
                    <div class="card-body">
                        <div class="account-settings mt-4">
                            <h5 class="text-center text-bold text-primary">Generate Random Password</h5>
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

@section('sweetjs')
    <script>
        jQuery('.validatedForm').validate({
            rules: {
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                }
            }
        });
    </script>

@endsection
