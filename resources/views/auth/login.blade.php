@extends('layouts.app')

@section('body_id', 'back-blue')

@section('content')
<div class="container-fluid d-flex justify-content-center text-center" style="margin-top:100px;">
    <div class="col-4">
        <img src="{{asset('/storage/image/logo3.PNG')}}" alt="logo2" style="height:auto; width:100px;">
        <p class="h4 text-white text-center">Log in to your CCC account</p>
        <div class="form-check text-white mb-4 text-center">
            <p class="ms-0">Not member yet?
                <a href="" class="text-white">Sign up</a>
            </p>
        </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="row mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                </div>
                <div class="row mb-0">
                    <button type="submit" class="btn btn-danger fw-bold" style="width:100%">
                            {{ __('Login') }}
                    </button>
                </div>
        </form>
    </div>
</div>
@endsection
