@extends('layouts.app')
@section('title', "Login")
@section('script')
<script src="{{ mix('js/_login.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('style')
<link href="{{ mix('css/login.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
<div class="container text-center container-custom">
    <div class="row">
        <div class="col-lg-6 col-md-10 col-sm-12 mx-auto">
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
                            <i class="fa-solid fa-eye toggleBtn" id="toggleBtn"></i>
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
                    <p class="text-muted text-end mt-1"><a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a></p>
                </div>
            </form>
            <p>Or Login with:</p>
            <div class="row d-block">
                <a href="{{ route('facebook.login') }}" ><i class="fab fa-facebook-square fs-1 text-white"></i></a>
                <a href="{{ route('google.login') }}" ><i class="fa-brands fa-google fs-1 text-white"></i></a>
            </div>
        </div>
    </div>
</div>

<!--
    This script should be inside js file, but I couldn't since I'm using blade directives in here. If I come up with solution, I'll move it to js file.
-->
<script>
    $(document).ready(function() {
        toastr.options = {
            "timeOut": "5000",
        }
        @if (Session::has('login_needed'))
            toastr.error('{{ Session::get('login_needed') }}');
        @endif
    });
</script>
@endsection
