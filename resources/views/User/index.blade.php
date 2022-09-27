@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Management</h1>
            <a href="{{route('users.create')}}"  class="btn btn-primary btn-circle btnadd" >Add User</a>
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
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>023232</td>
                    <td>gg@gmal.com</td>
                    <td>
                        <a href="#" style=""class="btn btn-success"><i class="fas fa-pencil-alt"></i> &nbsp; Edit
                          </a>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> &nbsp;Delete </button>
                    
                      </td>
                  </tr>
                 
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
    <!-- /.content -->
  </div>
@endsection