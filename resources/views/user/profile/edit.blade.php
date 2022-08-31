@extends('layouts.app')
@section('title','NEWS')
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
            <div class="multiselect mt-5">
            <div class="selectBox" onclick="showCheckboxes()">
                <select>
                <option>Select Your Favorite Country</option>
                </select>
                <div class="overSelect"></div>
            </div>
            <div id="checkboxes">
                <p class="fw-bold">America</p>
                <div class="ms-3">
                    <label for="America"><input type="checkbox" id="country" />America</label>
                    <label for="Canada"><input type="checkbox" id="country" />Canada</label>
                    <label for="mexico"><input type="checkbox" id="country" />Mexico</label>
                    <label for="cuba"><input type="checkbox" id="country" />Cuba</label>
                    <label for="Panama"><input type="checkbox" id="country" />Panama</label>
                    <label for="brazil"><input type="checkbox" id="countryl" />Brazil</label>
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
            </div>
<button type="submit" class="form-control btn btn-outline-secondary mt-5">UPDATE</button>

    </form>
</div>
@endsection

<style>
.multiselect {
    width: 550px;
    margin-left:17%;
  }

  .selectBox select {
    width: 80%;
    height:40px;
    font-weight: bold;
    color: 686666;
    opacity:0.5;
    border-radius: 8px;

  }

  .overSelect {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
  }
  .profile_head{
    height:100px;
    /* border:solid black 1px; */
    padding:15px
    }
  .favorite{
    color:white;
    background-color: #052962;
  }


  #checkboxes {
    display: none;
    border: 1px #dadada solid;
    opacity: 0.8;
  }

  #checkboxes label {
    display: block;
  }

  #checkboxes label:hover {
    background-color: #052962;
    color:white;
  }

</style>

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