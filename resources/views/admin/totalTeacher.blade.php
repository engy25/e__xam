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
                            <th>UserName</th>
                            <th>Mobile</th>

                            <th>Delete</th>
                            <th>Profile</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>Amr</td>
                        <td>AboHany</td>
                        <td>AmrAboHany12</td>
                        <td>01234567880</td>

                        <td><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button></td>
                        <td><a class="btn btn-primary btn-xs" href="Admin-TeacherProfile.html" style="font-weight:bolder;"><span>Visit</span></a></td>
                    </tr>
                </table>
            </div>
        </div>

        <br><br><br>
    </div>
    <!--content end-->
    @endsection