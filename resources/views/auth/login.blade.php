@extends('layouts.app')

@section('style')
<link href="{{ mix('css/login.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container text-center container-custom">
    <div class="row">
        <div class="col-lg-6 col-md-10 col-sm-12 mx-auto">
            <img src="{{ asset('images/logo3.PNG') }}" alt="logo3" class="logo">
            <p class="h4 text-center">Log in to your CCC acount</p>
            <p>
                <span>Not member yet?</span>
                <a href="{{ route('register') }}" class="text-white ms-2">Sign up</a>
            </p>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="w-75 mx-auto mb-3">
                    <div class="form mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form mb-3">
                        <p>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                            <i class="fa-solid fa-eye" id="toggleBtn" onclick="toggePassword()"></i>
                        </p>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-danger fw-bold w-100">
                        Login
                    </button>
                </div>
            </form>
            <p>Or Login with:</p>
            <div class="row d-block">
                <a href="" ><i class="fab fa-facebook-square fs-1 text-white"></i></a>
                <a href="" ><i class="fa-brands fa-google fs-1 text-white"></i></a>
            </div>
        </div>
    </div>
</div>
<script>
    function toggePassword() {
                var upass = document.getElementById('password');
                var toggleBtn = document.getElementById('toggleBtn');
                if (upass.type == "password") {
                    upass.type = "text";
                    toggleBtn.classList.toggle('fa-eye-slash');
                    toggleBtn.classList.add('fa-eye');
                } else {
                    upass.type = "Password";
                    toggleBtn.classList.toggle('fa-eye-slash');
                    toggleBtn.classList.add('fa-eye');
                }
            }
</script>
@endsection
