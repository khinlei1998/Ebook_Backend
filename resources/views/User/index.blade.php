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
            <h1 class="m-0">User Management</h1>
            <a href="{{route('admin.users.create')}}"  class="btn btn-primary btn-circle btnadd" style="float: right" >Add User</a>
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
                    <th scope="col">Name</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Gmail</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php 
                    $i = 1;
                  @endphp
                 
                   @foreach($users as $user)
                  <tr>
                   <td>{{$i++}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a href="{{route('admin.users.edit', $user->id)}}" style=""class="btn btn-success"><i class="fas fa-pencil-alt"></i> &nbsp; Edit
                          </a>
                          <form style="float:left" action="{{route('admin.users.destroy',$user->id)}}" method="post">
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
                        <th scope="col">Name</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Gmail</th>
                        <th scope="col">Action</th>
                      </tr>
                  </tfoot>
              </table>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
      
    </div>
    <div style="float:right;">{{ $users->links() }}</div>


    


    <!-- /.content -->
  </div>
@endsection