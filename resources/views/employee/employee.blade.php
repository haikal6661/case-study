@extends('layouts.app', ['activePage' => 'employee', 'titlePage' => __('Employee Management')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Employee List</h4>
            <p class="card-category"> View and edit your employee here</p>
          </div>
          <div class="card-body">
            <a href="{{url('/add_employee')}}" class="btn btn-success" role="button" style="float: right;">Add Employee</a>
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>No.</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Address</th>
                  <th style="text-align: center">Action</th>
                </thead>
                <tbody>
                  @foreach($employee as $key => $employees)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$employees->name}}</td>
                    <td></td>
                    <td>{{$employees->address}}</td>
                    <td style="text-align: center;width:20%;"><a href="" class="btn btn-success btn-sm" role="button" title="Edit"><img src="{{asset('storage/pencil-fill.svg')}}" alt="Edit"></a>
                      {{-- <a href="{{url('view_ahli/'.$user['id'])}}" class="btn btn-info btn-sm" role="button" title="View"><img src="{{asset('storage/eye-fill.svg')}}" alt="View"></a> --}}
                      <a href="" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger btn-sm" role="button" title="Delete"><img src="{{asset('storage/trash-fill.svg')}}" alt="Delete"></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection