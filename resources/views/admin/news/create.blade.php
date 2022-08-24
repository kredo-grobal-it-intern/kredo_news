@extends('layouts.admin')


@section('title', 'Create News')

@section('content')
  <div class="container w-50">
    <form action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
      @csrf

      <label for="title" class="form-label fs-4">■Title</label>
      <textarea name="title" id="title" cols="30" rows="2" class="form-control">{{ old('title') }}</textarea>
      @error('title')
      <p class="text-danger small">Title is required.</p>
      @enderror  

      <label for="description" class="form-label fs-4 mt-3">■Description</label>
      <textarea name="description" id="description" cols="30" rows="2" class="form-control">{{ old('description') }}</textarea>
      @error('description')
      <p class="text-danger small mb-4">Description is required.</p>
      @enderror  

      <h1 class="fs-4 mt-3">■Published Information</h1>
      <div class="form-group row mt-2 ms-2">
        <label for="source-name" class="col-form-label col-2">News site:</label>
        <div class="col-10 ps-0">
          <input type="text" name="source_name" id="source-name" class="form-control w-50" value="{{ old('source_name') }}">
          @error('source_name')
          <p class="text-danger small">News site is required.</p>
          @enderror  
        </div>
      </div>

      <div class="form-group row mt-2 ms-2">
        <label for="url" class="col-form-label col-2">URL:</label>
        <div class="col-10 ps-0">
          <input type="text" name="url" id="url" class="form-control col-10  w-50" value="{{ old('url') }}">
          @error('url')
          <p class="text-danger small">URL is required.</p>
          @enderror  
        </div>
      </div>

      <div class="form-group row mt-2 ms-2">
        <label for="published-at" class="col-form-label col-2">Published:</label>
        <div class="col-10 ps-0">
          <input type="date" name="published_at" id="published-at" class="form-control col-10  w-50" value="{{ old('published_at') }}">
          @error('published_at')
          <p class="text-danger small">Published is required.</p>
          @enderror  
        </div>
      </div>

      <div class="form-group row mt-2 ms-2">
        <label for="author" class="col-form-label col-2">Author:</label>
        <div class="col-10 ps-0">
          <input type="text" name="author" id="author" class="form-control col-10  w-50" value="{{ old('author') }}">
          @error('author')
          <p class="text-danger small">Author is required.</p>
          @enderror  
        </div>
      </div>

      
      <label for="image-path" class="form-label mt-4 fs-4 ">■Image</label>
      <input type="file" name="image_path" id="image-path" class="d-block ms-3">
      @error('image_path')
      <p class="text-danger small ms-3">Image is required.</p>
      @enderror  

      <label for="content" class="form-label mt-4 fs-4">■Content</label>
      <textarea name="content" id="content" cols="30" rows="20" class="form-control">{{ old('content') }}</textarea>
      @error('content')
      <p class="text-danger small">Content is required.</p>
      @enderror  

      <button type="submit" class="btn btn-primary w-50 mt-2 mx-auto d-block">Save</button>
    </form>

    
  </div>
@endsection

