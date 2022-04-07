@extends('layouts.dashboard')

@section('statistic_content')
    <div class="row gutters d-flex justify-content-center align-items-center">
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card p-5 shadow p-3 mb-5 bg-white rounded">
                <div class="card-title mt-3">
                    <h3 class="create_staff_form text-bold">{{ __('Edit Notification Information') }}</h3>
                    <hr class="create_staff_form">
                </div>
                <div class="card-body">
                    <form action="{{ route('editNotification', ['id' => $notification->id]) }}" method="POST">
                        @csrf
                        <div class="row gutters">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                <div class="form-group">
                                    <label for="title"><i class="far fa-id-card"></i>
                                        {{ __('Notification Title') }}</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value={{ Str::title($notification->title) }}>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label for="notification"><i class="far fa-id-card"></i>
                                        {{ __('Notification') }}</label>
                                    <textarea rows="5" type="text" class="form-control" id="notification"
                                        name="notification">{{ Str::title($notification->notification) }} </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">

                                    <button type="button" id="delete" class="form-buttons3"><i
                                            class="fas fa-trash mr-1"></i>
                                        {{ __('Delete') }}</button>
                                    <button id="update" type="button" class="form-buttons"> <i
                                            class="far fa-edit mr-1"></i>{{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="_method" value="PUT">
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('sweetjs')
    <script>
        let _token = $('meta[name="csrf-token"]').attr('content');
        var id = {{ $notification->id }};
        var url = "http://127.0.0.1:8000/admin/systemOperations/notifications/notification/id:" + id;
        var url2 = "http://127.0.0.1:8000/admim/systemOperations/notifications";
        var title = $('#title');
        var notification = $('#notification');

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
                        url: "{{ route('deleteNotification', $notification->id) }}",
                        type: "POST",
                        data: {
                            id: id,
                            _method: "DELETE",
                            _token: _token
                        },
                        success: function() {
                            swal.fire("Done!", "It was succesfully deleted!", "success");

                            $(location).attr('href', url2);
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal.fire("Error deleting!", "Please try again", "error");
                        }
                    });
                } else {

                }
            })
        });

        var button = $("#update").on("click", function() {
            Swal.fire({
                title: 'Save Changes?',
                text: "The new settings will be saved!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then(function() {
                $.ajax({
                    type: "POST",
                    url: "{{ route('editNotification', $notification->id) }}",
                    data: {
                        title: $("#title").val(),
                        notification: $("#notification").val(),
                        _method: "PUT",
                        _token: _token
                    },
                    success: function() {
                        swal.fire({
                            icon: 'success',
                            title: "{{ __('Updated') }}",
                            text: "{{ __('Your event has been updated.') }}",
                            type: "success",
                            timer: 3000
                        }).then(function() {
                            location.reload(
                                true);
                        })
                    },

                });

            })
        });
    </script>
@endsection
