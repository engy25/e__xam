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
                    <h4>Edit & Update Student
                        <a href="{{ url('admin/totalStudents') }}" class="btn btn-danger float-end" style="float: right; background-color:#005450;border:#005450 1px solid;">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
            <div class="row">
                
                    <form action="{{url('admin/update/stu/'.$users -> id)}}" method="POST">
                        @csrf
                        @method('PUT')
            </div>

                        <div class="form-group mb-3">
                            <label for="first_name">First Name</label>
                            
                            <input id="first_name" type="text" name="first_name" value="{{$users->first_name}}"  autofocus placeholder="Enter Fist name"  class="form-control">
                            
                            @error('first_name')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        </div>


                        <div class="form-group mb-3">
                            <label for="last_name">Last Name</label>
                            
                            <input id="last_name" type="text" name="last_name" value="{{$users->last_name}}"  autofocus placeholder="Enter Last name"  class="form-control">
                            
                            @error('last_name')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            
                            <input id="email" type="text" name="email" value="{{$users->email}}"  autofocus placeholder="Enter Email "  class="form-control">
                            
                            @error('email')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="mobile">Mobile</label>
                            
                            <input id="mobile" type="text" name="mobile" value="{{$users->mobile}}"  autofocus placeholder="Enter Mobile "  class="form-control">
                            
                            @error('mobile')
                        <small class="form-text text-danger">
                            {{$message}}
                        </small>
                        @enderror
                        </div>


                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary" style="background-color:#005450;border:#005450 1px solid;">Update Professor</button>
                        </div>

                    
</div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br>
</div>

@endsection
