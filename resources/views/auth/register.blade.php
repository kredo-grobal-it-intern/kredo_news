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
                    @php
                        $all_countries = App\Models\Country::all();
                    @endphp
                    <div class="form mb-3">
                        <select class="form-select @error('nationality') is-invalid @enderror" name="nationality">
                            <option disabled selected>-- Choose Nationality --</option>
                            @foreach ($all_countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('nationality')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form mb-3">
                        <select class="form-select @error('country') is-invalid @enderror" name="country">
                            <option class="text-muted" disabled selected>-- Choose Country --</option>
                            @foreach ($all_countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                        @error('country')
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
