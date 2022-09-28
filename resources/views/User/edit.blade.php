@extends('layouts.maintemplades')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Create Foam</h1>
          </div>
         
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
        
            <form  action="{{route('admin.users.update',$users->id)}}" method="POST" >
                @method('PATCH')
                @csrf
                <div class="mb-3">
                  <label  class="form-label">Name</label>
                  <input type="text" class="form-control" name="name"value="{{$users->name}}" >
                </div>
                <div class="mb-3">
                  <label  class="form-label">Phone Number</label>
                  <input name="phone_number" type="text" class="form-control" value="{{$users->phone_number}}" >
                </div>

                {{-- <div class="mb-3">
                    <label  class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" value="{{$users->name}}" >
                  </div> --}}

                  <div class="mb-3">
                    <label  class="form-label">Email</label>
                    <input name="email" type="text" class="form-control" value="{{$users->email}}" >
                  </div>
               
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection