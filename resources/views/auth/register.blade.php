@extends('layouts.app')

@section('style')
<link href="{{ mix('css/register.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container text-center container-custom">
    <div class="row">
        <div class="col-lg-6 col-md-10 col-sm-12 mx-auto">
            <p class="h4 text-center">Create your CCC acount</p>
            <p>
                <span>Already have an account?</span>
                <a href="{{ route('login') }}" class="text-white ms-2">Sign in</a>
            </p>
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="w-75 mx-auto mb-3">
                    <div class="form mb-3">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username" required autocomplete="username" autofocus>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form mb-3">
                        <select class="form-control text-muted">
                            <option hidden>Nationality</option>
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
                    <div class="form mb-3">
                        <select class="form-control text-muted">
                            <option hidden>Country</option>
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
                    <div class="form mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form mb-3">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"  placeholder="Password Confirm">
                    </div>
                    <button type="submit" class="btn btn-danger fw-bold w-100">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
