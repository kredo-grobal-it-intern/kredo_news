@extends('layouts.app')
@section('title','NEWS')
@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card ms-5 border-0 bg-transparent">
            <div class="card-header bg-transparent border-bottom-0">
{{-- ------------------------------------News section--------------------------------------- --}}
                <h1 class="text-decoration-underline fw-bold"> {{$news->title}}</h1>
                <div class="row m-0 py-0">
                    <p>News site: {{$news->source_name}}</p>
                </div>
                <div class="row m-0 py-0">
                    <p>Published: {{$news->published_at}}</p>
                </div>
                <div class="row m-0 py-0">
                   <p class="fw-bold"> {{$news->author}}</p>
                </div>
            </div>

            <div class="card-body justify-content-center mx-auto">
                <img src="{{ asset('storage/images/' . $news->image_path) }}" alt="">
                <p>caption for image? description?</p>
                <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum nisi fugiat ad similique et placeat neque. Aliquam nulla odit assumenda dignissimos sit quibusdam, optio ab delectus maxime fugit esse adipisci.
                </p>
                <p>
                    URL: {{$news->url}}
                </p>
{{-- ----------------------------------Comment section------------------------- --}}
                <div class="fw-bold mt-5"> Comment</div>
                {{-- @foreach() --}}
                <div class="row mt-3">
                    <div class="col-2">
                        {{-- avatar --}}
                        <i class="fa-solid fa-circle-user text-secondary d-block text-center profile-icon"></i>
                    </div>
                    <div class="col-9">
                    {{-- comment --}}
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore, deleniti.
                    </div>
                    <div class="col-1 pe-2">
                        <i class="fa-solid fa-ellipsis"></i>
                        <i class="fa-solid fa-thumbs-up">100</i>
                    </div>
                </div>
                {{-- @endforeach --}}
                <hr>
                <div class="row mt-3">
                    <div class="col-2">
                        {{-- avatar --}}
                        <i class="fa-solid fa-circle-user text-secondary d-block text-center profile-icon"></i>
                    </div>
                    <div class="col-9">
                    {{-- comment --}}
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore, deleniti.
                    </div>
                    <div class="col-1 pe-2">
                        <i class="fa-solid fa-ellipsis"></i>
                        <i class="fa-solid fa-thumbs-up">100</i>
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    <div class="col-2">
                        {{-- avatar --}}
                        <i class="fa-solid fa-circle-user text-secondary d-block text-center profile-icon"></i>
                    </div>
                    <div class="col-9">
                    {{-- comment --}}
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore, deleniti.
                    </div>
                    <div class="col-1 pe-2">
                        <i class="fa-solid fa-ellipsis"></i>
                        <i class="fa-solid fa-thumbs-up">100</i>
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    <div class="col-2">
                        {{-- avatar --}}
                        <i class="fa-solid fa-circle-user text-secondary d-block text-center profile-icon"></i>
                    </div>
                    <div class="col-9">
                    {{-- comment --}}
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore, deleniti.
                    </div>
                    <div class="col-1 pe-2">
                        <i class="fa-solid fa-ellipsis"></i>
                        <i class="fa-solid fa-thumbs-up">100</i>
                    </div>
                </div>
                <form action="#">
                    <div class="mb-3 mt-5">
                    <label for="comment" class="fw-bold text-dark">Comment</label>
                    <textarea class="form-control mt-3" name="" id="" rows="3"></textarea>
                    <button type="submit" class="btn btn-outline-secondary btn-sm mt-2 float-end">Post Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{-- ------------------------------------Right side--------------------------------------- --}}
    <div class="col-4">
        <div class="card-body me-3">
{{--  -----------------------------------Whats hot--------------------- --}}
        <hr>
          <h2 class="fw-bold text-decoration-underline">What's Hot</h2>
        <hr>
          {{-- @foreach ( as ) --}}
             <div class="row">
                <div class="col-5 my-auto mx-auto ps-4">
                    <img src="{{ asset('storage/images/' . $news->image_path) }}" alt="" style="width:100px">
                </div>
                <div class="col-7">
                    <p class="fw-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit possimus cum tempora</p>
                    <div class="float-end me-3">
                        <i class="fa-solid fa-thumbs-up">100</i>
                        <i class="fa-solid fa-thumbs-down">50</i>
                        <i class="fa-solid fa-comment-dots">70</i>
                    </div>
                </div>
             </div>
             <hr>
             <div class="row">
                <div class="col-5 my-auto mx-auto ps-4">
                    <img src="{{ asset('storage/images/' . $news->image_path) }}" alt="" style="width:100px">
                </div>
                <div class="col-7">
                    <p class="fw-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit possimus cum tempora</p>
                    <div class="float-end me-3">
                        <i class="fa-solid fa-thumbs-up">100</i>
                        <i class="fa-solid fa-thumbs-down">50</i>
                        <i class="fa-solid fa-comment-dots">70</i>
                    </div>
                </div>
             </div>
             <hr>
             <div class="row">
                <div class="col-5 my-auto mx-auto ps-4">
                    <img src="{{ asset('storage/images/' . $news->image_path) }}" alt="" style="width:100px">
                </div>
                <div class="col-7">
                    <p class="fw-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit possimus cum tempora</p>
                    <div class="float-end me-3">
                        <i class="fa-solid fa-thumbs-up">100</i>
                        <i class="fa-solid fa-thumbs-down">50</i>
                        <i class="fa-solid fa-comment-dots">70</i>
                    </div>
                </div>
             </div>
          {{-- @endforeach --}}
          <hr>
{{-- ----------------------------------latest in--------------------------------------------- --}}
          <hr>
            <h2 class="fw-bold text-decoration-underline">Latest In <span class="fw-bold">{{$news->source_name}}</span></h2>
          <hr>
          <div class="row">
            <div class="col">
                <p class="text-decoration-underline fw-bold"> {{$news->title}}</p>
                <div class="float-end me-3">
                    <i class="fa-solid fa-thumbs-up">100</i>
                    <i class="fa-solid fa-thumbs-down">50</i>
                    <i class="fa-solid fa-comment-dots">70</i>
                </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col">
                <p class="text-decoration-underline fw-bold"> {{$news->title}}</p>
                <div class="float-end me-3">
                    <i class="fa-solid fa-thumbs-up">100</i>
                    <i class="fa-solid fa-thumbs-down">50</i>
                    <i class="fa-solid fa-comment-dots">70</i>
                </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col">
                <p class="text-decoration-underline fw-bold"> {{$news->title}}</p>
                <div class="float-end me-3">
                    <i class="fa-solid fa-thumbs-up">100</i>
                    <i class="fa-solid fa-thumbs-down">50</i>
                    <i class="fa-solid fa-comment-dots">70</i>
                </div>
            </div>
          </div>
          <hr>
        </div>
    </div>
</div>
@endsection
