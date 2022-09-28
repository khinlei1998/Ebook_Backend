@extends('layouts.maintemplades')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">SubCategory Create Foam</h1>
          </div>
         
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
        
            <form  action="{{route('admin.subcategory.store')}}" method="POST" >
                @csrf
                <div class="form-group">
                  <label  class="form-label">Category Name</label>
                  <input type="text" class="form-control" name="sub_category_name" >
                  @error('sub_category_name')
                  <div class="text-danger" style="">{{ $message }}</div>
                  @enderror
                </div>


                <div class="form-group">
                    {{-- <label  class="form-label">SubCategory Name</label>
                    <input type="text" class="form-control" name="sub_category_id" >
                    @error('sub_category_id')
                    <div class="text-danger" style="">{{ $message }}</div>
                    @enderror --}}
                    <select name="category_id" class="form-control">
                      <option value="">Choose Category</option>
                        @foreach($categories as $category)
        
                        <option value ="{{$category->id}}">
                          
                          {{$category->name}}</option>
                      @endforeach
                    </select>
                </div>   
                
               
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection