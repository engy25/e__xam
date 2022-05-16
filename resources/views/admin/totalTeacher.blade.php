@extends('layouts/admin.app')
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

                            <th>Delete</th>
                            <th>Profile</th>
                        </tr>
                     
                    </thead>
                    @foreach($userDoctors as $userDoctore)
                    <tr>
                        <td>{{$userDoctore->first_name}}</td>
                        <td>{{$userDoctore->last_name}}</td>
                        <td>{{$userDoctore->email}}</td>
                        <td>{{$userDoctore->mobile}}</td>
                        <td>
                        <a href="{{route('adminTotalTeacherdelete',$userDoctore->id)}}" class="btn btn-success"> Delete</a>
                        </td>
                        <td>
                        <a  href= "{{route('adminViewProfileOfDoctor',$userDoctore->id)}}" class="btn btn-danger">View</a>
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