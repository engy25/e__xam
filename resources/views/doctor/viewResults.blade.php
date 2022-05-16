@extends('layouts/doctor.app')
@section('content')

    <!--content start-->
    <div class="content">
        <br><br><br><br><br>

        <div class="container">
            <div class="panel panel-primary" style="border-color:#75a3a3;">
                <div class="panel-heading" style="background-color:#005450;">
                    <h6 class="panel-title">Finished Exams</h6>
                </div>
                <table class="table table-hover" id="dev-table">
                    <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Mark</th>

                        <th>Result</th>
                    </tr>
                    </thead>
                    <tr>
                        <td>Yomna Mohamed</td>
                        <td>20</td>
                        <td>Passed</td>

                    </tr>
                </table>
            </div>
        </div>

        <br><br><br>
    </div>
    <!--content end-->

@endsection