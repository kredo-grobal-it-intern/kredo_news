@extends('layouts.app')

@section('style')
<link href="{{ mix('css/profile_edit.css') }}" rel="stylesheet">
@endsection
@section('script_footer')
<script src="{{ mix('js/_profile_edit.js') }}" defer></script>
@endsection
@section('content')
<div class="container">
    <form action="{{ route('user.profile.update', ['id'=> Auth::id()]) }}" method="post" class="form" enctype="multipart/form-data">
    @csrf
    @method('patch')

        <div class="row mt-5 mx-auto profile">
            <div class="col-12 col-md-4 profile-avatar">
                @if ($user->avatar)
                    <img src="{{asset('/images/avatars/'.$user->avatar)}}" alt="Image" class="rounded-circle d-block mx-auto profile-avatar-icon" id="showAvatar">
                @else
                    <i class="fa-solid fa-circle-user text-secondary d-block text-center profile-avatar-none"></i>
                @endif

                <div class="text-center mt-2">
                    <label class="px-3 profile-avatar-upload">
                        <input type="file" name="avatar" class="d-none" id="avatar">
                        <i class="fa fa-cloud-upload"></i> Upload iamge
                    </label>
                </div>
                @error('avatar')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-8">
                <div class="row mb-3 align-items-center">
                    <div class="col-lg-4">
                        <label class="form-label">Username</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" name="username" id="username" class="form-control" value="{{$user->username}}">
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-lg-4">
                        <label class="form-label">Email</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-lg-4">
                        <label class="form-label">Nationality</label>
                    </div>
                    <div class="col-lg-8">
                        <select class="form-select" id="inputGroupSelect01" name="nationality">
                                @foreach($all_countries as $country)
                                    <div class="form-check form-check-inline">
                                        <option value="{{$country->id}}" {{ $country->id == Auth::user()->nationality_id ? 'selected' : '' }}>{{$country->name}}</option>
                                    </div>
                                @endforeach
                        </select>
                        @error('nationality')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3 align-items-center">
                    <div class="col-lg-4">
                        <label class="form-label">Country of Residence</label>
                    </div>
                    <div class="col-lg-8">
                        <select class="form-select" id="inputGroupSelect01" name="country">
                                @foreach($all_countries as $country)
                                    <div class="form-check form-check-inline">
                                        <option value="{{$country->id}}" {{ $country->id == Auth::user()->country_id ? 'selected' : '' }}>{{$country->name}}</option>
                                    </div>
                                @endforeach
                        </select>
                        @error('country')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <label class="form-label">Discription</label>
                    </div>
                    <div class="col-lg-8">
                        <input type="text" name="description" id="description" class="form-control" value="{{ $user->description }}" placeholder="Input description">
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <section  class="mx-auto mt-5">
            <div class="change-password">
                <h2 class="fw-bold favorite-heading">Change password</h2>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @endif
                    <form class="form-horizontal" method="POST" action="{{ route('changePasswordPost') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                        <label for="new-password" class="col-md-4 control-label">Current Password</label>
                        <div class="col-md-6">
                            <input id="current-password" type="password" class="form-control" name="current-password" required>
                            @if ($errors->has('current-password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('current-password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                        <label for="new-password" class="col-md-4 control-label">New Password</label>
                        <div class="col-md-6">
                            <input id="new-password" type="password" class="form-control" name="new-password" required>
                            @if ($errors->has('new-password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('new-password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>
                        <div class="col-md-6">
                            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4 mt-3">
                            <button type="submit" class="btn btn-outline-secondary float-end">
                                Change Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <section  class="mx-auto mt-5 favorite">
            <!-- Media -->
            <div class="favorite-media">
                <h2 class="fw-bold favorite-heading">Favorite Media</h2>
                <div class="row p-3">
                    <div class="col-12">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input media-checkbox-all" id="media-checkbox-all">
                            <label for="media-checkbox-all" class="form-check-label">Select All / Remove Check</label>
                        </div>
                    </div>
                    @foreach ($sources as $source)
                        <div class="col-lg-2 col-md-3 col-4">
                            <div class="form-check">
                                <input type="checkbox" name="sources[]" id="{{ $source->name }}-{{$source->id}}" value="{{$source->id}}" class="form-check-input media-checkbox" {{ in_array($source->id, $favorite_sources_ids) ? 'checked' : '' }}>
                                <label for="{{ $source->name }}-{{$source->id}}" class="form-check-label">{{$source->country->name}}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Country -->
            <div class="my-4 favorite-country">
                <h2 class="fw-bold favorite-heading">Favorite Country</h2>
                    @foreach($continents as $continent)
                        <div class="p-3">
                            <p class="fw-bold favorite-country-continent">{{ $continent }} </p>
                            @php
                                $countries_by_continent = $all_countries->filter(function($country) use($continent) {
                                    return $country->continent == $continent;
                                });
                            @endphp
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input {{ $continent }}-checkbox-all" id="{{ $continent }}-checkbox-all">
                                        <label for="{{ $continent }}-checkbox-all" class="form-check-label">Select All / Remove Check</label>
                                    </div>
                                </div>
                                @foreach($countries_by_continent as $country)
                                    <div class="col-lg-2 col-md-3 col-4">
                                        <div class="form-check">
                                            <input type="checkbox" name="countries[]" id="{{ $country->name }}-{{$country->id}}" value="{{$country->id}}" class="form-check-input {{ $continent }}-checkbox" {{ in_array($country->id, $favorite_countries_ids) ? 'checked' : '' }}>
                                            <label for="{{ $country->name }}-{{$country->id}}" class="form-check-label">{{$country->name}}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
            </div>
            <button type="submit"class="fw-bold btn w-50 mx-auto d-block favorite-btn-save">SAVE</button>
        </section>
    </form>
</div>
@endsection