<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title> EmergenCyp | Login</title>
</head>

<body>
    <div class="container" id="container">
        @if (session('status'))
            <h3 class="text-white" style="z-index: 100 !important">{{ session('status') }}
            </h3>
        @endif
        <div class="form-container sign-in-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h1 style="margin-bottom:30px; color: #083372;">EmergenCyp | {{ __('Login') }}</h1>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus type="email"
                    placeholder="{{ __('Email') }}" />
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password" type="password"
                    placeholder="{{ __('Password') }}" />
                <a href="#">{{ __('Forgot your password?') }}</a>
                <button class="login">{{ __('Sign In') }}</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">

                <div class="overlay-panel overlay-right">
                    <img src="{{ asset('images/logo-white-sm.png') }}" alt="">
                    <h1 style="margin-top:30px;">{{ __('Welcome to EmergenCyp!') }}</h1>
                    <p>{{ __('We are the fastest way to get help!') }}</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
