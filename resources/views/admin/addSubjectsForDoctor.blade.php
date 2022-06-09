<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

@extends('layouts/admin.app')
<link rel="stylesheet" href="{{ asset('css/css/Admin-addsubjectsForDoctors.css') }}"/>
@section('content')
<div class="content">
        <br><br><br><br><br>

        <div class="container">

            <div class="content-header">
               
                <form method="POST" class="my-login-validation" autocomplete="off"  action="{{ route('DoctorSubject') }}">

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
                @csrf
                      
    <div class="content-header-labels">
        <label for="users">Doctor Name</label>
        <label for="subjects">Subject</label>      
    </div>

    <div class="content-header-select">
                    <select name="professor_id" id="users">
                        <option value="" selected disabled>Select Teacher's Email</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->email}}</option>
                        @error('user')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                        @endforeach             
                    </select>                 
                    
                    <select id="subjects" name="subject_id">
                    
                    <option value="" selected disabled>Select Subject</option>
                    @foreach($subjects as $subject)
                    <option value="{{$subject->id}}">{{$subject->subject_name}}
                    @error('subject')
                    <small class="form-text text-danger">
                        {{$message}}
                    </small>
                    @enderror
                       
                    @endforeach
                </select>               
                              
                </div>

                <div class="content-header-btn">
                  <button type ="submit">Add</button>
              </div>

            </div>

                <div class="panel panel-primary" style="border-color:#75a3a3;">
                    <div class="panel-heading" style="background-color:#005450;">
                        <h6 class="panel-title">Report</h6>
                    </div>
              
                    <table class="table table-hover" id="dev-table">
                    <thead>
                      <tr>
                        <th>Doctor's Email</th>
                        <th>Subjct</th>
                        
                      </tr>
                    </thead>
                      
                      <tr>
                      @foreach($professor_subjects as $professor_subject)
                    

                        <td id="{{$professor_subject->professor_id}}">{{$professor_subject->email}}</td >
                      
                        <td   id="{{$professor_subject->subject_id}}">{{$professor_subject->subject_name}}</td>
                        
                      </tr>
                      @endforeach

                  </table>

                </div>
              </div>

              <br><br><br>
          </div>
 
@endsection