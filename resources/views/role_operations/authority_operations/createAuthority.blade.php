@extends('layouts.dashboard')

@section('breadcrumb')
    <a href="{{ route('createAuthority') }}">{{ __('Create Authority') }}</a>
@endsection
@php
use Illuminate\Support\Facades\App;
$locale = App::currentLocale();
@endphp
@section('statistic_content')
    <div class="container-fluid">
        <div class="row gutters d-flex justify-content-center align-items-center">
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card p-5 shadow p-3 mb-5 bg-white rounded">
                    <div class="card-title  mt-3">
                        <h3 class="create_staff_form text-bold">{{ __('Create Authority') }}</h3>
                        <hr class="create_staff_form">
                    </div>
                    <div class="card-body">
                        <form action="{{ route('createAuthority') }}" method="POST">
                            @csrf
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group  text-primary">
                                        <label for="name"><i class="far fa-id-card"></i> {{ __('First Name') }}</label>
                                        <input type="text" class="form-control input rounded" id="name" name="name"
                                            placeholder="{{ __('Enter first name') }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="surname"><i class="far fa-id-card"></i> {{ __('Last Name') }}</label>
                                        <input type="text" class="form-control rounded" id="surname" name="surname"
                                            placeholder="{{ __('Enter last name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="email"><i class="far fa-envelope"></i> {{ __('Email') }}</label>
                                        <input type="email" name="email" class="form-control rounded" id="email"
                                            placeholder="{{ __('Enter email') }}">
                                    </div>
                                </div>

                                <div class="  col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone"><i class="fas fa-mobile-alt"></i> {{ __('Phone') }}</label>
                                        <input name="msisdn" class="form-control rounded" id="phone"
                                            placeholder="{{ __('Enter phone number') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="website"><i class="fas fa-user-tag"></i> {{ __('Staff Role') }}
                                        </label>
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
                                        <input type="password" class="form-control icon" id="password_confirm"
                                            placeholder="">
                                        <i id="btn-eye2" class="btn-eye far fa-eye-slash"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <form class="form-group">
                                            <button type="button" class="generator form-buttons2 mr-1"><i
                                                    class="fas fa-key"></i>
                                                {{ __('Generate Password') }}</button>
                                        </form>

                                        <button type="submit" class="form-buttons"><i class="fas fa-plus mr-1"></i>
                                            {{ __('Create') }}</button>
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
        var locale = '{{ $locale }}';
        var copyToClipboardButton = "";
        var copyButton = "";

        if (locale == "en") {
            copyToClipboardButton = "Click Button to Copy to Clipboard";
            copyButton = "Copy";
        } else if (locale == "tr") {
            copyToClipboardButton = "Kopyalamak ????in Butona T??klay??n??z";
            copyButton = "Kopyala";
        }
        document.addEventListener('DOMContentLoaded', function() {
            var result = document.querySelector('.generator');
            var copy = document.querySelector('.btn-outline-primary');
            var pwField = document.getElementById('password');
            var pwField2 = document.getElementById('password_confirm');


            function copyToClipboard(text) {
                Swal.fire({
                    icon: 'success',
                    title: copyToClipboardButton,
                    confirmButtonText: '<i class="far fa-copy"></i> ' + copyButton,
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
