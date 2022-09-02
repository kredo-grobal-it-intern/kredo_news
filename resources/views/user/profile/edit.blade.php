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
        <p class="fw-bold">America</p>
            <div>
                @foreach ($countries as $country)
                    {{-- @if ( {{$country->continent}} == "america" ) --}}
                        <div class="form-check form-check-inline">
                            <label for="{{$country->name}}-{{$country->id}}" class="form-check-label"><input type="checkbox" id="{{$country->name}}-{{$country->id}}" name="{{$country->name}}-{{$country->id}}" class="form-check-input" />{{$country->name}}</label>
                        </div>
                    {{-- @endif --}}
                @endforeach
            </div>

            {{-- <div class="multiselect mt-5">
            <div class="selectBox" onclick="showCheckboxes()">
                <select>
                <option>Select Your Favorite Country</option>
                </select>
                <div class="overSelect"></div>
            </div>
            <div id="checkboxes">
                <p class="fw-bold">America</p>
                <div class="ms-3">
                    <label for="America"><input type="checkbox" id="america" />America</label>
                    <label for="Canada"><input type="checkbox" id="canada" />Canada</label>
                    <label for="mexico"><input type="checkbox" id="mexico" />Mexico</label>
                    <label for="cuba"><input type="checkbox" id="cuba" />Cuba</label>
                    <label for="Panama"><input type="checkbox" id="panama" />Panama</label>
                    <label for="brazil"><input type="checkbox" id="brazil" />Brazil</label>
                </div>
                <hr>
                <p class="fw-bold">Asia</p>
                <div class="ms-3">
                    <label for="japan"><input type="checkbox" id="japan" />Japan</label>
                    <label for="korea"><input type="checkbox" id="korea" />Korea</label>
                    <label for="china"><input type="checkbox" id="chine" />China</label>
                    <label for="philipines"><input type="checkbox" id="philipines" />Philipines</label>
                </div>
                <hr>
                <p class="fw-bold">Oceania</p>
                <div class="ms-3">
                    <label for="australia"><input type="checkbox" id="australia" />Australia</label>
                    <label for="newzeeland"><input type="checkbox" id="newzeeland" />New Zeeland</label>
                </div>
                <hr>
                <p class="fw-bold">Europe</p>
                <div class="ms-3">
                    <label for="norway"><input type="checkbox" id="norway" />Norway</label>
                    <label for="sweden"><input type="checkbox" id="sweden" />Sweden</label>
                </div>
                <hr>
                <p class="fw-bold">Africa</p>
                <div class="ms-3">
                    <label for="egypt"><input type="checkbox" id="egypt" />Egypt</label>
                    <label for="tunigia"><input type="checkbox" id="tunigia" />Tunigia</label>
                    <label for="southafrica"><input type="checkbox" id="southafrica" />South Africa</label>
                </div>
            </div>
            </div>  --}}
<button type="submit" class="form-control btn btn-outline-secondary mt-5">UPDATE</button>

    </form>
</div>
@endsection

<script>
var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
</script>
{{-- ---------------------------------------------------------------------- --}}
{{-- <!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>jquery-multi-select</title>
    <link rel="stylesheet" type="text/css" href="../src/example-styles.css">
    <link rel="stylesheet" type="text/css" href="demo-styles.css">
</head>
<body>

    <form class="demo-example">
        <label for="people">Select people:</label>
        <select id="people" name="people" multiple>
            <option value="alice">Alice</option>
            <option value="bob">Bob</option>
            <option value="carol">Carol</option>
        </select>
    </form>

    <form class="demo-example">
        <label for="categories">Show:</label>
        <select id="categories" name="categories" multiple>
            <option value="a">Abandoned vehicles</option>
            <option value="b">Bus stops</option>
            <option value="c">Car parking</option>
            <option value="d">Dog fouling</option>
        </select>
    </form>

    <form class="demo-example">
        <label for="ice-cream">Build an ice cream:</label>
        <select id="ice-cream" name="ice-cream" multiple>
            <option value="Cone">Just a cone</option>
            <optgroup label="Flavours">
                <option value="Vanilla">Vanilla</option>
                <option value="Chocolate">Chocolate</option>
                <option value="Pistachio">Pistachio</option>
            </optgroup>
            <optgroup label="Toppings">
                <option value="Sprinkles">Sprinkles</option>
                <option value="Chocolate chips">Chocolate chips</option>
            </optgroup>
            <optgroup label="Sauces">
                <option value="Strawberry sauce">Strawberry sauce</option>
                <option value="Chocolate sauce">Chocolate sauce</option>
            </optgroup>
        </select>
    </form>

    <div class="demo-example position-menu-within">
        <label for="line-wrap-example">Line wrap example</label>
        <select id="line-wrap-example" multiple>
            <option>The final option…</option>
            <option>Should wrap onto…</option>
            <option>Multiple lines, to avoid expanding outside the grey wrapper</option>
        </select>
    </div>

    <form class="demo-example modal-example">
        <label for="modal-example">Modal example</label>
        <select id="modal-example" name="inventors" multiple>
            <option value="al">Ada Lovelace</option>
            <option value="gh">Grace Hopper</option>
            <option value="hl">Hedy Lamarr</option>
            <option value="mk">Margaret E. Knight</option>
            <option value="sj">Shirley Ann Jackson</option>
        </select>
    </form>

    <script type="text/javascript" src="../src/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="../src/jquery.multi-select.js"></script>
    <script type="text/javascript">
    $(function(){
        $('#people').multiSelect();
        $('#ice-cream').multiSelect();
        $('#line-wrap-example').multiSelect({
            positionMenuWithin: $('.position-menu-within')
        });
        $('#categories').multiSelect({
            noneText: 'All categories',
            presets: [
                {
                    name: 'All categories',
                    all: true
                },
                {
                    name: 'My categories',
                    options: ['a', 'c']
                }
            ]
        });
        $('#modal-example').multiSelect({
            'modalHTML': '<div class="multi-select-modal">'
        });
    });
    </script>

</body>
</html> --}}