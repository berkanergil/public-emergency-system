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
                <h1 style="margin-bottom:30px; color: #083372;">EmergenCyp | Login</h1>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus type="email"
                    placeholder="Email" />
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password" type="password" placeholder="Password" />
                <a href="#">Forgot your password?</a>
                <button class="login">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">

                <div class="overlay-panel overlay-right">
                    <img src="{{ asset('images/logo-white-sm.png') }}" alt="">
                    <h1 style="margin-top:30px;">Welcome to EmergenCyp!</h1>
                    <p>We are the fastest way to get help!</p>
                </div>
            </div>
        </div>
    </div>



    {{-- <div class="container-fluid" style="min-height: 100vh">
        <div class="d-flex align-items-center justify-content-center">
            <div class="login-box" style="vertical-align: center !important;">
                <h1 class="text-center mb-3">Emergen-cyp</h1>
                <h2 class="mb-5" style="opacity: 0.3 !important;">Login | Authority</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="user-box">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label>Email</label>
                    </div>

                    <div class="user-box">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password"> <label>Password</label>
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
            </div>
        </div>
    </div> --}}
</body>

</html>
