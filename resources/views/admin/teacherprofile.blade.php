@extends('layouts/admin.app')
@section('content')

    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">

            <div class="content-header">
                <div class="content-header-leftside">
                    <img src="images/admin.png" class="teacher-picture">
                </div>
                
                <div class="content-header-rightside">
                    <label>First Name: </label>
                    <p>Amr</p>
                    <br />
                    <label>Last Name: </label>
                    <p>AboHany</p>
                    <br />
                    <label>User Name: </label>
                    <p>AmrAboHany12</p>
                    <br />
                    <label>Mobile: </label>
                    <p>01234567890</p>
                </div>
            </div>


            <div class="panel panel-primary" style="border-color:#75a3a3;clear:both">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">Teacher Subjects</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                        <tr>
                            <th>Level</th>
                            <th>Department</th>
                            <th>Subject</th>

                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>3</td>
                        <td>SE</td>
                        <td>DataBase</td>

                        <td><button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button></td>
                    </tr>

                </table>

                <div class="table-footer">
                    <button class="table-footer-btn">Specify New Subject</button>
                </div>

            </div>
        </div>

        <br><br><br>
    </div>
    <!--content end-->
    @endsection