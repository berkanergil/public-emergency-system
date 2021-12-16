@extends('layouts.authority.authority_master')
@section('title')
    EmergenCyp | Login
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('content')
    <div class="container-fluid" style="min-height: 100vh">
        <div class="d-flex align-items-center justify-content-center">
            <a class="actor-login mr-md-5" href="#">Admin Login</a>


            <div class="login-box" style="vertical-align: center !important;">
                <h1 class="text-center mb-3">Emergen-cyp</h1>
                <h2 class="mb-5" style="opacity: 0.3 !important;">Login | Authority</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="user-box">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label>Email</label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="user-box">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password"> <label>Password</label>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="container d-flex justify-content-center align-items-center">

                        <div>
                            <a href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span> <input style="display:none !important" type="submit" id="submit"> <label
                                    for="submit">Sign In</label>
                            </a>
                            <br>
                            <a href="#">SIGN UP</a>
                        </div>
                    </div>

                </form>
                @if (session('status'))
                    <h3 class="text-white" style="z-index: 100 !important">{{ session('status') }}
                    </h3>
                @endif
            </div>
        </div>
    </div>

    <body>


    </body>

@endsection
