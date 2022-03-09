@extends('layouts.dashboard')

@section('statistic_content')
    <div class="container-fluid ">
        <div class="row gutters d-flex justify-content-center align-items-center">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card p-5 shadow p-3 mb-5 bg-white rounded">
                    <div class="card-title mt-3">
                        <h3 class="text-bold create_staff_form">{{ __('Create SMS Message') }}</h3>
                        <hr class="create_staff_form">
                    </div>
                    <div class="card-body">
                        <form class="validatedForm" action="" method="post">
                            @csrf
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="title"><i class="far fa-lightbulb"></i> {{ __('SMS Title') }}</label>
                                        <input type="text" class="form-control" id="title"
                                            placeholder="{{ __('Enter Title') }}" name="title">
                                    </div>
                                </div>


                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="message"><i class="fas fa-envelope-open-text"></i>
                                            {{ __('SMS Text') }}</label>
                                        <textarea type="number" class="form-control" id="message" name="message"
                                            rows="5">{{ __('Here is your message!') }}</textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="submit" class="form-buttons btn btn-success"><i
                                                class="far fa-envelope"></i>
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
