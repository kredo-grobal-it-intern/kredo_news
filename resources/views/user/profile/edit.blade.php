@extends('layouts.app')
@section('title','NEWS')
@section('style')
 <link href="{{ mix('css/multi_select.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container justify-content-center px-auto">
    <form action="#" method="post" class="form" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="row mt-5 profile_head">
            <div class="col-3">
                @if ($user->avatar)
                <img src="{{asset('/storage/avatars/'.$user->avatar)}}" alt="" class="rounded-circle nav-avatar" style="width:200px;height:200px">
                @else
                    <i class="fa-solid fa-circle-user text-secondary d-block text-center profile-icon"></i>
                @endif
                <input type="file" name="avatar" id="avatar" class="form-control mt-2">
            </div>
            <div class="col-9 text-center">
                <h2 class="fw-bold">{{$user->username}}</h2>
            </div>
        </div>

    <div class="row">
        <div class="row mt-5">
            <div class="col-2">
                <label class="label" class="d-block fw-bold">Username</label>
            </div>
            <div class="col-6">
                <input type="text" name="username" id="username" class="form-control my-2" value="{{$user->username}}">
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label class="label" class="form-label d-block fw-bold">Email</label>
            </div>
            <div class="col-6">
                <input type="email" name="email" id="email" class="form-control my-2" value="{{$user->email}}">
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <label class="label" class="form-label d-block fw-bold">Nationality</label>
            </div>
            <div class="col-6">
                <input type="text" name="Nationality" id="nationality" class="form-control my-2" value="{{$user->nationality->name}}">
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-2">
                <label class="label" class="form-label d-block fw-bold">Country of Residence</label>
            </div>
            <div class="col-6">
                <input type="text" name="country" id="country" class="form-control my-2" value="{{$user->country->name}}">
            </div>
        </div>
    </div>
<div class="row">
    <label for="newssite" class="fw-bold fs-4 favorite">Favorite News Site</label>
</div>
           <div class="my-5">
                @foreach ($sources as $source )
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="" id="{{$source->name}}-{{$source->id}}" value="{{$source->id}}" class="form-check-input">
                    <label for="{{$source->name}}-{{$source->id}}" class="form-check-label">{{$source->name}}</label>
                </div>
                @endforeach
            </div>
        <div class="row">
            <label for="favorite Country" class="fw-bold fs-4 favorite">Favorite Country</label>
        </div>
            <div>
                @foreach($continents as $continent)
                    <p class="fw-bold">{{ $continent }} </p>
                    @php
                        $countries = App\Models\Country::where('continent', $continent)->get();
                    @endphp
                    @foreach($countries as $country)
                        <div class="form-check form-check-inline my-2">
                            <input type="checkbox" name="{{$country->name}}-{{$country->id}}" id="{{$country->name}}-{{$country->id}}" value="{{$country->id}}" class="form-check-input">
                            <label for="{{$country->name}}-{{$country->id}}" class="form-check-label">{{$country->name}}</label>
                        </div>
                    @endforeach
                @endforeach
        <button type="submit"class="form-control fw-bold fs-5 btn btn-sm btn-secondary text-white save">SAVE</button>
    </form>
</div>
@endsection