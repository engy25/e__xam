@extends('layouts/admin.app')
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>E-Exam</title>
    <!--start Admin Base-->
    <link rel="stylesheet" href="{{ asset('css/AdminBase.css') }}" />
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css') }}">
    <!--end admin base-->

    <link href="{{ asset('https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css') }}" rel="stylesheet" id="{{ asset('bootstrap-css') }}">

    <style>
         body{
            background-color:#F0F0F0;
        }

        a:link {
            text-decoration: none;
        }

        .form{
            height:1070px;
            width:630px;
            background-color:#fff;
            margin:auto;
            margin-top:auto;
            border-bottom-left-radius:20px;
            border-top-right-radius:20px;
        }

        .form-header{
            height:60px;
            background-color:#fff;
            border-top-right-radius:20px;
            border-bottom:solid #F0F0F0 1px;
        }

        .form-center{
            padding:0px 30px 30px 30px;
        }

        .form-labels{
            display:block;
            margin-top:20px;
            margin-bottom:5px;
            color:#909090;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .form-txt{
            width:100%;
            padding:10px;
            border:solid lightgray 1px;
            border-radius:3px;
            background-color:#F8F8F8;
        }

        .form-select{
            width:100%;
            padding:10px;
            background-color:#F8F8F8;
            border:solid lightgray 1px;
            border-radius:3px;
        }

        .submit-btn{
            width:160px;
            padding:10px;
            background-color:#005450;
            color:white;
            border-bottom-left-radius:20px;
            border-top-right-radius:20px;
            border:solid lightgray 1px;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size:15px;
            font-weight:bold;           
        }

        .form-header h3{
            color:black;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding-left:30px;
            padding-top:18px;
            font-size:20px;
            color:#585858;
        }

        .form-center h3{
            color:black;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size:20px;
            color:#585858;
        }

    </style>
</head>
<body>
@section('content')
<div class="content">
        <br><br><br><br><br>

        <div class="container">


            <div class="form">
                <div class="form-header">
                    <h3>Create Teacher</h3>
                </div>

                <div class="form-center">
                    <div class="form-group">
                        <h3>Form Teacher</h3>
                        <form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('AddStudent') }}">
                        @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if ( Session::get('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                @endif
								
                                @csrf
                        <hr />
                    </div>
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input id="first_name" type="text" class="form-txt" name="first_name" autofocus placeholder="Enter first name" value="{{ old('first_name') }}">
                                    @error('first_name')
                        <small class="form-text text-danger">
                            {{$message}}

                        </small>
                        @enderror
								
                                </div>

                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input id="last_name" type="text" class="form-txt" name="last_name" autofocus placeholder="Enter last name" value="{{ old('last_name') }}">
                                    @error('last_name')
                        <small class="form-text text-danger">
                            {{$message}}

                        </small>
                        @enderror
								</div>
                              
                                
                    <div class="form-group">
                        <label class="form-labels">E-mail</label>
                        <input  id="email" type="email"  name="email" type="email" class="form-txt" />
                        @error('email')
                        <small class="form-text text-danger">
                            {{$message}}

                        </small>
                        @enderror
								</div>
                       
                 

                    <div class="form-group">
                        <label class="form-labels">Password</label>
                        <input id="password" type="password" class="form-txt" name="password"  data-eye placeholder="Enter password">
                        @error('password')
                        <small class="form-text text-danger">
                            {{$message}}

                        </small>
                        @enderror
								</div>
                   
                    

                                <div class="form-group">
                        <label for="Level-Id" class="form-labels">Level Name</label>
                        <select id="Level-Id" class="form-select" name="level">
                            <option value="" selected disabled> </option>
                            @foreach($levels as $level)
                                        <option value="{{$level->id}}" >{{$level->level_name}} </option>
										@endforeach
                                
							
                                       

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Department-Id" class="form-labels">Department Name</label>
                        <select id="Department-Id" class="form-select" name="department">
                            <option value="" selected disabled> </option>
                            @foreach($departments as $department)
                                        <option value="{{$department->id}}" >{{$department->department_name}} </option>
										@endforeach
                                     
                        </select>
                    </div>

                  

                    
								<div class="form-group">
                                    <label for="last_name">Mobile</label>
                                    <input id="mobile" type="text" class="form-control" name="mobile" autofocus placeholder="Enter mobile" value="{{ old('mobile') }}">
                                    @error('mobile')
                        <small class="form-text text-danger">
                            {{$message}}

                        </small>
                        @enderror
								
                                </div>
                    <div class="form-group">
                        <button tybe="submit" class="submit-btn">Submit</button>
                    </div>
                </div>
                </div>
            

        </div>

        <br><br><br>
    </div>
    <!--content end-->


    <!--JS code start-->

    <script src="{{ asset('http://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js') }}" ></script>

@endsection