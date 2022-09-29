@extends('layouts.maintemplades')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Author Edit Form</h1>
          </div>
         
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
        
            <form  enctype="multipart/form-data" action="{{route('admin.authors.update',$author->id)}}" method="POST" >
                @method('PATCH')
                @csrf
                <div class="mb-3">
                  <label  class="form-label">Name</label>
                  <input type="text" class="form-control" name="name"value="{{$author->name}}" >
                </div>

                <div class="mb-3">
                  <label  class="form-label">Image</label>
                  <input type="file" name="image" class="form-control" >
                    <img src="{{$author->image}}" class="img-fluid" style="width: 150px; height:150px">
                    <input type="hidden" name="oldimg" value="{{$author->image}}">
                    @error('image')
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