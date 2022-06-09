<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

@extends('layouts/admin.app')
<link rel="stylesheet" href="{{ asset('css/css/Admin-TotalTeacher.css') }}"/>
@section('content')
    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">
            <div class="panel panel-primary" style="border-color:#75a3a3;">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">Total Teachers</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                   
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Edit</th>

                            <th>Delete</th>
                            <th>Profile</th>
                        </tr>
                     
                    </thead>
                    @foreach($userDoctors as $userDoctore)
                    <tr>
                        <td >{{$userDoctore->first_name}}</td>
                        <td>{{$userDoctore->last_name}}</td>
                        <td>{{$userDoctore->email}}</td>
                        <td>{{$userDoctore->mobile}}</td>
                        <td>
                         <a href="{{url('admin/edit/prof/'.$userDoctore -> id)}}" class="btn btn-primary btn-xs" style="font-weight:bolder;"><span>Edit</span></a>
                        
                        </td>
                        <td>
                        <a href="{{route('adminTotalTeacherdelete',$userDoctore->id)}}" class="btn btn-danger btn-xs" style="height:20px;"><span class="glyphicon glyphicon-remove"></span></a>
                        </td>
                        <td>
                       
                        <a  href= "{{route('adminViewProfileOfDoctor',['id'=>$userDoctore->id])}}" class="btn btn-primary btn-xs" style="font-weight:bolder;"><span>View</span></a>
                        </td>  

                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <br><br><br>
    </div>
    <!--content end-->
    @endsection