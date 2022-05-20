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
                </div>

                

         
    <div class="content-header-labels">
        <label for="professor_id">Doctor Name</label>
        <label for="subject_id" style="margin-right:166px;">Subject</label>
       
    </div>

    <div class="content-header-select">
                    <select name="professor_id" id="users">
                        <option value="" selected disabled>Select Teacher's Email</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->email}}</option>
                        @endforeach
                    </select>

                    
                    
                    
                    <select id="subjects" name="subject_id">
                    
                    <option value="" selected disabled>Select Subject</option>
                    @foreach($subjects as $subject)
                    <option value="{{$subject->subject_id}}">{{$subject->subject_name}}
                    @endforeach
                </select>
                
                              
                    
                
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
      <th>Doctor's Email</th>
      <th>Subjct</th>
      <th>Edit</th>
   
   
    </tr>
  </thead>
  <tbody>
    
    <tr>
    @foreach($professor_subjects as $professor_subject)
    <tr>

      <td id="{{$professor_subject->d}}">
        <p  class="fw-normal mb-1">{{$professor_subject->email}}</p>
       
      </td >
     
      <td   id="{{$professor_subject->subject_id}}">
      <p  class="fw-normal mb-1">{{$professor_subject->subject_name}}</p>
       
      <td>

      <a href="{{url('admin/edit/subjectDoctor/'.$professor_subject -> subject_id)}}" class="btn btn-primary">Edit</a>
      </td>
     
    </tr>
    @endforeach
   
   
    </tbody>
</table>

</div>

 
@endsection