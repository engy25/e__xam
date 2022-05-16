@extends('layouts/admin.app')
@section('content')
    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">
            <div class="panel panel-primary" style="border-color:#75a3a3;">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">Total Students</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Department</th>

                            <th>Delete</th>
                            <th>Profile</th>
                        </tr>
                    </thead>
                    @foreach($students as $student)
                    <tr>
                    <td>{{$student->first_name}}</td>
                        <td>{{$student->last_name}}</td>
                        <td>{{$student->email}}</td>
                        
                        <td>3</td>
                        <td>SE</td>

                        <td>
      
    <a href="{{route('destroystudent',$student->id)}}" class="btn btn-danger"> delete</a>
    </td>

                        <td><a class="btn btn-primary btn-xs" href="Admin-StudentProfile.html" style="font-weight:bolder;"><span>Visit</span></a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <br><br><br>
    </div>
    <!--content end-->
    @endsection