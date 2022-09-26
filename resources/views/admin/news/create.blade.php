@extends('layouts.admin')

@section('title', 'Create News')

@section('content')
    <div class="container w-75">
        <form action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="title" class="form-label fs-4">■Title</label>
        <textarea name="title" id="title" cols="30" rows="2" class="form-control">{{ old('title') }}</textarea>
        @error('title')
        <p class="text-danger small">{{ $message }}</p>
        @enderror  

        <label for="description" class="form-label fs-4 mt-3">■Description</label>
        <textarea name="description" id="description" cols="30" rows="2" class="form-control">{{ old('description') }}</textarea>
        @error('description')
        <p class="text-danger small mb-4">{{ $message }}</p>
        @enderror  

        <h1 class="fs-4 mt-4">■About News</h1>
        <div class="row">
            <div class="col-6">
                <div class="form-group row mt-2 ms-2">
                    <label for="category-id" class="col-form-label col-3">Category:</label>
                    <div class="col-9 ps-0">            
                    <select name="category_id" id="category-id" class="form-select">
                        <option value=""></option>
                        @foreach ($categories as $category) 
                        <option value="{{ $category->id }}" >{{ $category->name }}</option>
                            
                        @endforeach
                    </select>
        
                    @error('country_id')
                    <p class="text-danger small">{{ $message }}</p>
                    @enderror  
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group row mt-2 ms-2">
                    <label for="country-id" class="col-form-label col-3">Country:</label>
                    <div class="col-9 ps-0">            
                    <select name="country_id" id="country-id" class="form-select">
                        <option value=""></option>
                        @foreach ($countries as $country) 
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                            
                        @endforeach
                    </select>
        
                    @error('country_id')
                    <p class="text-danger small">{{ $message }}</p>
                    @enderror  
                    </div>
                </div>
            </div>
        </div>

        <h1 class="fs-4 mt-4">■Published Information</h1>
        <div class="row">

            <div class="col-6">
                <div class="form-group row mt-2 ms-2">
                    <label for="source-id" class="col-form-label col-3">News site:</label>
                    <div class="col-9 ps-0">            
                    <select name="source_id" id="source-id" class="form-select">
                        <option value=""></option>
                        @foreach ($all_media as $media) 
                        <option value="{{ $media->id }}">{{ $media->name }}</option>
                            
                        @endforeach
                    </select>

                    @error('source_id')
                    <p class="text-danger small">{{ $message }}</p>
                    @enderror  
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group row mt-2 ms-2">
                    <label for="url" class="col-form-label col-3">URL:</label>
                    <div class="col-9 ps-0">
                    <input type="text" name="url" id="url" class="form-control" value="{{ old('url') }}">
                    @error('url')
                    <p class="text-danger small">{{ $message }}</p>
                    @enderror  
                    </div>
                </div>
        
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group row mt-2 ms-2">
                    <label for="published-at" class="col-form-label col-3">Published:</label>
                    <div class="col-9 ps-0">
                    <input type="date" name="published_at" id="published-at" class="form-control" value="{{ old('published_at') }}">
                    @error('published_at')
                    <p class="text-danger small">{{ $message }}</p>
                    @enderror  
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group row mt-2 ms-2">
                    <label for="author" class="col-form-label col-3">Author:</label>
                    <div class="col-9 ps-0">
                    <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}">
                    @error('author')
                    <p class="text-danger small">{{ $message }}</p>
                    @enderror  
                    </div>
                </div>
            </div>
        </div>
        
        <label for="image" class="form-label mt-4 fs-4 ">■Image</label>
        <input type="file" name="image" id="image" class="d-block ms-3">
        @error('image')
        <p class="text-danger small ms-3">{{ $message }}</p>
        @enderror  

        <label for="content" class="form-label mt-4 fs-4">■Content</label>        
        @error('content')
        <p class="text-danger small">{{ $message }}</p>
        @enderror  
        <textarea id="myeditorinstance" name="content">{{ old('content') }}</textarea>
        <button type="submit" class="btn btn-primary w-50 mt-2 mx-auto d-block">Save</button>
        </form>

        
    </div>
@endsection
