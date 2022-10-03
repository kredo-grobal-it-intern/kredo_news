@extends('layouts.app')
@section('title', 'Password reset')
@section('style')
    <link href="{{ mix('css/login.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container text-center container-custom">
        <div class="row">
            <div class="col-lg-6 col-md-10 col-sm-12 mx-auto">
                <p class="h4 text-center">{{ __('Reset Password') }}</p>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="w-75 mx-auto mb-3">
                        <div class="form mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $email ?? old('email') }}"placeholder="Email" required
                                autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form mb-3">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form mb-3">
                            <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn btn-danger fw-bold w-100">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
