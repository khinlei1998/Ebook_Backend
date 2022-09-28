@extends('layouts.maintemplades')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category Update Foam</h1>
          </div>
         
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
        
            <form  action="{{route('admin.category.update',$categories->id)}}" method="POST" >
                @method('PATCH')
                @csrf
                <div class="mb-3">
                  <label  class="form-label">Name</label>
                  <input type="text" class="form-control" name="name"value="{{$categories->name}}" >
                  @error('name')
                  <div class="text-danger" style="">{{ $message }}</div>
                  @enderror
                </div>
               
               
                <button type="submit" class="btn btn-primary">Update</button>
              </form>
        </div>
      </div>
    </div>
  </div>
@endsection