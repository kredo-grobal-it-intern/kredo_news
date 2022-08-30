@extends('layouts.admin')

@section('title', 'Admin News List')
    
@section('content')
<div class="container px-5">

  <table class="table">
    <thead >
      <tr>
        <th style="width:1%;">No.</th>
        <th style="width:30%;">Image</th>
        <th style="width:30%;">Title</th>
        <th style="width:20%;">Username</th>
        <th style="width:10%;">Comment</th>
        <th style="width:10%;">Status</th>
        <th style="width:9%;"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td></td>
        <td><img src="" alt="" style="object-fit:cover;"></td>
        <td><a href="" class="text-decoration-none text-black"></a></td>
        <td>username</td>
        <td>comment</td>
        <td>Active <br> or <br> Deactive</td>
        <td>        
          <button class="btn shadow-none">Activate <br> or <br>Deactivate</button>
        </td>
        </tr>
        
      </tbody>
    </table>
    {{-- @include('admin.users.modal.status') --}}
    {{-- {{ $all_news->links() }} --}}
  </div>

  <!-- Button trigger modal -->

  
  <!-- Modal -->

  

@endsection