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

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Edit & Update Subject
                        <a href="{{ url('admin/subjects') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
            <div class="row">
                
                    <form action="{{url('admin/update/subject/'.$subjects -> subject_id)}}" method="POST">
                        @csrf
                        @method('PUT')
</div>

                        <div class="form-group mb-3">
                            <label for="subject_name">Subject Name</label>
                            
                            <input id="subject_name" type="text" name="subject_name" value="{{$subjects->subject_name}}"  autofocus placeholder="Enter Subject name"  class="form-control">
                        </div>


                        <div class="form-group" >
                                    <label for="levels">Level</label>
                                    <select  id="levels" class="form-control" name="level_id">
                                        <option value="" selected disabled>Select levels</option>
										@foreach($levels as $level)
                                        <option value="{{$level->id}}" >{{$level->level_name}} </option>
										@endforeach
                                    </select>
                                </div>

								<div class="form-group" >
                                    <label for="roles">Department</label>
                                    <select id="departments" class="form-control" name="department_id">
                                        <option value="" selected disabled>Select departments</option>
										@foreach($departments as $department)
                                        <option value="{{$department->id}}" >{{$department->department_name}} </option>
										@endforeach
                                    </select>
                                </div>


                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Student</button>
                        </div>

                    </form>
</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

    