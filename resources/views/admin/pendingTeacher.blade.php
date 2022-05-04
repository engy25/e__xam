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
                            <th>Profile Picture</th>
                            <th>Mobile</th>

                            <th>Approve</th>
                            <th>Reject</th>
                        </tr>
                    </thead>
                    @foreach($userDoctors as $userDoctore)
                    <tr>
                   
                        <td> {{$userDoctore->first_name}}</td>
                       
                        <td><img src="images/users/{{ $userDoctore->photo }}" width="100px"></td>
                        <td>{{$userDoctore->mobile}}</td>
                        
                        @endforeach
                        <td></td>
                        <td></td>
                        <td><button class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-ok"></span></button></td>
                        <td><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button></td>
                    </tr>
                </table>
            </div>
        </div>


        <br><br><br>
    </div>
    <!--content end-->



    @endsection