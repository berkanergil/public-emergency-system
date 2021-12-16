@extends('authority.dashboard')

@section('statistic_content')
    <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="col-md-6 ml-5 mr-5 ">
            <div class="card  shadow  bg-white rounded">
                <div class="card-title text-bold p-3 bg-success">Emergency Information (Handled)
                </div>
                <div class="card-body">
                    <ul>
                        <li class="list-group-item border-0"><strong>Emergency Type:</strong> <input class="input_boxes"
                                type="text" placeholder="Crime"></li>
                        <li class="list-group-item border-0"><strong>Description:</strong> <input class="input_boxes"
                                type="text" placeholder="Someone Tried To Break In My House!">
                        </li>
                        <li class="list-group-item border-0"><strong>Name Surname:</strong> <input class="input_boxes"
                                type="text" placeholder="Tolgahan Dayanıklı">
                        </li>

                        <li class="list-group-item border-0"><strong>Phone Number:</strong> <input class="input_boxes"
                                type="number" placeholder="05488386890">
                        </li>
                        <li class="list-group-item border-0"><strong>Age:</strong> <input class="input_boxes"
                                type="number" placeholder="22">

                        </li>
                        <li class="list-group-item border-0"><strong>Email:</strong>
                            <input class="input_boxes" type="email" placeholder="tolgahan.dayanikli@gmail.com">
                        </li>
                        <li class="list-group-item border-0"><strong>Report Date & Time:</strong>
                            08/12/2021
                            15:54</li>
                        <li class="list-group-item border-0"><strong>Editor:</strong> Berkan Ergil</li>
                    </ul>

                    <div class="buttons my-5">
                        <a class="btn  btn-lg p-2 float-right btn-primary mr-2"><i class="far fa-save"></i>
                            Save Changes</a>
                        <a class="btn  btn-lg p-2 float-right btn-danger mr-2"><i class="far fa-trash-alt"></i>
                            Delete Event</a>
                        <a class="btn  btn-lg p-2 float-right btn-secondary mr-2"> <i class="far fa-window-close"></i>
                            Cancel</a>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
