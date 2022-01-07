@extends('authority.dashboard')

@section('breadcrumb')
    <a href="{{ route('editAuthority', $staff) }}">Edit Authority ID: {{ $staff->id }}</a>
@endsection

@section('statistic_content')
    <div class="row gutters">
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
                                    <button type="reset" class="btn btn-secondary"><i class="far fa-window-close mr-1"></i>
                                        Cancel</button>
                                    <button type="button" id="delete" class="btn btn-danger"><i
                                            class="fas fa-trash mr-1"></i>
                                        Delete</button>
                                    <button id="update" type="submit" class="btn btn-success"> <i
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
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="card p-5 shadow p-3 mb-5 bg-white rounded">
                <div class="card-title text-center mt-3">
                    <h3 class="text-primary text-bold">Generate Password</h3>
                </div>
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
                                        <input class="form-check-input" type="checkbox" id="numbers" checked="checked">
                                        1-9
                                    </label>
                                </div>
                        </form>
                    </main>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('sweetjs')
    <script>
        let _token = $('meta[name="csrf-token"]').attr('content');
        var url = "http://127.0.0.1:8000/all_authorities"
        var id = {{ $staff->id }};
        var button = $("#delete").on("click", function() {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Yes, delete it!'
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
                            swal.fire("Done!", "It was succesfully deleted!", "success");

                            $(location).attr('href', url);
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
    </script>

    <script>
        let _token = $('meta[name="csrf-token"]').attr('content');
        var id = {{ $staff->id }};
        var url = "http://127.0.0.1:8000/one_authority/{{ $staff->id }}"

        var button = $('#update').on('click', function() {
            console.log('hell')
            Swal.fire({
                title: 'Do you want to save the changes?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Save',
                denyButtonText: `Don't save`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('editAuthority', $staff->id) }}",
                        type: "POST",
                        data: {
                            id: id,
                            _method: "PUT",
                            _token: _token
                        },
                        success: function() {
                            swal.fire("Done!", "It was succesfully updated!", "success");

                            $(location).attr('href', url);
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal.fire("Error Updating!", "Please try again", "error");
                        }
                    })
                }
            })
        });
    </script>
@endsection
