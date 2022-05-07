@extends('layouts/admin.app')
@section('content')
<div class="content">
        <br><br><br><br><br>

        <div class="container">

            <div class="content-header">
                <div class="content-header-labels">
                <form method="POST" class="my-login-validation" autocomplete="off"  action="{{ route('adminDepartments') }}">
                    
                </div>

                <div class="form-group">
									<label for="department_name">Department</label>
									<input id="department_name" type="text"class="content-header-select" name="department_name"  placeholder="Enter Department Name" value="{{ old('department_name') }}">
									<span class="text-danger">@error('department_name'){{ $message }}@enderror</span>
								</div>

                              
                    
                
                    <button type ="submit" class="btn btn-success">Add</button>
                </div>
            </div>

                <div class="panel panel-primary" style="border-color:#75a3a3;">
                    <div class="panel-heading" style="background-color:#005450;">
                        <h6 class="panel-title">Report</h6>
                    </div>
                    <table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Department</th>
      <th>Edit</th>
      <th>Delete</th>
   
    </tr>
  </thead>
  <tbody>
    
    <tr>
     
      <td>
        <p class="fw-normal mb-1">Consultant</p>
        <p class="text-muted mb-0">Finance</p>
      </td>
      <td>
      <button type="button" class="btn btn-primary">Primary</button>
      </td>
      <td><button type="button" class="btn btn-danger">Danger</button></td>
     
      
    </tr>
   
  </tbody>
</table>


 
@endsection