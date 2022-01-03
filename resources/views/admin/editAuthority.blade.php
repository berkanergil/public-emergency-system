@extends('authority.dashboard')

@section('statistic_content')
    <div class="row gutters">
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="card p-5">
                <div class="card-title text-center mt-3">
                    <h3 class="text-danger text-bold">Edit Personal Information</h3>
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
                                    <button type="submit" class="btn btn-success"> <i class="far fa-edit mr-1"></i>Update
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
            <div class="card p-5">
                <div class="card-title text-center mt-3">
                    <h3 class="text-danger text-bold">Generate Password</h3>
                </div>
                <div class="card-body">


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
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((isConfirm) => {
                if (!isConfirm) return;
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
            })
        });
    </script>
@endsection
