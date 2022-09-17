@extends('layouts.app')
@section('title','NEWS')
@section('style')
<link href="{{ mix('css/multi_select.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <form action="{{ route('user.profile.update', ['id'=> Auth::id()]) }}" method="post" class="form" enctype="multipart/form-data">
    @csrf
    @method('patch')

        <div class="row mt-5 align-items-start w-75 mx-auto">
            <div class="col-md-4">
                @if ($user->avatar)
                <img src="{{asset('/images/avatars/'.$user->avatar)}}" alt="Image" class="rounded-circle d-block mx-auto" style="width:180px; height:180px; object-fit:cover;" >
                @else
                <i class="fa-solid fa-circle-user text-secondary d-block text-center" style="font-size:180px;"></i>
                @endif

                <div class="text-center mt-2 ">
                    <label class="px-2 text-center" style="border: 1px solid #ccc; border-radius:5px; cursor: pointer;">
                        <input type="file" name="avatar" style="display: none;">
                        <i class="fa fa-cloud-upload"></i> Upload iamge
                    </label>
                </div>            
            </div>

            <div class="col-8">           
                <div class="row">
                    <div class="row mb-3 align-items-center">
                        <div class="col-4">
                            <label class="form-label">Username</label>
                        </div>
                        <div class="col-6">
                            <input type="text" name="username" id="username" class="form-control" value="{{$user->username}}">
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <div class="col-4">
                            <label class="form-label">Email</label>
                        </div>
                        <div class="col-6">
                            <input type="email" name="email" id="email" class="form-control" value="{{$user->email}}">
                        </div>
                    </div>

                    <div class="row mb-3 align-items-center">
                        <div class="col-4">
                            <label class="form-label">Nationality</label>
                        </div>
                        <div class="col-6">
                            <select class="form-select" id="inputGroupSelect01" name="nationality">
                                    @php
                                        $countries = App\Models\Country::get();
                                    @endphp
                                    @foreach($countries as $country)
                                        <div class="form-check form-check-inline">
                                            <option value="{{$country->id}}" {{ $country->id == Auth::user()->nationality_id ? 'selected' : '' }}>{{$country->name}}</option>
                                        </div>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                

                    <div class="row mb-3 align-items-center">
                        <div class="col-4">
                            <label class="form-label">Country of Residence</label>
                        </div>
                        <div class="col-6">
                            <select class="form-select" id="inputGroupSelect01" name="country">
                                    @php
                                        $countries = App\Models\Country::get();
                                    @endphp
                                    @foreach($countries as $country)
                                        <div class="form-check form-check-inline">
                                            <option value="{{$country->id}}" {{ $country->id == Auth::user()->country_id ? 'selected' : '' }}>{{$country->name}}</option>
                                        </div>
                                    @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-4">
                            <label class="form-label">Discription</label>
                        </div>
                        <div class="col-6">
                            <input type="text" name="discription" id="discription" class="form-control" value="" placeholder="Add value later">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <section  class="mx-auto" style="width: 80%">
            <h1 class="fw-bold fs-4 py-2 ps-2 mt-5 favorite">Favorite Media</h1>
            <div class="row mx-0" style="border:1px solid #d9dce0; border-radius: 5px;">
                @foreach ($sources as $source)
                    <div class="col-2 mt-1">
                        <div class="form-check my-1">
                            <input type="checkbox" name="sources[]" id="{{ $source->name }}-{{$source->id}}" value="{{$source->id}}" class="form-check-input" {{ in_array($source->id, $favorite_sources_ids) ? 'checked' : '' }}>
                            <label for="{{ $source->name }}-{{$source->id}}" class="form-check-label">{{$source->country->name}}</label>
                        </div>
                    </div>
                @endforeach
            </div>

            <h1 class="mt-5 fw-bold fs-4 py-2 ps-2 favorite">Favorite Country</h1>
                @foreach($continents as $continent)
                    <p class="fw-bold fs-5 p-0 m-0 mt-4">{{ $continent }} </p>
                    @php
                        $countries = App\Models\Country::where('continent', $continent)->get();
                    @endphp
                <div class="row mx-0" style="border:1px solid #d9dce0; border-radius: 5px;">
                @foreach($countries as $country)

                <div class="col-2 mt-1">
                    <div class="form-check my-1">
                        <input type="checkbox" name="countries[]" id="{{ $country->name }}-{{$country->id}}" value="{{$country->id}}" class="form-check-input" {{ in_array($country->id, $favorite_countries_ids) ? 'checked' : '' }}>
                        <label for="{{ $country->name }}-{{$country->id}}" class="form-check-label">{{$country->name}}</label>
                    </div>
                </div>
                @endforeach
            </div>
                @endforeach

            <button type="submit"class="form-control fw-bold fs-5 btn btn-sm w-50 mt-5 mx-auto d-block" style="background: #E9E000;">SAVE</button>
        </section>
    </form>
</div>
@endsection
