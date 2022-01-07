@extends('authority.dashboard')
@section('breadcrumb')
    <a href="{{ route('edit_agent', $staff) }}">Edit Agent ID: {{ $staff->id }}</a>
@endsection
@section('statistic_content')
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card h-100 shadow p-3 mb-5 bg-white rounded">
                    <div class="card-body text-center">
                        <div class="account-settings mt-5">

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
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="card h-100 shadow p-3 mb-5 bg-white rounded">
                    <form action="{{ route('update_agent', ['id' => $staff->id]) }}" method="post">
                        @csrf
                        <div class="card-body ">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h5 class="mb-4 text-primary text-bold">Personal Details</h5>
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
                                            placeholder="Tolgahan Dayanıklı" value={{ $staff->surname }}>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="name">Department</label>
                                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                                            name="department_id">
                                            @foreach ($department as $depts)
                                                <option value={{ $depts->id }}
                                                    {{ $depts->title == $depts->id ? 'selected' : '' }}>
                                                    {{ $depts->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Email</label>
                                        <input type="email" class="form-control" id="eMail" name="email"
                                            value={{ $staff->email }}>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
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
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <button type="button" class="btn btn-secondary"> <i class="far fa-window-close"></i>
                                        Cancel</button>
                                    <button type="button" id="delete" class="btn btn-danger"><i class="fas fa-trash"></i>
                                        Delete</button>
                                    <button type="submit" class="btn btn-success"><i class="far fa-edit"></i>
                                        Update</button>
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

@section('sweetjs')
    <script>
        let _token = $('meta[name="csrf-token"]').attr('content');
        var url = "http://127.0.0.1:8000/all_agents"
        var id = {{ $staff->id }};
        var button = $("#delete").on("click", function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('delete_agent', $staff->id) }}",
                        type: "POST",
                        data: {
                            id: id,
                            _method: "DELETE",
                            _token: _token
                        },
                        success: function() {
                            swal.fire("Done!", "It was succesfully deleted!", "success");

                            $(location).attr('href', url);
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal.fire("Error deleting!", "Please try again", "error");
                        }
                    });
                } else {

                }
            })
        });
    </script>
@endsection
