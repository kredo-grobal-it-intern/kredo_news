@extends('layouts.app')
@section('style')
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container text-center container-custom">
        <div class="row">
            <div class="col-lg-6 col-md-10 col-sm-12 mx-auto">
                <p class="h4 text-center mb-3">{{ __('Reset Password') }}</p>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="w-75 mx-auto mb-3">
                        <div class="form mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" placeholder="E-mail" required
                                autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-danger fw-bold w-100">
                            {{ __('Send Password Reset Link') }}
                        </button>
                        <div class="mt-3">
                            <a href="{{ route('login') }}" class="text-white">Back to login page</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
