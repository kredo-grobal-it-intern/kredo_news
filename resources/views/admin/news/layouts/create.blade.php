<div class="container container-width mt-4">
    @if (request()->is('admin/news/create'))
        <form action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
    @else
        <form action="{{ route('admin.news.update', $news->id) }}" method="post" enctype="multipart/form-data">
        @method('PATCH')
    @endif

    @csrf

    <label for="title" class="form-label fs-4">■Title</label>
    <textarea name="title" id="title" cols="30" rows="2" class="form-control">{{ request()->is('admin/news/create') ?  old('title') : old('title', $news->title) }}</textarea>
    @error('title')
    <p class="text-danger small">{{ $message }}</p>
    @enderror  

    <label for="description" class="form-label fs-4 mt-3">■Description</label>
    <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{ request()->is('admin/news/create') ?  old('description') : old('description', $news->description) }}</textarea>
    @error('description')
    <p class="text-danger small mb-4">{{ $message }}</p>
    @enderror  

    <h1 class="fs-4 mt-5">■About News</h1>
    <div class="row">
        <div class="col-12 col-md-6 publish-col">
                <label for="category-id" class="form-label label-width">Category:</label>
                <select name="category_id" id="category-id" class="form-select form-width select-size">
                    @if (request()->is('admin/news/create'))
                    <option value="">-- Choose category --</option>
                    @else
                    <option value="{{ old('category_id', $news->category->id) }}">{{ $news->category->name }}</option>
                    @endif

                    @foreach ($categories as $category) 
                    <option value="{{ $category->id }}" >{{ $category->name }}</option>
                        
                    @endforeach
                </select>
    
                @error('country_id')
                <p class="text-danger small">{{ $message }}</p>
                @enderror  
        </div>
        <div class="col-12 col-md-6 publish-col">
                <label for="country-id" class="form-label label-width">Country:</label>
                <select name="country_id" id="country-id" class="form-select form-width select-size">
                    @if (request()->is('admin/news/create'))
                    <option value="">-- Choose country  --</option>
                    @else
                    <option value="{{ old('country_id', $news->country->id) }}">{{ $news->country->name }}</option>
                    @endif

                    @foreach ($countries as $country) 
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                        
                    @endforeach
                </select>
    
                @error('country_id')
                <p class="text-danger small">{{ $message }}</p>
                @enderror  
        </div>
    </div>

    <h1 class="fs-4 mt-5">■Published Information</h1>
    <div class="row">
        <div class="col-12 col-md-6 publish-col">
            <label for="source-id" class="form-label label-width text-nowrap">Media:</label>
            <select name="source_id" id="source-id" class="form-select form-width select-size">
                @if (request()->is('admin/news/create'))
                <option value="">-- Choose media  --</option>
                @else
                <option value="{{ old('source_id', $news->source->id) }}">{{ $news->source->country->name }}</option>
                @endif

                @foreach ($all_media as $media) 
                <option value="{{ $media->id }}">{{ $media->name }}</option>
                    
                @endforeach
            </select>

            @error('source_id')
            <p class="text-danger small">{{ $message }}</p>
            @enderror  
        </div>
        <div class="col-12 col-md-6 publish-col">
            <label for="url" class="form-label label-width">URL:</label>
            <input type="text" name="url" id="url" class="form-control form-width" value="{{ request()->is('admin/news/create') ? old('url') : old('url', $news->url) }}">
            {{-- @error('url')
            <p class="text-danger small">{{ $message }}</p>
            @enderror   --}}
        </div>
        <div class="col-12 col-md-6 publish-col">
            <label for="published-at" class="form-label label-width">Published:</label>
            <input type="date" name="published_at" id="published-at" class="form-control form-width" value="{{ request()->is('admin/news/create') ?  old('published_at') : old('published_at', $news->published_at)}}">
            {{-- @error('published_at')
            <p class="text-danger small">{{ $message }}</p>
            @enderror   --}}
        </div>
    
        <div class="col-12 col-md-6 publish-col">
            <label for="author" class="form-label label-width">Author:</label>
            <input type="text" name="author" id="author" class="form-control form-width" value="{{ request()->is('admin/news/create') ?  old('author') : old('author', $news->author)}}">
            {{-- @error('author')
            <p class="text-danger small">{{ $message }}</p>
            @enderror   --}}
        </div>
    </div>
    
    <label for="image" class="form-label mt-5 fs-4 d-block">■Image</label>
    @if (request()->is('admin/news/edit/*'))
            <img src="{{ asset('images/countries/' . $news->image) }}" alt="{{ $news->image }}" class="w-50 d-block mb-3 ms-3">
    @endif
    <label class="px-2 text-center upload-icon fs-6 ms-3">
        <input type="file" name="image" class="upload-input">
        <i class="fa fa-cloud-upload"></i> Upload iamge
    </label>


    {{-- @error('image')
    <p class="text-danger small ms-3">{{ $message }}</p>
    @enderror   --}}
    <label for="content" class="form-label mt-5 fs-4 d-block">■Content</label>    
    
    {{-- @error('content')
    <p class="text-danger small">{{ $message }}</p>
    @enderror   --}}
    {{-- <textarea id="myeditorinstance" name="content">{{ request()->is('admin/news/create') ?  old('content') :  old('content', $news->content)}}</textarea> --}}
    <div id="editor"></div>
    {{-- <div id="editor-error" class="alert alert-danger d-none" role="alert">
        A simple danger alert—check it out!
    </div> --}}

    @if (request()->is('admin/news/create'))
        <button type="submit" class="btn btn-primary w-50 mt-4 mb-5 mx-auto d-block">Save</button>
    @else
        <button type="submit" class="btn btn-warning w-50 mt-4 mb-5 mx-auto d-block">Update</button>
    @endif

    </form>

    
</div>

