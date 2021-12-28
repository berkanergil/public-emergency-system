@extends('authority.dashboard')
@section('breadcrumb')
<a>Edit Profile</a>
@endsection
@section('statistic_content')
<div class="container">
    <div class="row gutters">
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body text-center">
                    <div class="account-settings mt-5">
                        <div class="user-profile">
                            <h5 class="text-danger">Authority ID: {{ $staff->id }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <form action="{{ route("update_agent",["id"=>$staff->id]) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h5 class="mb-4 text-info">Personal Details</h5>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Tolgahan Dayanıklı" value={{ $staff->name }}>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="surname">Surname</label>
                                    <input type="text" class="form-control" id="surname" name="surname"
                                        placeholder="Tolgahan Dayanıklı" value={{ $staff->surname}}>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="eMail">Email</label>
                                    <input type="email" class="form-control" id="eMail" name="email"
                                        placeholder="TOLGAHAN.DAYANIKLI@authority.com" value={{ $staff->email }}>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="msisdn"
                                        placeholder="12345678" value={{ $staff->msisdn }}>
                                </div>
                            </div>
                        </div>

                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <button type="button" class="btn btn-secondary">Cancel</button>
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="_method" value="PUT">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection