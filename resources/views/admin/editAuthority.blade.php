@extends('admin.adminDasboard')

@section('statistic_content')
    <div class="row gutters">
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="card p-5">
                <div class="card-title text-center mt-3">
                    <h3 class="text-danger text-bold">Edit Personal Information</h3>
                </div>
                <div class="card-body">
                    <form id="" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input value="" type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="surname">Surname</label>
                                    <input value="" type="text" class="form-control" id="surname" name="surname">
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input name="phone" class="form-control" id="phone">
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" rows="5">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="password_confirm">Confirm Password</label>
                                    <input type="password" name="password_confirm" class="form-control"
                                        id="password_confirm">
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <button type="reset" id="submit" name="submit" class="btn btn-secondary"><i
                                            class="far fa-window-close mr-1"></i> Cancel</button>
                                    <button type="submit" id="submit" name="submit" class="btn btn-success"> <i
                                            class="far fa-edit mr-1"></i>Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if (session('success'))
                        <div class="container mb-4 d-flex justify-content-center align-items-center text-center"
                            style="color: #23BD55;font-size:25px">
                            {{ session('success') }}
                        </div>
                    @elseif (session('failure'))
                        <div class="container mb-4 d-flex justify-content-center align-items-center text-center"
                            style="color: #AE0E0F;font-size:25px">
                            {{ session('failure') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="card p-5">
                <div class="card-title text-center mt-3">
                    <h3 class="text-danger text-bold">Generate Password</h3>
                </div>
                <div class="card-body">


                </div>
            </div>
        </div>
    </div>
@endsection
