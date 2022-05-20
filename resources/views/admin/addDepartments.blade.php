@extends('layouts/admin.app')
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>E-Exam</title>
    <!--start admin base-->
    <link rel="stylesheet" href="{{ asset('css/AdminBase.css') }}" />
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css') }}">
    <!--end admin base-->

    <link href="{{ asset('https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css') }}" rel="stylesheet" id="{{ asset('bootstrap-css') }}">
    <script src="{{ asset('https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('https://code.jquery.com/jquery-1.11.1.min.js') }}"></script>

    <style>
   body{
            background-color:#F0F0F0;
        }

        a:link {
            text-decoration: none;
        }

        h6 {
            text-align: center;
        }

        .row {
            margin: 100px;
        }

        .content-header-labels{
            font-size:20px;
            margin-bottom:10px;
            color:#484848;
        }

        .content-header-select{
            margin-bottom:20px;
        }

        .content-header-btn{
            margin-bottom:150px;
            
        }

        .content-header-labels label{
            margin-right:400px;
        }

        .content-header-select select,input{
            width:200px;
            padding:5px;
            background-color:white;
            border-radius:5px;
            border:1px solid #75a3a3;
            margin-right:80px;
            
        }
        
        .content-header-btn button{
            float:right;
            padding:10px;
            width:110px;
            margin-right:30px;
            background-color:#005450;
            color:white;
            border:1px solid #75a3a3;
            border-radius:5px;
            font-weight:bold;
        }

        .content-header-select input{
            margin-left:173px;
        }
    </style>

</head>
<body>
@section('content')
<div class="content">
        <br><br><br><br><br>

        <div class="container">

            <div class="content-header">
                <div class="content-header-labels">
                <form method="POST" class="my-login-validation" autocomplete="off"  action="{{ route('adminDepartments') }}">
                @csrf
                </div>

                <div class="form-group">
									<label for="department_id">Department</label>
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
                    <div class="container">
                    <table class="table align-middle mb-0 bg-white">
  <thead class="bg-light">
    <tr>
      <th>Department</th>
      <th>Edit</th>
      <th>Delete</th>
   
    </tr>
  </thead>
  <tbody>
    @foreach($departments as $department)
    <tr>
     
      <td id="{{$department->id}}">
        <p class="fw-normal mb-1">{{$department->department_name}}</p>
       
      </td>
      <td>
   
      <a href="{{url('admin/edit/'.$department -> d)}}" class="btn btn-primary">Edit</a>
      </td>
      <td>
      
    <a href="{{route('admindepartmentdelete',$department->id)}}" class="btn btn-danger"> delete</a>
    </td>


      
    </tr>
    @endforeach
   
  </tbody>
</table>

</div>

 
@endsection