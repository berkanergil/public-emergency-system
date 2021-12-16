@extends('authority.dashboard')


@section('statistic_content')
    <section class="content">
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit"></i>
                    Reported Event ID: 14323
                </h3>
            </div>
            <div class="card-body">
                <h4 class="mb-3 text-bold">Fire at the Computer Engineering Department</h4>
                <div class="btn-group button-groups my-3 ">
                    <button type="button" class="btn btn-lg btn-default button1 text-bold">Mark Event</button>
                    <button type="button" class="btn btn-lg btn-default button2 text-bold">Add Notes</button>
                    <button type="button" class="btn btn-lg btn-default button3 text-bold">Send SMS</button>
                    <button type="button" class="btn btn-lg btn-default button4 text-bold">Send Notification</button>
                    <button type="button" class="btn btn-lg btn-default button5 text-bold">Merge</button>
                </div>
                <hr class="w-50">
                <ul class="nav nav-tabs text-bold" id="custom-content-below-tab" role="tablist">
                    <li class="nav-item ">
                        <a class="nav-link active p-3" id="custom-content-below-home-tab" data-toggle="pill"
                            href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home"
                            aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-3" id="custom-content-below-operations-tab" data-toggle="pill"
                            href="#custom-content-below-operations" role="tab"
                            aria-controls="custom-content-below-operations" aria-selected="false">Operations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-3" id="custom-content-below-agentsDeployed-tab" data-toggle="pill"
                            href="#custom-content-below-agentsDeployed" role="tab"
                            aria-controls="custom-content-below-agentsDeployed" aria-selected="false">Agents Deployed</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link p-3" id="custom-content-below-notes-tab" data-toggle="pill"
                            href="#custom-content-below-notes" role="tab" aria-controls="custom-content-below-notes"
                            aria-selected="false">Notes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-3" id="custom-content-below-evidence-tab" data-toggle="pill"
                            href="#custom-content-below-evidence" role="tab" aria-controls="custom-content-below-evidence"
                            aria-selected="false">Evidences</a>
                    </li>
                </ul>
                <div class="tab-content" id="custom-content-below-tabContent">
                    <div class="tab-pane fade show active py-5" id="custom-content-below-home" role="tabpanel"
                        aria-labelledby="custom-content-below-home-tab">
                        <div class="row">
                            <div class="col-md-6 ml-5 mr-5">
                                <div class="card  shadow  bg-white rounded">
                                    <div class="card-title text-bold p-3 bg-success">Emergency Information (Handled)
                                    </div>
                                    <div class="card-body">
                                        <ul>
                                            <li class="list-group-item border-0"><strong>Emergency Type:</strong> Crime</li>
                                            <li class="list-group-item border-0"><strong>Description:</strong> Someone tried
                                                to break
                                                in my house!
                                            </li>
                                            <li class="list-group-item border-0"><strong>Name Surname:</strong> Tolgahan
                                                Dayanıklı
                                            </li>

                                            <li class="list-group-item border-0"><strong>Phone Number:</strong> 05488386890
                                            </li>
                                            <li class="list-group-item border-0"><strong>Age:</strong> 22

                                            </li>
                                            <li class="list-group-item border-0"><strong>Email:</strong>
                                                tolgahan.dayanikli@gmail.com
                                            </li>
                                            <li class="list-group-item border-0"><strong>Report Date & Time:</strong>
                                                08/12/2021
                                                15:54</li>
                                            <li class="list-group-item border-0"><strong>Editor:</strong> Berkan Ergil</li>
                                        </ul>
                                        <a href="{{ route('edit_report') }}"
                                            class="btn  btn-lg p-2 float-right btn-info"><i class="far fa-edit"></i>
                                            Make Changes</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 ml-5">
                                <div class="card shadow  bg-white rounded">
                                    <div class="card-title bg-info p-3 text-bold">Device Information</div>
                                    <div class="card-body">
                                        <ul>
                                            <li class="list-group-item border-0"><strong>Device ID:</strong> ac56ygfdfg5
                                            </li>
                                            <li class="list-group-item border-0"><strong>Phone Model:</strong> Iphone XS Max
                                            </li>
                                            <li class="list-group-item border-0"><strong>Event Location:</strong>
                                                <a class="bg-danger p-2 rounded" href="">35.12345, 33.123454</a>
                                            </li>
                                            <li class="list-group-item border-0"><strong>Device Token:</strong> 123456432
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade py-5" id="custom-content-below-operations" role="tabpanel"
                        aria-labelledby="custom-content-below-operations-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card rounded">
                                    <div class="card-title text-bold p-3 bg-info">Operations Performed
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead class="thead">
                                                <tr>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Content</th>
                                                    <th scope="col">Editor</th>
                                                    <th scope="col">Date</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>SMS</td>
                                                    <td>Agents Have Arrived</td>
                                                    <td>Tolgahan Dayanıklı (Agent)</td>
                                                    <td>2021-12-09 11:23</td>
                                                </tr>
                                                <tr>
                                                    <td>SMS</td>
                                                    <td>Agents Deployed</td>
                                                    <td>Berkan Ergil</td>
                                                    <td>2021-12-09 11:12</td>
                                                </tr>
                                                <tr>
                                                    <td>Notification</td>
                                                    <td>Your Report is Confirmed by Authorities</td>
                                                    <td>Berkan Ergil</td>
                                                    <td>2021-12-09 11:10</td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade py-5" id="custom-content-below-agentsDeployed" role="tabpanel"
                        aria-labelledby="custom-content-below-agentsDeployed-tab">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6">

                                    <h3 class="text-bold mb-3">Agent Group: <a href="" class="text-danger">12 (Click To
                                            See
                                            More
                                            Details About the Group)</a></h3>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-danger btn-md p-2 btn-lg float-right mb-5"><i
                                            class="fas fa-user-shield mr-2"></i>Deploy Agent</button>

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
                                                    <h5 class="modal-title text-center text-bold text-dark"
                                                        id="exampleModalLongTitle"> <i
                                                            class="fas fa-id-badge mr-2"></i>Agent
                                                        Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
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
                                                            <b>Email:</b> <a
                                                                class="float-right">MEHMET.TACYILDIZ@health.com</a>
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
                                                    <button class="btn btn-dark btn-block"><i
                                                            class="fas fa-user mr-2"></i>Visit Profile</button>

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
                                                    <h5 class="modal-title text-center text-bold"
                                                        id="exampleModalLongTitle"><i
                                                            class="fas fa-id-badge mr-2 text-dark"></i>Agent
                                                        Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
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
                                                            <b>Email:</b> <a
                                                                class="float-right">BERKAN.ERGIL@health.com</a>
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
                                                    <button class="btn btn-dark btn-block"><i
                                                            class="fas fa-user mr-2"></i>Visit Profile</button>

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
                                                    <h5 class="modal-title text-center text-bold text-dark"
                                                        id="exampleModalLongTitle"><i
                                                            class="fas fa-id-badge mr-2"></i>Agent
                                                        Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
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
                                                            <b>Email:</b> <a
                                                                class="float-right">IBRAHIM.EMIN@health.com</a>
                                                        </li>
                                                        <li class="list-group-item border-0">
                                                            <b>Device ID:</b> <a class="float-right">123456sasa</a>
                                                        </li>
                                                        <li class="list-group-item border-0">
                                                            <b>Device Token:</b> <a class="float-right">sd21sa21</a>
                                                        </li>
                                                    </ul>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-dark btn-block"><i
                                                                class="fas fa-user mr-2"></i>Visit Profile</button>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade py-5" id="custom-content-below-notes" role="tabpanel"
                        aria-labelledby="custom-content-below-notes-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card rounded">
                                    <div class="card-title text-bold p-3 bg-warning">Event Notes
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead class="thead">
                                                <tr>
                                                    <th scope="col">Date & Time</th>
                                                    <th scope="col">Note</th>
                                                    <th scope="col">Editor</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>2021-12-09 11:23</td>
                                                    <td>Agents Have Arrived</td>
                                                    <td>Tolgahan Dayanıklı (Agent)</td>
                                                </tr>
                                                <tr>
                                                    <td>2021-12-09 11:12</td>
                                                    <td>Agents Deployed</td>
                                                    <td>Berkan Ergil</td>
                                                </tr>
                                                <tr>
                                                    <td>2021-12-09 11:10</td>
                                                    <td>Your Report is Confirmed by Authorities</td>
                                                    <td>Berkan Ergil</td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade py-5" id="custom-content-below-evidence" role="tabpanel"
                        aria-labelledby="custom-content-below-evidence-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card rounded">
                                    <div class="card-title text-bold p-3 bg-danger">Event Evidences
                                    </div>
                                    <div class="card-body">
                                        <button class="btn button1 float-right p-2"><i
                                                class="fas fa-plus-circle mr-1"></i> Add
                                            New Document</button>
                                        <table class="table">
                                            <thead class="thead">
                                                <tr>
                                                    <th scope="col">Document</th>
                                                    <th scope="col">Document Type</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><a href="">File Name Example</a></td>
                                                    <td>Photo</td>
                                                </tr>
                                                <tr>
                                                    <td><a href="">File Name Example2</a></td>
                                                    <td>Voice Recording</td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- /.card -->
        </div>

    </section>

@endsection
