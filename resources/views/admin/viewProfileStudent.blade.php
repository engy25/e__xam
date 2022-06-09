<link href="{{ asset('https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css') }}" rel="stylesheet" id="{{ asset('bootstrap-css') }}">
<script src="{{ asset('https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('https://code.jquery.com/jquery-1.11.1.min.js') }}"></script>

@extends('layouts/admin.app')
<link rel="stylesheet" href="{{ asset('css/css/Admin-Studentprofile.css') }}"/>
@section('content')
    
    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">

            <div class="content-header">
                <div class="content-header-leftside">
                    <img src="{{ asset('images/student1.png') }}" class="teacher-picture">
                </div>
               
                <div class="content-header-rightside">
                    <label>First Name: </label>
                    <p>{{$userStudents->first_name}}</p>
                <br />
                    <label>Last Name: </label>
                    <p>{{$userStudents->last_name}}</p>
                <br />
                    <label>Email: </label>
                    <p>{{$userStudents->email}}</p>
                <br />
                    <label>Mobile: </label>
                    <p>{{$userStudents->mobile}}</p>
                <br />
                    <label>Level: </label>
                    <p>3</p>
                <br />
                    <label>Department: </label>
                    <p>SoftWare Engineer</p>
                </div>
              
            </div>


            <div class="panel panel-primary" style="border-color:#75a3a3;clear:both">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">Student Results</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                       
                        <tr>
                            <th>Exam Name</th>
                            <th>Subject</th>
                            <th>Total Mark</th>
                            <th>Exam Date</th>

                        </tr>
                    </thead>
                    <tr>
                        <td>Construction</td>
                        <td>Software Construction</td>
                        <td>30</td>
                        <td>24/5/2022</td>
                    </tr>
                </table>

            </div>
        </div>

        <br><br><br>
    </div>
    <!--content end-->
   @endsection