@extends('authority.dashboard')

@section('breadcrumb')
    <a href="">Create Authorities</a>
@endsection

@section('statistic_content')
    <div class="container-fluid">
        <div class="row gutters d-flex justify-content-center align-items-center">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card  p-5 shadow p-3 mb-5 bg-white rounded">
                    <div class="card-title text-center mt-3">
                        <h3 class="text-primary text-bold">Create Authority</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('create_authorities') }}" method="POST">
                            @csrf
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-bold text-info">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="name"><i class="far fa-id-card"></i> Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter full name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="surname"><i class="far fa-id-card"></i> Surname</label>
                                        <input type="text" class="form-control" id="surname" name="surname">
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="email"><i class="far fa-envelope"></i> Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Enter email ID">
                                    </div>
                                </div>

                                <div class="  col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone"><i class="fas fa-mobile-alt"></i> Phone</label>
                                        <input name="msisdn" class="form-control" id="phone"
                                            placeholder="Enter phone number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="website"><i class="fas fa-user-tag"></i> Staff Role </label>
                                        <input type="number" class="form-control" id="staff_role_id" name="staff_role_id"
                                            value="1" placeholder="Web Authority">
                                    </div>
                                </div>
                            </div>

                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            rows="5">
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
                                                    class="fas fa-key"></i>
                                                Generate Password</button>
                                        </form>

                                        <button type="submit" class="btn btn-success"><i class="fas fa-user-plus"></i>
                                            Create</button>
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
                                                    <input class="form-check-input" type="checkbox" id="numbers"
                                                        checked="checked">
                                                    1-9
                                                </label>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('sweetjs')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var result = document.querySelector('.generator');
            var copy = document.querySelector('.btn-outline-primary');
            var pwField = document.getElementById('password');
            var pwField2 = document.getElementById('password_confirm');


            function copyToClipboard(text) {
                Swal.fire({
                    icon: 'success',
                    title: 'Click Button to Copy to Clipboard',
                    confirmButtonText: '<i class="far fa-copy"></i> Copy',
                    confirmButtonColor: '#28A745',
                    text: text,
                }).then((result) => {
                    if (result.isConfirmed) {
                        navigator.clipboard.writeText(text);
                    }
                })
            }

            function generatePass(pwField) {
                var newPassword = '';
                var chars = 'abcdefghijklmnopqrstuvwxyz';
                var pwLength = document.getElementById('pwLength');
                var caps = document.getElementById('caps');
                var special = document.getElementById('special');
                var numbers = document.getElementById('numbers');

                if (caps.checked) {
                    chars = chars.concat('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
                }

                if (special.checked) {
                    chars = chars.concat('!@#$%^&*');
                }

                if (numbers.checked) {
                    chars = chars.concat('123456789');
                }

                for (var i = pwLength.value; i > 0; --i) {
                    newPassword += chars[Math.round(Math.random() * (chars.length - 1))];
                }

                pwField.value = newPassword;
                pwField2.value = newPassword;
                Swal.fire(newPassword).then(copyToClipboard(pwField.value));
            }
            result.addEventListener('click', function() {
                generatePass(pwField).then(copyToClipboard(pwField.value));
            });
        });
    </script>
@endsection
