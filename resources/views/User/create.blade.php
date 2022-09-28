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
        
            <form  action="{{route('admin.users.store')}}" method="POST" >
                @csrf
                <div class="mb-3">
                  <label  class="form-label">Name</label>
                  <input type="text" class="form-control" name="name" >
                  @error('name')
                  <div class="text-danger" style="">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label  class="form-label">Phone Number</label>
                  <input name="phone_number" type="text" class="form-control" >
                  @error('phone_number')
                  <div class="text-danger" style="">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                    <label  class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" >
                    @error('password')
                    <div class="text-danger" style="">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label  class="form-label">Email</label>
                    <input name="email" type="text" class="form-control" >
                    @error('email')
                    <div class="text-danger" style="">{{ $message }}</div>
                    @enderror
                  </div>
               
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection