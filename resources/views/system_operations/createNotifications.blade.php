@extends('layouts.dashboard')

@section('statistic_content')
    <div class="container-fluid ">
        <div class="row gutters d-flex justify-content-center align-items-center">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card p-5 shadow p-3 mb-5 bg-white rounded">
                    <div class="card-title mt-3">
                        <h3 class="text-bold create_staff_form">{{ __('Create Notification') }}</h3>
                        <hr class="create_staff_form">
                    </div>
                    <div class="card-body">
                        <form class="validatedForm" action="" method="post">
                            @csrf
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="name"><i class="far fa-lightbulb"></i>
                                            {{ __('Notification Title') }}</label>
                                        <input type="text" class="form-control" id="name" placeholder="Enter Title"
                                            name="name">
                                    </div>
                                </div>


                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="staff_role_id"><i class="far fa-bell"></i>
                                            {{ __('Notification Text') }}</label>
                                        <textarea type="number" class="form-control" id="staff_role_id"
                                            name="staff_role_id" rows="5"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="submit" class="form-buttons btn btn-success"><i
                                                class="far fa-bell"></i>
                                            {{ __('Create') }}</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
