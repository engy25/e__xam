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
                    <p>Yomna</p>
                <br />
                    <label>Last Name: </label>
                    <p>Mohamed</p>
                <br />
                    <label>User Name: </label>
                    <p>yomnamohamed5</p>
                <br />
                    <label>Mobile: </label>
                    <p>01234567890</p>
                <br />
                    <label>Level: </label>
                    <p>3</p>
                <br />
                    <label>Department: </label>
                    <p>SE</p>
                </div>
            </div>


            <div class="panel panel-primary" style="border-color:#75a3a3;clear:both">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">Teacher Subjects</h6>
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
                        <td>MidTerm</td>
                        <td>DataBase</td>
                        <td>20</td>
                        <td>1/1/2022</td>
                    </tr>
                </table>

            </div>
        </div>

        <br><br><br>
    </div>
    <!--content end-->
    <!--JS code start-->
    @endsection