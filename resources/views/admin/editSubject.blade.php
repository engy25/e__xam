<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}"></script>
<link href="{{ asset('http://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css') }}">
<link href="{{ asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}" rel="stylesheet">

@extends('layouts/admin.app')
<link rel="stylesheet" href="{{ asset('css/css/editDepartment.css') }}"/>
@section('content')
<div class="content">
    <br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        @if ( Session::get('success'))
                             <div class="alert alert-success">
                                 {{ Session::get('success') }}
                             </div>
                        @endif
                        @if ( Session::get('error'))
                             <div class="alert alert-danger">
                                 {{ Session::get('error') }}
                             </div>
                        @endif

            <div class="card">
                <div class="card-header">
                    <h4>Edit & Update Subject
                        <a href="{{ url('admin/subjects') }}" class="btn btn-danger float-end" style="float: right; background-color:#005450;border:#005450 1px solid;">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
            <div class="row">
                
                    <form action="{{url('admin/update/subject/'.$subjects -> id)}}" method="POST">
                        @csrf
                        @method('PUT')
            </div>

                        <div class="form-group mb-3">
                            <label for="subject_name">Subject Name</label>
                            
                            <input id="subject_name" type="text" name="subject_name" value="{{$subjects->subject_name}}"  autofocus placeholder="Enter Subject name"  class="form-control">
                            
                            @error('subject_name')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        </div>


                        <div class="form-group" >
                                    <label for="levels">Level</label>
                                    <select  id="levels" class="form-control" name="level_id">
                                        <option value="" selected disabled>Select level</option>
										@foreach($levels as $level)
                                        <option value="{{$level->id}}" >{{$level->level_name}} </option>
										@endforeach
                                    </select>
                                </div>

								<div class="form-group" >
                                    <label for="roles">Department</label>
                                    <select id="departments" class="form-control" name="department_id">
                                        <option value="" selected disabled>Select department</option>
										@foreach($departments as $department)
                                        <option value="{{$department->id}}" >{{$department->department_name}} </option>
										@endforeach
                                    </select>
                                </div>


                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary" style="background-color:#005450;border:#005450 1px solid;">Update Subject</button>
                        </div>

                
</div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
</div>

@endsection
