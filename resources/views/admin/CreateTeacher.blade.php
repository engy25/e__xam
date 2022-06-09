<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

@extends('layouts/admin.app')
<link rel="stylesheet" href="{{ asset('css/css/Admin-CreateTeacher.css') }}"/>
@section('content')
<div class="content">
        <br><br><br><br><br>

        <div class="container">

            <form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('AddDoctor') }}">
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

            <div class="form">
                <div class="form-header">
                    <h3>Create Teacher</h3>
                </div>

                <div class="form-center">
                    <div class="form-group">
                        <h3>Form Teacher</h3>
                        
                        <hr />
                    </div>
                                <div class="form-group">
                                    <label for="first_name" class="form-labels">First Name</label>
                                    <input id="first_name" type="text" class="form-txt" name="first_name" autofocus value="{{ old('first_name') }}">
                                    @error('first_name')
                        <small class="form-text text-danger">
                            {{$message}}

                        </small>
                        @enderror
								
                                </div>

                                <div class="form-group">
                                    <label for="last_name" class="form-labels">Last Name</label>
                                    <input id="last_name" type="text" class="form-txt" name="last_name" autofocus value="{{ old('last_name') }}">
                                    @error('last_name')
                        <small class="form-text text-danger">
                            {{$message}}

                        </small>
                        @enderror
								</div>
                              
                                
                    <div class="form-group">
                        <label class="form-labels">E-mail</label>
                        <input  id="email" type="email"  name="email" type="email" class="form-txt"/>
                        @error('email')
                        <small class="form-text text-danger">
                            {{$message}}

                        </small>
                        @enderror
								</div>
                       
                 

                    <div class="form-group">
                        <label class="form-labels">Password</label>
                        <input id="password" type="password" class="form-txt" name="password"  data-eye>
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
                                    <label for="mobile" class="form-labels">Mobile</label>
                                    <input id="mobile" type="text" class="form-txt" name="mobile" autofocus value="{{ old('mobile') }}">
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

@endsection