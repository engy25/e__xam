@extends('layouts/admin.app')
@section('content')
   
    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">
            <div class="panel panel-primary" style="border-color:#75a3a3;">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">All Results</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Mark</th>
                            <th>Result</th>

                            <th>Profile</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>YomnaMohamed5</td>
                        <td>20</td>
                        <td>Passed</td>

                        <td><a class="btn btn-primary btn-xs" href="Admin-StudentProfile.html" style="font-weight:bolder;"><span>Visit</span></a></td>
                    </tr>
                </table>
            </div>
        </div>

        <br><br><br>
    </div>
    <!--content end-->
    @endsection