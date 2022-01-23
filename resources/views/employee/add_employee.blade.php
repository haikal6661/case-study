@extends('layouts.app', ['activePage' => 'employee', 'titlePage' => __('Employee Management')])

@section('content')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/css/jasny-bootstrap.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/4.0.0/js/jasny-bootstrap.min.js"></script>

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Add Employee</h4>
              <p class="card-category"> Enter your employee details here.</p>
            </div>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
            <div class="card-body" style="padding-left: 100px; padding-right: 100px;">
              <form action="add_employee" method="post" enctype="multipart/form-data" style="padding-top: 30px;">
                  @csrf

                  <div class="form-group">
                    <label for="nama">Name: </label>
                    <input type="text" class="form-control" name="name" placeholder="" required>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Address:</label>
                    <input type="text" class="form-control" name="address" placeholder="" required>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-success" type="submit">Add Employee</button>
                    <a href="{{ route('employee') }}" class="btn btn-danger" type="button">Back</a>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection