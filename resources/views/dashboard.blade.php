@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Employees Stats</h4>
              <p class="card-category">New employees to this day</p>
            </div>
            <div class="card-body table-responsive">
              <table class="table table-hover">
                <thead class="text-primary">
                  <th>No.</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Address</th>
                  <th>Updated at</th>
                </thead>
                <tbody>
                  @foreach($employee as $key => $employees)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$employees->name}}</td>
                    <td>{{$employees->employeeRole->name}}</td>
                    <td>{{$employees->address}}</td>
                    <td>{{$employees->created_at->diffForHumans()}}</td>
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
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush