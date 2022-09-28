@extends('layouts.maintemplades')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">SubCategory Update Foam</h1>
          </div>
         
        </div>
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="row">        
            <form  action="{{route('admin.subcategory.update',$subcategories->id)}}" method="POST" >
                @method('PATCH')
                @csrf
                <div class="mb-3">
                  <label  class="form-label">Cateogry Name</label>
                  <input type="text" class="form-control" name="sub_category_name"value="{{$subcategories->sub_category_name}}" >
                  @error('sub_category_name')
                  <div class="text-danger" style="">{{ $message }}</div>
                  @enderror
                </div>


                <div class="mb-3">
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                        <option value ="{{$category->id}}">
                        @if($subcategories->category_id== $category->id)	
                        @endif
                        {{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
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