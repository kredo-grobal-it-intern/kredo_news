@extends('layouts.app')

@section('body_id', 'back-blue')

@section('style')
<link href="{{ asset('css/register.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container justify-content-center text-center" style="margin-top:100px">
    <div class="row justify-content-center">
        <div class="col-md-4 mx-auto col-sm-12">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <img src="{{asset('/images/logo3.PNG')}}" alt="logo2" style="height:100px; width:100px;">
                <p class="h4 text-white text-center">Create your CCC acount</p>
                <div class="form-check text-white mb-4 text-center">
                    <p class="me-4">Already have an account?
                        <a href="{{ route('login') }}" class="text-white">Sign in</a>
                    </p>
                </div>

                <div class="row mb-3">
                    <div class="col-md-10 offset-md-1">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-10 offset-md-1">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-10 offset-md-1">
                        <select class="form-control text-muted">
                                <option hidden >Nationality</option>
                                <option> text 1 </option>
                                <option> text 2 </option>
                                <option> text 3 </option>
                        </select>

                         {{-- <select class="form-control" name="country">
                        <option value="">Select a country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select> --}}



                        @error('nationality')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-10 offset-md-1">
                        <select class="form-control text-muted ">
                            <option hidden >Country</option>
                            <option> text 1 </option>
                            <option> text 2 </option>
                            <option> text 3 </option>
                    </select>

                    {{-- <select class="form-control" name="country">
                        <option value="">Select a country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select> --}}

                        @error('contry')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-10 offset-md-1">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-10 offset-md-1">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"  placeholder="Password Confirm">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-10 offset-md-1">
                        <button type="submit" class="btn btn-danger w-100">
                            {{ __('Create account') }}
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
