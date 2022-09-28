@extends('layouts.maintemplades')
@section('content')
@if(Session::has('notification'))
<div class="row notification">
<div class="col-md-8">
</div>
<div class="alert alert-success col-md-4"role="alert">
 {{Session::get('notification')}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
@endif
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">SubCategory Management</h1>
            <a href="{{route('admin.subcategory.create')}}"  class="btn btn-primary btn-circle btnadd" style="float: right" >Add SubCategory</a>
          </div>
         
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Sub Category Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php 
                    $i = 1;
                  @endphp
                 
                   @foreach($subcategories as $subcategory)
                  <tr>
                   <td>{{$i++}}</td>
                    <td>{{$subcategory->sub_category_name}}</td>
                    <td>{{$subcategory->category->name}}</td>
                    <td>
                        <a href="{{route('admin.subcategory.edit', $subcategory->id)}}" style=""class="btn btn-success"><i class="fas fa-pencil-alt"></i> &nbsp; Edit
                          </a>
                          <form style="float:left" action="{{route('admin.subcategory.destroy',$subcategory->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> &nbsp;Delete </button>
                        </form>
                      </td>
                  </tr>
                  @endforeach
                 
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Sub Category Name</th>
                        <th scope="col">Action</th>
                      </tr>
                  </tfoot>
              </table>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      
    </div>
    <div style="float:right;">{{ $subcategories->links() }}</div>


    


    <!-- /.content -->
  </div>
@endsection