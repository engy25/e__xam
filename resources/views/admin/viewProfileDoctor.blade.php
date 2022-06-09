<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

@extends('layouts/admin.app')
<link rel="stylesheet" href="{{ asset('css/css/Admin-Teacherprofile.css') }}"/>
@section('content')

    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">

            <div class="content-header">
                <div class="content-header-leftside">
                    <img src="{{ asset('images/admin.png') }}" class="teacher-picture">
                </div>
                <div class="content-header-rightside">
                    <label >First Name: </label>
                    <p>{{$userDoctors->first_name}}</p>
                    <br />
                    <label>Last Name: </label>
                    <p>{{$userDoctors->last_name}}</p>
                    <br />
                    <label>User Name: </label>
                    <p>{{$userDoctors->email}}</p>
                    <br />
                    <label>Mobile: </label>
                    <p >{{$userDoctors->mobile}}</p>
                </div>
            </div>
           


            <div class="panel panel-primary" style="border-color:#75a3a3;clear:both">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">Teacher Subjects</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                        <tr>                    
                            <th>Subject</th>                      
                        </tr>
                    </thead>

                    @foreach($subDoctors as $subDoctor)
                    <tr>                 
                        <td>{{$subDoctor->subject_name}}</td>                
                    </tr>
                    @endforeach

                </table>

                <div class="table-footer">
                    <a href="{{route('DoctorSubject')}}" class="table-footer-btn">Specify New Subject</a>
                </div>

            </div>
        </div>

        <br><br><br>
    </div>
   
    <!--content end-->
    @endsection