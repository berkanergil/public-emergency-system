@extends('authority.dashboard')
@section('breadcrumb')
    <a>Agent Group</a>
@endsection
@section('statistic_content')
    <div class="container-fluid">
        <div class="row">
            <div class="row">
                <div class="col-md-6">

                    <h3 class="text-bold mb-3">Agent Group: <span class="text-danger">12</span></h3>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-danger btn-md p-2  float-right mb-5"><i class="fas fa-edit"></i> Edit
                        Agent Group</button>

                </div>

            </div>
            <div class="col-md-4">
                <div class="card card-primary card-outline shadow  bg-white rounded">
                    <div class="card-body box-profile">

                        <h3 class="profile-username text-center ">Police Department</h3>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Name Surname:</b> <a class="float-right">Mehmet Taçyıldız</a>
                            </li>
                            <li class="list-group-item">
                                <b>Phone Number:</b> <a class="float-right">1234567</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email:</b> <a class="float-right">MEHMET.TACYILDIZ@police.com</a>
                            </li>
                        </ul>

                        <button type="button" data-toggle="modal" data-target="#agentModal1" href="#"
                            class="btn btn-info btn-block"><b>Agent
                                Information</b></button>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal fade" id="agentModal1" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content border border-dark">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center text-bold text-dark" id="exampleModalLongTitle"> <i
                                            class="fas fa-id-badge mr-2"></i>Agent
                                        Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body box-profile">
                                    <h3 class="profile-username text-center ">Police Department</h3>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item border-0">
                                            <b>Agent Group ID:</b> <a class="float-right">12</a>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <b>Agent ID:</b> <a class="float-right">2</a>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <b>Name Surname:</b> <a class="float-right">Mehmet
                                                Taçyıldız</a>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <b>Phone Number:</b> <a class="float-right">1234567</a>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <b>Email:</b> <a class="float-right">MEHMET.TACYILDIZ@health.com</a>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <b>Device ID:</b> <a class="float-right">123456sasa</a>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <b>Device Token:</b> <a class="float-right">sd21sa21</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('one_agent') }}" class="btn btn-dark btn-block"><i
                                            class="fas fa-user mr-2"></i>Visit Profile</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-primary card-outline shadow  bg-white rounded">
                    <div class="card-body box-profile">

                        <h3 class="profile-username text-center ">Health Department</h3>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Name Surname:</b> <a class="float-right">Berkan Ergil</a>
                            </li>
                            <li class="list-group-item">
                                <b>Phone Number:</b> <a class="float-right">1234567</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email:</b> <a class="float-right">BERKAN.ERGIL@health.com</a>
                            </li>
                        </ul>

                        <button type="button" data-toggle="modal" data-target="#agentModal2" href="#"
                            class="btn btn-info btn-block"><b>Agent
                                Information</b></button>
                    </div>
                    <!-- /.card-body -->

                    <div class="modal fade" id="agentModal2" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered " role="document">
                            <div class="modal-content border border-dark">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center text-bold" id="exampleModalLongTitle"><i
                                            class="fas fa-id-badge mr-2 text-dark"></i>Agent
                                        Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body box-profile">
                                    <h3 class="profile-username text-center ">Health Department</h3>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item border-0">
                                            <b>Agent Group ID:</b> <a class="float-right">12</a>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <b>Agent ID:</b> <a class="float-right">3</a>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <b>Name Surname:</b> <a class="float-right">Berkan Ergil</a>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <b>Phone Number:</b> <a class="float-right">1234567</a>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <b>Email:</b> <a class="float-right">BERKAN.ERGIL@health.com</a>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <b>Device ID:</b> <a class="float-right">123456sasa</a>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <b>Device Token:</b> <a class="float-right">sd21sa21</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('one_agent') }}" class="btn btn-dark btn-block"><i
                                            class="fas fa-user mr-2"></i>Visit Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-primary card-outline shadow  bg-white rounded">
                    <div class="card-body box-profile">

                        <h3 class="profile-username text-center ">Fire Department</h3>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Name Surname:</b> <a class="float-right">İbrahim Emin</a>
                            </li>
                            <li class="list-group-item">
                                <b>Phone Number:</b> <a class="float-right">1234567</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email:</b> <a class="float-right">IBRAHIM.EMIN@fire.com</a>
                            </li>
                        </ul>

                        <button type="button" data-toggle="modal" data-target="#agentModal3" href="#"
                            class="btn btn-info btn-block"><b>Agent
                                Information</b></button>
                    </div>
                    <!-- /.card-body -->
                    <div class="modal fade" id="agentModal3" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content border border-dark">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center text-bold text-dark" id="exampleModalLongTitle"><i
                                            class="fas fa-id-badge mr-2"></i>Agent
                                        Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body box-profile">
                                    <h3 class="profile-username text-center ">Fire Department</h3>

                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item border-0">
                                            <b>Agent Group ID:</b> <a class="float-right">12</a>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <b>Agent ID:</b> <a class="float-right">1</a>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <b>Name Surname:</b> <a class="float-right">İbrahim Emin</a>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <b>Phone Number:</b> <a class="float-right">1234567</a>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <b>Email:</b> <a class="float-right">IBRAHIM.EMIN@health.com</a>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <b>Device ID:</b> <a class="float-right">123456sasa</a>
                                        </li>
                                        <li class="list-group-item border-0">
                                            <b>Device Token:</b> <a class="float-right">sd21sa21</a>
                                        </li>
                                    </ul>
                                    <div class="modal-footer">
                                        <a href="{{ route('one_agent') }}" class="btn btn-dark btn-block"><i
                                                class="fas fa-user mr-2"></i>Visit Profile</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
