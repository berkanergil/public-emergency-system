@extends('layouts.dashboard')

@section('breadcrumb')
    <a href="{{ route('editAuthority', $staff) }}">Edit Authority ID: {{ $staff->id }}</a>
@endsection
@php
use Illuminate\Support\Facades\App;
$locale = App::currentLocale();
@endphp
@section('statistic_content')
    <div class="row gutters d-flex justify-content-center align-items-center">
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card p-5 shadow p-3 mb-5 bg-white rounded">
                <div class="card-title mt-3">
                    <h3 class="create_staff_form text-bold">{{ __('Edit Personal Information') }}</h3>
                    <hr class="create_staff_form">
                </div>
                <div class="card-body">
                    <form action="{{ route('updateAuthority', ['id' => $staff->id]) }}" method="POST">
                        @csrf
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="name"><i class="far fa-id-card"></i> {{ __('First Name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value={{ Str::title($staff->name) }}>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="surname"><i class="far fa-id-card"></i> {{ __('Last Name') }}</label>
                                    <input type="text" class="form-control" id="surname" name="surname"
                                        value={{ Str::title($staff->surname) }}>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="email"><i class="far fa-envelope"></i> {{ __('Email') }}</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value={{ $staff->email }}>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone"><i class="fas fa-mobile-alt"></i> {{ __('Phone') }}</label>
                                    <input name="msisdn" class="form-control" id="phone" value={{ $staff->msisdn }}>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="website"><i class="fas fa-user-tag"></i> {{ __('Staff Role') }} </label>
                                    <input type="number" class="form-control rounded" id="staff_role_id"
                                        name="staff_role_id" value="1" placeholder="Web Authority">
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="password"><i class="fas fa-key"></i> {{ __('Password') }}</label>
                                    <input type="password" class="form-control icon" id="password" placeholder=""
                                        name="password"><i id="btn-eye" class="btn-eye far fa-eye-slash"></i>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="password_confirm"><i class="fas fa-key"></i>
                                        {{ __('Confirm Password') }}</label>
                                    <input type="password" class="form-control icon" id="password_confirm" placeholder="">
                                    <i id="btn-eye2" class="btn-eye far fa-eye-slash"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="text-right">
                                    <form class="form-group">
                                        <button type="button" class="form-buttons2 generator"><i class="fas fa-key"></i>
                                            {{ __('Generate Password') }}</button>
                                    </form>
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
        var url = 'http://127.0.0.1:8000/admin/staff/authorities'
        var id = {{ $staff->id }};
        var url2 = 'http://127.0.0.1:8000/admin/staff/authorities/authority/id:' + id
        var name = $('#name').val();
        var surname = $('#surname').val();
        var msisdn = $('#msisdn').val();
        var email = $('#email').val();
        var password = $('#password').val();

        var locale = '{{ $locale }}';
        var copyToClipboardButton = "";
        var saveButton = "";
        var cancelButtonText = "";
        var copyButton = "";
        var title1 = "";
        var successMessage = "";
        var failureMessage = "";
        if (locale == "en") {
            title1 = "Do You Want to Save the Changes?"
            copyToClipboardButton = "Click Button to Copy to Clipboard";
            copyButton = "Copy";
            cancelButtonText = "Cancel";
            saveButton = "Save";
            successMessage = "Done! Successfully Updated!"
            failureMessage = "Error! Try Again!"
        } else {
            title1 = "Kaydetmek ??stedi??nize Emin Misiniz?"
            copyToClipboardButton = "Kopyalamak ????in Butona T??klay??n??z";
            copyButton = "Kopyala";
            saveButton = "Kaydet";
            cancelButtonText = "??ptal";
            successMessage = "????lem Ba??ar??l??!";
            failureMessage = "????lem Ba??ar??s??z! Tekrar Deneyin";
        }

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



        var button = $('#update').on('click', function() {
            Swal.fire({
                title: title1,
                icon: 'question',
                showDenyButton: true,
                confirmButtonText: '<i class="far fa-save"></i> ' + saveButton,
                denyButtonText: `<i class="far fa-window-close"></i> ` + cancelButtonText,
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
                            swal.fire(successMessage, "success");
                            $(location).attr('href', url2);
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal.fire(failureMessage "error");
                        }
                    })
                } else Swal.fire({
                    title: 'Error Updating!',
                    text: "Please try again",
                    icon: 'error',

                });
            })
        });

        var eyeBtn = document.querySelector('#btn-eye');
        eyeBtn.onclick = function() {
            var inp = document.querySelector('#password');
            inp.getAttribute('type') === 'password' ? inp.setAttribute('type', 'text') : inp.setAttribute('type',
                'password');
        }
        var eyeBtn2 = document.querySelector('#btn-eye2');
        eyeBtn2.onclick = function() {
            var inp = document.querySelector('#password_confirm');
            inp.getAttribute('type') === 'password' ? inp.setAttribute('type', 'text') : inp.setAttribute('type',
                'password');
        }
    </script>
@endsection
