@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Create Foam</h1>
          </div>
         
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        
            <form>
                <div class="mb-3">
                  <label  class="form-label">Name</label>
                  <input type="email" class="form-control" >
                </div>
                <div class="mb-3">
                  <label  class="form-label">Phone Number</label>
                  <input type="password" class="form-control" >
                </div>

                <div class="mb-3">
                    <label  class="form-label">Password</label>
                    <input type="password" class="form-control" >
                  </div>

                  <div class="mb-3">
                    <label  class="form-label">Email</label>
                    <input type="password" class="form-control" >
                  </div>
               
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
@endsection