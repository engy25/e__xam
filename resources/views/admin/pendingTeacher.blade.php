@extends('layouts/admin.app')
@section('content')
    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">
            <div class="panel panel-primary" style="border-color:#75a3a3;">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">Pending Teachers</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                        <tr>
                       
                            <th>Doctor Name</th>
                            <th>Doctor Email</th>
                            <th>Mobile</th>

                            <th>Approve</th>
                            <th>Reject</th>
                        </tr>
                    </thead>
                    @foreach($userDoctors as $userDoctore)
                    <tr>
                   
                        <td>{{$userDoctore->first_name}}</td>
                       
                        <td> {{$userDoctore->email}}</td>
                        <td>{{$userDoctore->mobile}}</td>
                         <td>
                        <a href="{{route('adminapprovePendingTeacher',$userDoctore->id)}}" class="btn btn-success"> Approve</a>
                        </td>
                        <td>
                        <a  href= "{{route('adminpendingTeacherdelete',$userDoctore->id)}}" class="btn btn-danger"> Delete</a>
                        </td>    
      
  
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