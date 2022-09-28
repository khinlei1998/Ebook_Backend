@extends('layouts.maintemplades')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Author Management</h1>
          </div>
          <div class="col-sm-6">
            <a href="{{route('admin.authors.create')}}"  class="btn btn-primary btn-circle btnadd" style="float: right;">Add Author</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        @if($authors->isEmpty())
            <div class="well text-center">No records were found.</div>
        @else
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @php 
                    $i = 1;
                @endphp
                 
                @foreach($authors as $author)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$author->name}}</td>
                    <td>
                        <a href="{{route('admin.authors.edit', $author->id)}}" style="" class="btn btn-success"><i class="fas fa-pencil-alt"></i> &nbsp; Edit
                          </a>
                          <form style="float:left" action="{{route('admin.authors.destroy',$author->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> &nbsp;Delete </button>
                        </form>
                    </td>
                  </tr>
                @endforeach
                 
                </tbody>
              </table>
        @endif
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection