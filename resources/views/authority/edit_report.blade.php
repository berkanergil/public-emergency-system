@extends('authority.dashboard')
@section('breadcrumb')
    <a>Edit Report</a>
@endsection
@section('statistic_content')
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="account-settings mt-5">
                            <div class="user-profile">
                                <h5 class="text-danger text-bold mt-4">Event ID: {{ $event->id }}</h5>
                                <h6 class="text-bold mt-4">Editor: Editor Eklenecek</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-title text-center mt-3">
                        <h3 class="text-danger">Edit Emergency Report</h3>
                    </div>
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h5 class="mb-4 text-info"><u>Event Details</u></h5>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName"> Emergency Type</label>
                                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                        <option selected value="natural_event">Natural Events</option>
                                        <option value="">Traffic</option>
                                        <option value="">Crime</option>
                                        <option value="">Fire</option>
                                        <option value="">Health</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">Agent Group Deployed</label>
                                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                        <option selected>Group 03</option>
                                        <option value="">Group 12</option>
                                        <option value="">Group 01</option>
                                        <option value="">Group 02</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Report Date & Time</label>
                                    <input type="text" class="form-control" id="phone" placeholder="04/12/2021 14:53:34">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Event Description</label>
                                    <input type="text" class="form-control" id="phone"
                                        placeholder="Someone Tried to break in my house!">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Event Status</label>
                                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                        <option selected>Handled</option>
                                        <option value="">Not Handled</option>
                                        <option value="">Being Handled</option>
                                        <option value="">Merged</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h5 class="mb-2 text-info"><u>Reporter Details</u></h5>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Reporter Name</label>
                                        <input type="text" class="form-control" id="phone"
                                            placeholder="TOLGAHAN DAYANIKLI">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Reporter Phone Number</label>
                                        <input type="text" class="form-control" id="phone" placeholder="12345678">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Reporter Age</label>
                                        <input type="text" class="form-control" id="phone" placeholder="22">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Reporter Email</label>
                                        <input type="email" class="form-control" id="eMail"
                                            placeholder="MEHMET.TACYILDIZ@gmail.com">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row gutters">


                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <button type="button" id="submit" name="submit" class="btn btn-secondary"><i
                                            class="far fa-window-close mr-1"></i> Cancel</button>
                                    <button type="button" id="submit" name="submit" class="btn btn-info"> <i
                                            class="far fa-save mr-1"></i>Save
                                        Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
