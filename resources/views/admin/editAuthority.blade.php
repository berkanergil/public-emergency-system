@extends('authority.dashboard')

@section('breadcrumb')
    <a href="{{ route('editAuthority', $staff) }}">Edit Authority ID: {{ $staff->id }}</a>
@endsection

@section('statistic_content')
    <div class="row gutters d-flex justify-content-center align-items-center">
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="card p-5 shadow p-3 mb-5 bg-white rounded">
                <div class="card-title text-center mt-3">
                    <h3 class="text-primary text-bold">Edit Personal Information</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateAuthority', ['id' => $staff->id]) }}" method="POST">
                        @csrf
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value={{ $staff->name }}>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="surname">Surname</label>
                                    <input type="text" class="form-control" id="surname" name="surname"
                                        value={{ $staff->surname }}>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value={{ $staff->email }}>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input name="msisdn" class="form-control" id="phone" value={{ $staff->msisdn }}>
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
                                    <input type="password" class="form-control" id="password_confirm">
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <form class="form-group">
                                        <button type="button" class="btn btn-primary generator"><i
                                                class="fas fa-key"></i> Generate Password</button>
                                    </form>
                                    <button type="button" id="delete" class="btn btn-danger"><i
                                            class="fas fa-trash mr-1"></i>
                                        Delete</button>
                                    <button id="update" type="button" class="btn btn-success"> <i
                                            class="far fa-edit mr-1"></i>Update
                                    </button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="_method" value="PUT">
                    </form>

                </div>
            </div>
        </div>

        <div class="d-none">

            <form class="form-inline">
                <div class="form-group">
                    <label for="pwLength">Length</label>
                    <select class="custom-select" id="pwLength">
                        <option selected="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
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
                            <input class="form-check-input" type="checkbox" id="numbers" checked="checked">
                            1-9
                        </label>
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection
@section('sweetjs')
    <script>
        let _token = $('meta[name="csrf-token"]').attr('content');
        var url = 'http://127.0.0.1:8000/all_authorities'
        var id = {{ $staff->id }};
        // var name = {{ $staff->name }}
        // var surname = {{ $staff->surname }}
        // var email = {{ $staff->email }}
        // var msisdn = {{ $staff->msisdn }}
        // var password = {{ $staff->password }}

        var button = $("#delete").on("click", function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class = "fas fa-trash mr-1" ></i> Delete It'

            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('delete_authority', $staff->id) }}",
                        type: "POST",
                        data: {
                            id: id,
                            _method: "DELETE",
                            _token: _token
                        },
                        success: function() {
                            swal.fire("Done!", "It was succesfully deleted!", "success").then(
                                function() {
                                    $(location).attr('href', url);

                                })

                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal.fire("Error deleting!", "Please try again", "error");
                        }
                    });
                } else Swal.fire({
                    title: 'Error Deleting!',
                    text: "Please try again",
                    icon: 'error',

                });
            })
        });

        var url2 = 'http://127.0.0.1:8000/one_authority/' + id
        var name = $('#name').val();
        var surname = $('#surname').val();
        var msisdn = $('#msisdn').val();
        var email = $('#email').val();
        var password = $('#password').val();


        var button = $('#update').on('click', function() {

            Swal.fire({
                title: 'Do you want to save the changes?',
                icon: 'question',
                showDenyButton: true,
                confirmButtonText: '<i class="far fa-save"></i> Save',
                denyButtonText: `<i class="far fa-window-close"></i> Cancel`,
                confirmButtonColor: '#28A745',
                denyButtonColor: '#6c757d',
            }).then((result2) => {
                if (result2.isConfirmed) {
                    $.ajax({
                        url: "{{ route('updateAuthority', $staff->id) }}",
                        type: "POST",
                        data: {
                            id: id,
                            name: name,
                            surname: surname,
                            email: email,
                            msisdn: msisdn,
                            password: password,
                            _method: "PUT",
                            _token: _token
                        },
                        success: function() {
                            swal.fire("Done!", "It was succesfully updated!", "success");

                            $(location).attr('href', url2);
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal.fire("Error Updating!", "Please try again", "error");
                        }
                    })
                } else Swal.fire({
                    title: 'Error Updating!',
                    text: "Please try again",
                    icon: 'error',

                });
            })
        });
    </script>

    <script>

    </script>
@endsection
