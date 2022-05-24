@extends('layouts/admin.app')
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>E-Exam</title>
    <!--start Admin Base-->
    <link rel="stylesheet" href="{{ asset('css/AdminBase.css') }}"/>
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css') }}">
    <!--end admin base-->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}"></script>
    <link href="{{ asset('http://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css') }}">
    <link href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}" rel="stylesheet">

      <style type="{{ asset('text/css') }}">
      body{
        background-color:#F0F0F0;
      }

      a:link {
        text-decoration: none;
      }
  
      .order-card {
        color: rgb(255, 255, 255);
      }
  
      .bg-c-blue {
        background: #04868f;
      }
  
      .bg-c-green {
        background:#4C51BF;
      }
      </style>

</head>
    </body>
@section('content')
<div class="content">
<div class="container">
    <div class="row">
        <div class="col-md-12">

      

            <div class="card">
                <div class="card-header">
                    <h4>Edit & Update Level
                        <a href="{{ url('admin/departments') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
            <div class="row">
            
            <form action="{{url('admin/update/'.$departments -> id)}}" method="POST">
                   
                   
                        @csrf
                        @method('PUT')
</div>

                        <div class="form-group mb-3">
                            <label for="id">Department Name</label>
                            
                            <input id="department_name" type="text" name="department_name" value="{{$departments->department_name}}"  autofocus placeholder="Enter Level name"  class="form-control">

                            @error('department_name')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        </div>

</div>







    </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Department</button>
                        </div>

                    </form>
</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

    