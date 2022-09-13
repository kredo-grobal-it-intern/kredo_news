@extends('layouts.app')

@section('title', 'My Test Editor page')

@section('script-footer')
    <script src="{{ mix('js/editor.js') }}"></script>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row ">
        <div class="flex flex-col space-y-2">
            <!-- <label for="editor" class="text-gray-600 font-semibold">Content</label> -->
            <div id="editor"><div>
        </div>
    </div>
  </div>
</div>
@endsection
