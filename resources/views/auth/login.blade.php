@extends('layouts.app')

@section('body_id', 'back-blue')
@section('style')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid  justify-content-center text-center" style="margin-top:100px;">
    <div class="col-md-4 mx-auto col-sm-12">
        <p class="h4 text-white text-center">Log in to your CCC account</p>
        <div class="form-check text-white mb-4 text-center ps-0">
            <p class="ms-0">Not member yet?
                <a href="{{ route('register') }}" class="text-white">Sign up</a>
            </p>
        </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-10 col-sm-12 offset-md-1">

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-10 col-sm-12 offset-md-1">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-md-10 col-sm-12 offset-md-1">
                    <button type="submit" class="btn btn-danger fw-bold w-100">
                            {{ __('Login') }}
                    </button>
                    </div>
                </div>
        </form>
        <div class="form-check text-white mt-3 text-center ps-0">
            <p>Or Login with:</p>
        </div>
        <div class="row mt-3 d-block">
            <a href="" ><i class="fab fa-facebook-square fs-1 text-white"></i></a>
            <a href="" ><i class="fa-brands fa-google fs-1 text-white"></i></a>
        </div>
    </div>
</div>
@endsection
