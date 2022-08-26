@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
        <div class="row justify-content-center">
          <div class="col-3">
            <div class="card text-center py-4 fs-2">
              <div class="card-body">100</div>
              <div class="card-footer bg-white">
                <a href="{{ route('admin.news.create') }}" class="text-decoration-none text-black">Update News</a>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card text-center py-4 fs-2">
              <div class="card-body">100</div>
              <div class="card-footer bg-white">
                <a href="" class="text-decoration-none text-black">Users</a>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card text-center py-4 fs-2">
              <div class="card-body">100</div>
              <div class="card-footer bg-white">
                <a href="" class="text-decoration-none text-black">Subscribers</a>
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center mt-4">
          <div class="col-3">
            <div class="card text-center py-4 fs-2">
              <div class="card-body">100</div>
              <div class="card-footer bg-white">
                <a href="" class="text-decoration-none text-black">Scheduled news</a>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class="card text-center py-4 fs-2">
              <div class="card-body">100</div>
              <div class="card-footer bg-white">
                <a href="" class="text-decoration-none text-black">Comments</a>
              </div>
            </div>
          </div>
          <div class="col-3"></div>
        </div>

    
@endsection