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
    </style>

</head>
<body>
@section('content')
<div class="content">
        <br><br><br><br><br>

        <div class="container">

            <div class="content-header">
                <div class="content-header-labels">
                <form method="POST" class="my-login-validation" autocomplete="off"  action="{{ route('adminLevels') }}">
                @csrf
                </div>

                <div class="form-group">
									<label for="level_id">Levels</label>
									<input id="level_name" type="text"class="content-header-select" name="level_name"  placeholder="Enter level Name" value="{{ old('level_name') }}">
									<span class="text-danger">@error('level_name'){{ $message }}@enderror</span>
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
      <th>level</th>
      <th>Edit</th>
      <th>Delete</th>
   
    </tr>
  </thead>
  <tbody>
    @foreach($levels as $level)
    <tr>
     
      <td id="{{$level->id}}">
        <p class="fw-normal mb-1">{{$level->level_name}}</p>
       
      </td>
      <td>

      <a href="{{url('admin/edit/level/'.$level -> id)}}" class="btn btn-primary">Edit</a>
      </td>
      <td>
      
    <a href="{{route('adminleveldelete',$level->id)}}" class="btn btn-danger"> delete</a>

    </td>


      
    </tr>
    @endforeach
   
  </tbody>
</table>

</div>

 
@endsection